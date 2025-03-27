<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{

    public function index()
    {
        $projects = Project::with('user', 'category')->latest()->paginate(10);
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('projects.create', compact('categories'));
    }

    public function store(Request $request)
{

    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'goal_amount' => 'required|numeric|min:1',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after:start_date',
        'category_id' => 'required|exists:categories,id',
    ]);

    Project::create([
        'user_id' => auth()->id(),
        'title' => $validatedData['title'],
        'description' => $validatedData['description'],
        'goal_amount' => $validatedData['goal_amount'],
        'start_date' => $validatedData['start_date'],
        'end_date' => $validatedData['end_date'],
        'category_id' => $validatedData['category_id'],
    ]);

    return redirect()->route('dashboard')->with('success', 'Projet créé avec succès !');
}

    public function update(Request $request, Project $project)
{
    if (auth()->id() !== $project->user_id) {
        abort(403, 'Vous n\'êtes pas autorisé à modifier ce projet.');
    }

    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'goal_amount' => 'required|numeric|min:1',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after:start_date',
        'category_id' => 'required|exists:categories,id',
    ]);

    $project->update([
        'title' => $request->title,
        'description' => $request->description,
        'goal_amount' => $request->goal_amount,
        'start_date' => $request->start_date,
        'end_date' => $request->end_date,
        'category_id' => $request->category_id,
    ]);

    return redirect()->route('dashboard')->with('success', 'Projet mis à jour avec succès !');
}

public function edit(Project $project)
{
    $categories = Category::all();
    
    // Convertir les dates en objets Carbon si ce sont des strings
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
public function myProjects()
{
    // Récupère uniquement les projets de l'utilisateur connecté
    $projects = Project::where('user_id', auth()->id())
                ->with('category')
                ->latest()
                ->paginate(10);

    $categories = Category::all();
    return view('projects.my-projects', compact('projects', 'categories'), ['current_step' => 1]);
}

public function createStep2(Request $request)
{
    // Valider les données de l'étape 1
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'goal_amount' => 'required|numeric|min:1',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after:start_date',
        'category_id' => 'required|exists:categories,id',
    ]);

    return view('projects.create-step2', [
        'step1_data' => $validated,
        'current_step' => 2
    ]);
}

public function createStep3(Request $request)
{
    // Valider les données de l'étape 2
    $validated = $request->validate([
        'project_images' => 'required|array',
        'project_images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    return view('projects.create-step3', [
        'step1_data' => $request->all(),
        'current_step' => 3
    ]);
}
}