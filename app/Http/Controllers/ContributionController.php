<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contribution;
use App\Models\Project;

class ContributionController extends Controller
{
    public function index()
{
    // Récupérer les contributions de l'utilisateur connecté avec pagination
    $contributions = auth()->user()->contributions()
        ->with('project')
        ->orderBy('created_at', 'desc')
        ->paginate(10); // 10 éléments par page
    
    // Calculer les statistiques
    $totalAmount = auth()->user()->contributions()->sum('amount');
    $supportedProjects = auth()->user()->contributions()->distinct('project_id')->count('project_id');
    $averageAmount = $supportedProjects > 0 ? $totalAmount / $supportedProjects : 0;
    
    // Récupérer des projets recommandés (exemple simple)
    $recommendedProjects = Project::where('category_id', auth()->user()->preferred_category_id ?? 1)
        ->where('end_date', '>', now())
        ->inRandomOrder()
        ->take(3)
        ->get();
    
    return view('contribution.index', compact(
        'contributions',
        'totalAmount',
        'supportedProjects',
        'averageAmount',
        'recommendedProjects'
    ));
}

    public function store(Request $request, Project $project)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
        ]);

        $project->contributions()->create([
            'amount' => $request->amount,
            'user_id' => auth()->id(),
        ]);

        $project->increment('current_amount', $request->amount);

        return redirect()->route('projects.show', $project)->with('success', 'Merci pour votre contribution !');
    }
}