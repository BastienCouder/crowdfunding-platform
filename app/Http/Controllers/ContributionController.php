<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contribution;
use App\Models\Project;
use Carbon\Carbon;

class ContributionController extends Controller
{
    public function index(Request $request)
    {
        $data = $this->getContributionsData($request);

        if ($request->ajax()) {
            return $this->ajaxResponse($data);
        }

        return view('contribution.index', $data);
    }

    public function store(Request $request, Project $project)
    {
        // Validation des données
        $validated = $request->validate([
            'amount' => 'required|numeric|min:1',
            'tier_index' => 'nullable|integer|min:0',
            'anonymous' => 'sometimes|boolean',
        ]);
    
        // Vérification que le projet peut recevoir des contributions
        if ($project->end_date < now() || $project->status !== 'approved') {
            return back()->with('error', 'Ce projet ne peut plus recevoir de contributions.');
        }

        try {
            // Création de la contribution
            $contribution = Contribution::create([
                'user_id' => auth()->id(),
                'project_id' => $project->id,
                'amount' => $validated['amount'],
                'anonymous' => $validated['anonymous'] ?? false,
            ]);

            // Mise à jour du montant collecté du projet
            $project->increment('current_amount', $validated['amount']);
    
            // Vérification si le projet a atteint son objectif
            if ($project->current_amount >= $project->goal_amount) {
                $project->update(['status' => 'funded']);
            }
            dd($contribution);
            return redirect()
                ->route('projects.show', $project)
                ->with('success', 'Merci pour votre contribution !');
    
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->with('error', 'Une erreur est survenue lors de votre contribution.');
        }
    }
    
    // Méthode pour récupérer la récompense du palier
    private function getTierReward(Project $project, $tierIndex)
    {
        if ($tierIndex === null || !isset($project->funding_tiers[$tierIndex])) {
            return null;
        }
    
        return $project->funding_tiers[$tierIndex]['title'] ?? null;
    }
    
    // Méthode pour récupérer la description du palier
    private function getTierDescription(Project $project, $tierIndex)
    {
        if ($tierIndex === null || !isset($project->funding_tiers[$tierIndex])) {
            return null;
        }
    
        return $project->funding_tiers[$tierIndex]['description'] ?? null;
    }

    private function getContributionsData($request)
    {
        $user = auth()->user();
        
        return [
            'contributions' => $this->getFilteredContributions($user, $request),
            'totalAmount' => $this->calculateTotalAmount($user),
            'supportedProjects' => $this->calculateSupportedProjects($user),
            'averageAmount' => $this->calculateAverageAmount($user),
            'recommendedProjects' => $this->getRecommendedProjects($user)
        ];
    }

    private function getFilteredContributions($user, $request)
    {
        $query = $user->contributions()
                    ->with(['project.category', 'project.images'])
                    ->join('projects', 'contributions.project_id', '=', 'projects.id');

        // Filtre de recherche
        if ($request->has('search') && $request->search) {
            $query->where(function($q) use ($request) {
                $q->where('projects.title', 'like', '%'.$request->search.'%')
                  ->orWhere('projects.description', 'like', '%'.$request->search.'%');
            });
        }

        // Filtre par statut
        if ($request->has('status') && $request->status) {
            switch ($request->status) {
                case 'completed':
                    $query->where('projects.current_amount', '>=', 'projects.goal_amount')
                          ->where('projects.end_date', '<', now());
                    break;
                case 'active':
                    $query->where('projects.end_date', '>=', now());
                    break;
                case 'failed':
                    $query->where('projects.current_amount', '<', 'projects.goal_amount')
                          ->where('projects.end_date', '<', now());
                    break;
            }
        }

        // Filtre par date
        if ($request->has('date-filter') && $request->{'date-filter'}) {
            switch ($request->{'date-filter'}) {
                case 'this-month':
                    $query->whereBetween('contributions.created_at', [
                        now()->startOfMonth(),
                        now()->endOfMonth()
                    ]);
                    break;
                case 'last-month':
                    $query->whereBetween('contributions.created_at', [
                        now()->subMonth()->startOfMonth(),
                        now()->subMonth()->endOfMonth()
                    ]);
                    break;
                case 'this-year':
                    $query->whereBetween('contributions.created_at', [
                        now()->startOfYear(),
                        now()->endOfYear()
                    ]);
                    break;
                case 'last-year':
                    $query->whereBetween('contributions.created_at', [
                        now()->subYear()->startOfYear(),
                        now()->subYear()->endOfYear()
                    ]);
                    break;
            }
        }

        // Tri
        switch ($request->sort ?? 'newest') {
            case 'newest':
                $query->orderBy('contributions.created_at', 'desc');
                break;
            case 'oldest':
                $query->orderBy('contributions.created_at', 'asc');
                break;
            case 'amount-high':
                $query->orderBy('contributions.amount', 'desc');
                break;
            case 'amount-low':
                $query->orderBy('contributions.amount', 'asc');
                break;
        }

        return $query->paginate(10);
    }

    private function calculateTotalAmount($user)
    {
        return $user->contributions()->sum('amount');
    }

    private function calculateSupportedProjects($user)
    {
        return $user->contributions()->distinct('project_id')->count('project_id');
    }

    private function calculateAverageAmount($user)
    {
        $total = $this->calculateTotalAmount($user);
        $count = $this->calculateSupportedProjects($user);
        
        return $count > 0 ? round($total / $count) : 0;
    }

    private function getRecommendedProjects($user)
    {
        return Project::where('category_id', $user->preferred_category_id ?? 1)
                    ->where('end_date', '>', now())
                    ->where('user_id', '!=', $user->id)
                    ->inRandomOrder()
                    ->take(3)
                    ->with(['category', 'images'])
                    ->get();
    }

    private function ajaxResponse($data)
    {
        return response()->json([
            'table' => view('contribution.partials.contributions-table', [
                'contributions' => $data['contributions']
            ])->render(),
            'pagination' => $data['contributions']->appends(request()->all())->links()->toHtml(),
            'stats' => [
                'totalAmount' => number_format($data['totalAmount'], 0, ',', ' '),
                'supportedProjects' => $data['supportedProjects'],
                'averageAmount' => number_format($data['averageAmount'], 0, ',', ' ')
            ]
        ]);
    }
}