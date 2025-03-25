<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
/**
 * Show the application dashboard.
 *
 * @return \Illuminate\Contracts\Support\Renderable
 */
public function index()
{
    $user = auth()->user();
    $projects = $user->projects()->with(['category', 'contributions', 'images'])->latest()->paginate(10);
    
    // Récupérer toutes les catégories pour les filtres
    $categories = \App\Models\Category::all();
    
    // Statistiques globales
    $activeProjects = $user->projects()->where('is_draft', false)
        ->whereDate('end_date', '>=', now())
        ->count();
    
    $totalAmount = $user->projects()
        ->withSum('contributions', 'amount')
        ->get()
        ->sum('contributions_sum_amount') ?? 0;
    
    $totalContributors = $user->projects()
        ->withCount('contributions')
        ->get()
        ->sum('contributions_count');
    
    // Calculer le taux de réussite (projets qui ont atteint leur objectif)
    $completedProjects = $user->projects()
        ->whereDate('end_date', '<', now())
        ->get();
    
    $successfulProjects = $completedProjects->filter(function($project) {
        return $project->current_amount >= $project->goal_amount;
    })->count();
    
    $successRate = $completedProjects->count() > 0 
        ? round(($successfulProjects / $completedProjects->count()) * 100) 
        : 0;
    
    // Données pour les indicateurs de croissance (comparaison avec le mois précédent)
    $lastMonthStart = now()->subMonth()->startOfMonth();
    $lastMonthEnd = now()->subMonth()->endOfMonth();
    $currentMonthStart = now()->startOfMonth();
    
    // Projets actifs - croissance
    $lastMonthActiveProjects = $user->projects()
        ->where('is_draft', false)
        ->whereDate('created_at', '>=', $lastMonthStart)
        ->whereDate('created_at', '<=', $lastMonthEnd)
        ->count();
    
    $currentMonthActiveProjects = $user->projects()
        ->where('is_draft', false)
        ->whereDate('created_at', '>=', $currentMonthStart)
        ->count();
    
    $projectsGrowth = $lastMonthActiveProjects > 0 
        ? round((($currentMonthActiveProjects - $lastMonthActiveProjects) / $lastMonthActiveProjects) * 100) 
        : ($currentMonthActiveProjects > 0 ? 100 : 0);
    
    // Montant collecté - croissance
    $lastMonthAmount = $user->projects()
        ->whereHas('contributions', function($query) use ($lastMonthStart, $lastMonthEnd) {
            $query->whereDate('created_at', '>=', $lastMonthStart)
                  ->whereDate('created_at', '<=', $lastMonthEnd);
        })
        ->withSum(['contributions' => function($query) use ($lastMonthStart, $lastMonthEnd) {
            $query->whereDate('created_at', '>=', $lastMonthStart)
                  ->whereDate('created_at', '<=', $lastMonthEnd);
        }], 'amount')
        ->get()
        ->sum('contributions_sum_amount') ?? 0;
    
    $currentMonthAmount = $user->projects()
        ->whereHas('contributions', function($query) use ($currentMonthStart) {
            $query->whereDate('created_at', '>=', $currentMonthStart);
        })
        ->withSum(['contributions' => function($query) use ($currentMonthStart) {
            $query->whereDate('created_at', '>=', $currentMonthStart);
        }], 'amount')
        ->get()
        ->sum('contributions_sum_amount') ?? 0;
    
    $amountGrowth = $lastMonthAmount > 0 
        ? round((($currentMonthAmount - $lastMonthAmount) / $lastMonthAmount) * 100) 
        : ($currentMonthAmount > 0 ? 100 : 0);
    
    // Contributeurs - croissance
    $lastMonthContributors = $user->projects()
        ->whereHas('contributions', function($query) use ($lastMonthStart, $lastMonthEnd) {
            $query->whereDate('created_at', '>=', $lastMonthStart)
                  ->whereDate('created_at', '<=', $lastMonthEnd);
        })
        ->withCount(['contributions' => function($query) use ($lastMonthStart, $lastMonthEnd) {
            $query->whereDate('created_at', '>=', $lastMonthStart)
                  ->whereDate('created_at', '<=', $lastMonthEnd)
                  ->distinct('user_id');
        }])
        ->get()
        ->sum('contributions_count');
    
    $currentMonthContributors = $user->projects()
        ->whereHas('contributions', function($query) use ($currentMonthStart) {
            $query->whereDate('created_at', '>=', $currentMonthStart);
        })
        ->withCount(['contributions' => function($query) use ($currentMonthStart) {
            $query->whereDate('created_at', '>=', $currentMonthStart)
                  ->distinct('user_id');
        }])
        ->get()
        ->sum('contributions_count');
    
    $contributorsGrowth = $lastMonthContributors > 0 
        ? round((($currentMonthContributors - $lastMonthContributors) / $lastMonthContributors) * 100) 
        : ($currentMonthContributors > 0 ? 100 : 0);
    
    // Taux de réussite - croissance (fictif pour l'exemple)
    $successRateGrowth = 5; // Valeur fictive, à adapter selon vos besoins
    
    // Données pour le graphique d'évolution des collectes
    $monthlyData = [];
    for ($i = 5; $i >= 0; $i--) {
        $month = now()->subMonths($i);
        $monthStart = $month->copy()->startOfMonth();
        $monthEnd = $month->copy()->endOfMonth();
        
        $monthlyAmount = $user->projects()
            ->whereHas('contributions', function($query) use ($monthStart, $monthEnd) {
                $query->whereDate('created_at', '>=', $monthStart)
                      ->whereDate('created_at', '<=', $monthEnd);
            })
            ->withSum(['contributions' => function($query) use ($monthStart, $monthEnd) {
                $query->whereDate('created_at', '>=', $monthStart)
                      ->whereDate('created_at', '<=', $monthEnd);
            }], 'amount')
            ->get()
            ->sum('contributions_sum_amount') ?? 0;
        
        $monthlyLabels[] = $month->format('M Y');
        $monthlyAmounts[] = $monthlyAmount;
    }
    
    // Données pour le graphique de répartition par catégorie
    $categoryData = $user->projects()
        ->with('category')
        ->withSum('contributions', 'amount')
        ->get()
        ->groupBy('category.name')
        ->map(function ($group) {
            return $group->sum('contributions_sum_amount');
        });
    
    $categoryNames = $categoryData->keys()->toArray();
    $categoryAmounts = $categoryData->values()->toArray();
    
    return view('dashboard', compact(
        'projects',
        'categories',
        'activeProjects',
        'projectsGrowth',
        'totalAmount',
        'amountGrowth',
        'totalContributors',
        'contributorsGrowth',
        'successRate',
        'successRateGrowth',
        'monthlyLabels',
        'monthlyAmounts',
        'categoryNames',
        'categoryAmounts'
    ));
}
}
