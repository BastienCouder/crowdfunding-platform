<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Models\ProjectImage;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $query = Project::with('user', 'category')->where('is_draft', false);
    
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
                    $query->where('end_date', '>=', now());
                    break;
                case 'completed':
                    $query->where('end_date', '<', now());
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
            'project_images' => 'required|array|min:1|max:5',
            'project_images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ]);
    
        $imagesPaths = [];
        
        foreach ($request->file('project_images') as $key => $image) {
            $path = $image->store('project_images', 'public');
            $imagesPaths[] = [
                'path' => $path,
                'is_main' => $key === 0
            ];
        }
    
        $request->session()->put('step2_images', $imagesPaths);
        return redirect()->route('projects.show-step3');
    }
    public function showStep3(Request $request)
{
    $step1_data = $request->session()->get('step1_data');
    $step2_images = $request->session()->get('step2_images');

    if (!$step1_data || !$step2_images) {
        return redirect()->route('projects.create')->with('error', 'Veuillez compléter les étapes précédentes');
    }

    return view('projects.create-step3', [
        'step1_data' => $step1_data,
        'step2_data' => $step2_images,
    ]);
}

public function storeStep3(Request $request)
{
    // Validation des données de l'étape 3 avec messages personnalisés
    $validated = $request->validate([
        'summary' => 'required|string|max:255',
        'risks' => 'nullable|string',
        'is_draft' => 'sometimes|boolean',
        
        // Validation des paliers
        'tier_amount' => 'sometimes|array',
        'tier_amount.*' => 'required|numeric|min:1',
        'tier_title' => 'required_with:tier_amount|array',
        'tier_title.*' => 'required|string|max:255',
        'tier_description' => 'sometimes|array',
        'tier_description.*' => 'nullable|string',
        
        // Validation des FAQ
        'faq_question' => 'sometimes|array',
        'faq_question.*' => 'required|string|max:255',
        'faq_answer' => 'sometimes|array',
        'faq_answer.*' => 'nullable|string',
    ], [
        // Messages personnalisés
        'tier_amount.*.required' => 'Le montant de chaque palier est requis',
        'tier_amount.*.numeric' => 'Le montant doit être un nombre',
        'tier_amount.*.min' => 'Le montant doit être d\'au moins 1',
        'tier_title.*.required' => 'Le titre de chaque palier est requis',
        'tier_title.*.string' => 'Le titre doit être une chaîne de caractères',
        'faq_question.*.required' => 'La question FAQ est requise',
        'faq_question.*.string' => 'La question doit être une chaîne de caractères',
    ]);

    // Récupération des données des étapes précédentes
    $step1_data = $request->session()->get('step1_data', []);
    $step2_images = $request->session()->get('step2_images', []);

    // Vérification des données obligatoires
    if (empty($step1_data) || empty($step2_images)) {
        return redirect()->route('projects.create')
                       ->with('error', 'Veuillez compléter les étapes précédentes');
    }

    // Préparation des paliers de financement
    $fundingTiers = [];
    if (!empty($validated['tier_amount'])) {
        foreach ($validated['tier_amount'] as $index => $amount) {
            $fundingTiers[] = [
                'amount' => $amount,
                'title' => $validated['tier_title'][$index] ?? '',
                'description' => $validated['tier_description'][$index] ?? null,
            ];
        }
    }

    // Préparation des FAQ
    $faqs = [];
    if (!empty($validated['faq_question'])) {
        foreach ($validated['faq_question'] as $index => $question) {
            $faqs[] = [
                'question' => $question,
                'answer' => $validated['faq_answer'][$index] ?? null,
            ];
        }
    }

    // Création du projet
    $project = Project::create([
        'user_id' => auth()->id(),
        'title' => $step1_data['title'] ?? 'Nouveau projet',
        'description' => $step1_data['description'] ?? '',
        'summary' => $validated['summary'],
        'goal_amount' => $step1_data['goal_amount'] ?? 0,
        'start_date' => $step1_data['start_date'] ?? now(),
        'end_date' => $step1_data['end_date'] ?? now()->addMonth(),
        'category_id' => $step1_data['category_id'] ?? null,
        'risks' => $validated['risks'] ?? null,
        'is_draft' => $validated['is_draft'] ?? false,
        'video_url' => $step1_data['video_url'] ?? null,
        'funding_tiers' => $fundingTiers,
        'faqs' => $faqs,
        'current_amount' => 0,
        'status' => 'pending',
    ]);

    // Ajout des images
    foreach ($step2_images as $image) {
        $project->images()->create([
            'image_url' => $image['path'],
            'is_main' => $image['is_main'] ?? false,
            'mime_type' => Storage::disk('public')->mimeType($image['path']) ?? 'image/jpeg'
        ]);
    }

    return redirect()->route('projects.show', $project)
                   ->with('success', 'Projet créé avec succès !');
}
    public function store(Request $request)
    {
        $step1_data = $request->session()->pull('step1_data');
        $imagesPaths = $request->session()->pull('step2_images');
    
        $project = Project::create([
            'user_id' => auth()->id(),
            'title' => $step1_data['title'],
            'description' => $step1_data['description'],
            'goal_amount' => $step1_data['goal_amount'],
            'start_date' => $step1_data['start_date'],
            'end_date' => $step1_data['end_date'],
            'category_id' => $step1_data['category_id'],
        ]);
    
        foreach ($imagesPaths as $image) {
            $project->images()->create([
                'image_url' => $image['path'],
                'is_main' => $image['is_main'],
                'mime_type' => Storage::disk('public')->mimeType($image['path'])
            ]);
        }
    
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
            'summary' => 'sometimes|string',
            'goal_amount' => 'required|numeric|min:1',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'category_id' => 'required|exists:categories,id',
            'risks' => 'nullable|string',
            'is_draft' => 'sometimes|boolean',
            'video_url' => 'nullable|url',
            
            // Paliers
            'tier_amount' => 'sometimes|array',
            'tier_amount.*' => 'numeric|min:1',
            'tier_reward' => 'sometimes|array',
            'tier_reward.*' => 'string|max:255',
            'tier_description' => 'sometimes|array',
            'tier_description.*' => 'nullable|string',
            
            // FAQ
            'faq_question' => 'sometimes|array',
            'faq_question.*' => 'string|max:255',
            'faq_answer' => 'sometimes|array',
            'faq_answer.*' => 'nullable|string',
            
            // Images
            'delete_images' => 'sometimes|array',
            'delete_images.*' => 'exists:project_images,id',
            'new_images' => 'sometimes|array',
            'new_images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ]);
    
        // Mise à jour des données de base
        $updateData = [
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'summary' => $validatedData['summary'] ?? null,
            'goal_amount' => $validatedData['goal_amount'],
            'start_date' => $validatedData['start_date'],
            'end_date' => $validatedData['end_date'],
            'category_id' => $validatedData['category_id'],
            'risks' => $validatedData['risks'] ?? null,
            'is_draft' => $validatedData['is_draft'] ?? false,
            'video_url' => $validatedData['video_url'] ?? null,
        ];
    
        $project->update($updateData);
        
    
        // Traitement des paliers
        if ($request->has('tier_amount')) {
            $fundingTiers = [];
            foreach ($request->tier_amount as $index => $amount) {
                $fundingTiers[] = [
                    'amount' => $amount,
                    'reward' => $request->tier_reward[$index] ?? '',
                    'description' => $request->tier_description[$index] ?? null,
                ];
            }
            $project->funding_tiers = $fundingTiers;
        }
    
        // Traitement des FAQ
        if ($request->has('faq_question')) {
            $faqs = [];
            foreach ($request->faq_question as $index => $question) {
                $faqs[] = [
                    'question' => $question,
                    'answer' => $request->faq_answer[$index] ?? null,
                ];
            }
            $project->faqs = $faqs;
        }
    
        $project->save();
    
     // Suppression des images sélectionnées
     if ($request->has('delete_images')) {
        $imagesToDelete = ProjectImage::whereIn('id', $request->delete_images)
            ->where('project_id', $project->id)
            ->get();
            
        foreach ($imagesToDelete as $image) {
            $image->delete(); // Déclenchera la suppression physique via l'event
        }
    }
    
        // Gestion des nouvelles images
        if ($request->hasFile('new_images')) {
            foreach ($request->file('new_images') as $image) {
                if ($image->isValid()) {
                    $path = $image->store('project_images', 'public');
                    
                    $project->images()->create([
                        'image_url' => $path,
                        'is_main' => false // Vous pouvez ajouter une logique pour définir l'image principale
                    ]);
                }
            }
        }


    
        return redirect()->route('projects.my-projects', $project)->with('success', 'Projet mis à jour avec succès !');
    }

public function edit(Project $project)
{
    $categories = Category::all();
    
    // Conversion des dates si nécessaire
    $project->start_date = is_string($project->start_date) 
        ? Carbon::parse($project->start_date) 
        : $project->start_date;
    
    $project->end_date = is_string($project->end_date) 
        ? Carbon::parse($project->end_date) 
        : $project->end_date;

    // Conversion des funding_tiers en tableau si c'est une chaîne JSON
    if (is_string($project->funding_tiers)) {
        $project->funding_tiers = json_decode($project->funding_tiers, true); // true pour obtenir un array plutôt qu'un objet
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

    public function deleteImage(Project $project, ProjectImage $image)
{
    // Vérifie que l'image appartient bien au projet
    if ($image->project_id !== $project->id) {
        abort(403);
    }

    $image->delete(); // Déclenchera la suppression physique via l'event

    return back()->with('success', 'Image supprimée');
}
}