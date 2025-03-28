<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $query = Project::with('user', 'category');
    
        // Appliquer les filtres
        if ($request->has('search') && $request->search) {
            $query->where(function($q) use ($request) {
                $q->where('title', 'like', '%'.$request->search.'%')
                  ->orWhere('description', 'like', '%'.$request->search.'%');
            });
        }
    
        if ($request->has('status') && $request->status) {
            switch ($request->status) {
                case 'active':
                    $query->where('is_draft', false)
                          ->where('end_date', '>=', now());
                    break;
                case 'completed':
                    $query->where('end_date', '<', now());
                    break;
                case 'draft':
                    $query->where('is_draft', true);
                    break;
            }
        }
    
        if ($request->has('category') && $request->category) {
            $query->where('category_id', $request->category);
        }
    
        // Appliquer le tri
        switch ($request->sort ?? 'newest') {
            case 'newest': $query->latest(); break;
            case 'oldest': $query->oldest(); break;
            case 'amount-high': $query->orderBy('current_amount', 'desc'); break;
            case 'amount-low': $query->orderBy('current_amount', 'asc'); break;
        }
    
        $projects = $query->paginate(10);
        $categories = Category::all();
    
        if ($request->ajax() || $request->has('ajax')) {
            return response()->json([
                'html' => view('projects.partials.projects-grid-website', compact('projects'))->render(),
                'pagination' => $projects->links()->toHtml()
            ]);
        }
    
        return view('projects.index', compact('projects', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('projects.create-step1', [
            'categories' => $categories,
            'current_step' => 1
        ]);
    }

    public function storeStep1(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'goal_amount' => 'required|numeric|min:1',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'category_id' => 'required|exists:categories,id',
        ]);
    
        // Stocker les données de l'étape 1 en session
        $request->session()->put('step1_data', $validated);
    
        return redirect()->route('projects.show-step2'); // Changé de create-step2 à show-step2
    }

    public function     showStep2(Request $request)
    {
        // Récupérer les données de l'étape 1 depuis la session
        $step1_data = $request->session()->get('step1_data');

        if (!$step1_data) {
            return redirect()->route('projects.create')->with('error', 'Veuillez compléter la première étape');
        }

        return view('projects.create-step2', [
            'step1_data' => $step1_data,
            'current_step' => 2
        ]);
    }


    public function storeStep2(Request $request)
    {
        $validated = $request->validate([
            'project_images' => 'required|array',
            'project_images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Convertir les images en base64
        $imagesBase64 = [];
        foreach ($request->file('project_images') as $image) {
            $img = Image::make($image);
            $img->encode('jpg', 75);
            $base64 = base64_encode($img);

            $imagesBase64[] = [
                'data' => 'data:image/jpeg;base64,'.$base64,
                'is_main' => false
            ];
        }

        if (!empty($imagesBase64)) {
            $imagesBase64[0]['is_main'] = true;
        }

        // Stocker les images en session
        $request->session()->put('step2_images', $imagesBase64);

        return redirect()->route('projects.show-step3');
    }

    public function showStep3(Request $request)
    {
        // Vérifier que toutes les données sont présentes
        $step1_data = $request->session()->get('step1_data');
        $imagesBase64 = $request->session()->get('step2_images');

        if (!$step1_data || !$imagesBase64) {
            return redirect()->route('projects.create')->with('error', 'Veuillez compléter toutes les étapes');
        }

        return view('projects.create-step3', [
            'step1_data' => $step1_data,
            'images_base64' => $imagesBase64,
            'current_step' => 3
        ]);
    }

    public function store(Request $request)
    {
        // Récupérer toutes les données des étapes précédentes
        $step1_data = $request->session()->pull('step1_data');
        $imagesBase64 = $request->session()->pull('step2_images');

        if (!$step1_data || !$imagesBase64) {
            return redirect()->route('projects.create')->with('error', 'Veuillez compléter toutes les étapes');
        }

        // Créer le projet
        $project = Project::create([
            'user_id' => auth()->id(),
            'title' => $step1_data['title'],
            'description' => $step1_data['description'],
            'goal_amount' => $step1_data['goal_amount'],
            'start_date' => $step1_data['start_date'],
            'end_date' => $step1_data['end_date'],
            'category_id' => $step1_data['category_id'],
        ]);

        // Stocker les images
        $project->storeImages($imagesBase64);

        return redirect()->route('dashboard')->with('success', 'Projet créé avec succès !');
    }

    public function update(Request $request, Project $project)
    {
        if (auth()->id() !== $project->user_id) {
            abort(403, 'Vous n\'êtes pas autorisé à modifier ce projet.');
        }

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'goal_amount' => 'required|numeric|min:1',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'category_id' => 'required|exists:categories,id',
            'images' => 'sometimes|array',
            'images.*.data' => 'required|string', // Données base64
            'images.*.is_main' => 'sometimes|boolean',
            'deleted_images' => 'sometimes|array',
            'deleted_images.*' => 'exists:project_images,id',
        ]);

        $project->update([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'goal_amount' => $validatedData['goal_amount'],
            'start_date' => $validatedData['start_date'],
            'end_date' => $validatedData['end_date'],
            'category_id' => $validatedData['category_id'],
        ]);

        // Supprimer les images marquées pour suppression
        if (!empty($validatedData['deleted_images'])) {
            $project->images()->whereIn('id', $validatedData['deleted_images'])->delete();
        }

        // Ajouter les nouvelles images
        if (!empty($validatedData['images'])) {
            $project->storeImages($validatedData['images']);
        }

        return redirect()->route('dashboard')->with('success', 'Projet mis à jour avec succès !');
    }

    public function edit(Project $project)
    {
        $categories = Category::all();
        
        if (is_string($project->start_date)) {
            $project->start_date = \Carbon\Carbon::parse($project->start_date);
        }
        if (is_string($project->end_date)) {
            $project->end_date = \Carbon\Carbon::parse($project->end_date);
        }

        return view('projects.edit', compact('project', 'categories'));
    }

    public function show(Project $project)
    {
        $project->load('user', 'category', 'contributions', 'comments.user');
        return view('projects.show', compact('project'));
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('dashboard')->with('success', 'Projet supprimé avec succès !');
    }
    public function myProjects(Request $request)
    {
        $user = auth()->user();
        $query = $user->projects()->with(['category', 'images', 'contributions']);
    
        // Appliquer les filtres
        if ($request->has('search') && $request->search) {
            $query->where(function($q) use ($request) {
                $q->where('title', 'like', '%'.$request->search.'%')
                  ->orWhere('description', 'like', '%'.$request->search.'%');
            });
        }
    
        if ($request->has('status') && $request->status) {
            switch ($request->status) {
                case 'active':
                    $query->where('is_draft', false)
                          ->where('end_date', '>=', now());
                    break;
                case 'completed':
                    $query->where('end_date', '<', now());
                    break;
                case 'draft':
                    $query->where('is_draft', true);
                    break;
            }
        }
    
        if ($request->has('category') && $request->category) {
            $query->where('category_id', $request->category);
        }
    
        // Appliquer le tri
        switch ($request->sort ?? 'newest') {
            case 'newest': $query->latest(); break;
            case 'oldest': $query->oldest(); break;
            case 'amount-high': $query->orderBy('current_amount', 'desc'); break;
            case 'amount-low': $query->orderBy('current_amount', 'asc'); break;
        }
    
        $projects = $query->paginate(10);
        $categories = Category::all();
    
        if ($request->ajax()) {
            return response()->json([
                'html' => view('projects.partials.projects-grid', compact('projects'))->render(),
                'pagination' => $projects->links()->toHtml()
            ]);
        }
    
        return view('projects.my-projects', compact('projects', 'categories'));
    }
}