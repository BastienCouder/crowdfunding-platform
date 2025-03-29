<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Category;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function welcome()
    {
        $endingSoonProjects = Project::where('is_draft', false)
            ->whereDate('end_date', '>=', now())
            ->orderBy('end_date', 'asc')
            ->take(3)
            ->with(['user', 'images'])
            ->get();
        
        return view('welcome', compact('endingSoonProjects'));
    }

    public function about()
    {
        return view('about');
    }

    public function howItWorks()
    {
        return view('how-it-works');
    }

    public function faq()
    {
        if (request()->ajax()) {
            $searchTerm = request('search');
            
            $results = \App\Models\Faq::where('question', 'like', '%'.$searchTerm.'%')
                ->orWhere('answer', 'like', '%'.$searchTerm.'%')
                ->get()
                ->groupBy('category');
                
            return response()->json($results);
        }
        
        // Récupération des données pour l'affichage initial
        $categories = [
            'general' => 'Questions générales',
            'creators' => 'Pour les porteurs de projets', 
            'contributors' => 'Pour les contributeurs',
            'payments' => 'Paiements et sécurité',
            'legal' => 'Aspects légaux et fiscaux'
        ];
        
        $faqsByCategory = [];
        
        foreach ($categories as $key => $name) {
            $faqsByCategory[$key] = \App\Models\Faq::where('category', $key)->get();
        }
        
        return view('faq', compact('categories', 'faqsByCategory'));
    }

    public function index(Request $request)
    {
        $user = auth()->user();
        $data = $this->getDashboardData($user, $request);

        if ($request->ajax() || $request->has('ajax')) {
            return $this->ajaxResponse($data);
        }

        return view('dashboard', $data);
    }

    private function getDashboardData($user, $request)
    {
        return [
            'projects' => $this->getFilteredProjects($user, $request),
            'categories' => Category::all(),
            ...$this->calculateMainStats($user),
            ...$this->calculateGrowthStats($user),
            ...$this->getChartData($user, $request)
        ];
    }

    private function getFilteredProjects($user, $request)
    {
        $query = $user->projects()->with(['category', 'contributions', 'images']);

        if ($request->has('status')) {
            $this->applyStatusFilter($query, $request->status);
        }

        if ($request->has('category')) {
            $query->where('category_id', $request->category);
        }

        if ($request->has('search')) {
            $query->where('title', 'like', '%'.$request->search.'%');
        }

        if ($request->has('sort')) {
            $this->applySorting($query, $request->sort);
        }

        return $query->paginate(10);
    }

    private function applyStatusFilter($query, $status)
    {
        switch ($status) {
            case 'active':
                $query->where('is_draft', false)
                     ->whereDate('end_date', '>=', now());
                break;
            case 'completed':
                $query->whereDate('end_date', '<', now());
                break;
            case 'draft':
                $query->where('is_draft', true);
                break;
        }
    }

    private function applySorting($query, $sort)
    {
        switch ($sort) {
            case 'oldest': 
                $query->oldest(); 
                break;
            case 'amount-high': 
                $query->withSum('contributions', 'amount')
                     ->orderBy('contributions_sum_amount', 'desc');
                break;
            case 'amount-low':
                $query->withSum('contributions', 'amount')
                     ->orderBy('contributions_sum_amount', 'asc');
                break;
            default: 
                $query->latest();
        }
    }

    private function calculateMainStats($user)
    {
        $activeProjects = $user->projects()
            ->where('is_draft', false)
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

        $completedProjects = $user->projects()
            ->whereDate('end_date', '<', now())
            ->get();

        $successfulProjects = $completedProjects->filter(function($project) {
            return $project->current_amount >= $project->goal_amount;
        })->count();

        $successRate = $completedProjects->count() > 0 
            ? round(($successfulProjects / $completedProjects->count()) * 100) 
            : 0;

        return [
            'activeProjects' => $activeProjects,
            'totalAmount' => $totalAmount,
            'totalContributors' => $totalContributors,
            'successRate' => $successRate,
        ];
    }

    private function calculateGrowthStats($user)
    {
        $lastMonthStart = now()->subMonth()->startOfMonth();
        $lastMonthEnd = now()->subMonth()->endOfMonth();
        $currentMonthStart = now()->startOfMonth();

        // Projects growth
        $lastMonthProjects = $user->projects()
            ->where('is_draft', false)
            ->whereBetween('created_at', [$lastMonthStart, $lastMonthEnd])
            ->count();

        $currentMonthProjects = $user->projects()
            ->where('is_draft', false)
            ->where('created_at', '>=', $currentMonthStart)
            ->count();

        $projectsGrowth = $this->calculateGrowthRate($currentMonthProjects, $lastMonthProjects);

        // Amount growth
        $lastMonthAmount = $this->getMonthlyContributionsSum($user, $lastMonthStart, $lastMonthEnd);
        $currentMonthAmount = $this->getMonthlyContributionsSum($user, $currentMonthStart);

        $amountGrowth = $this->calculateGrowthRate($currentMonthAmount, $lastMonthAmount);

        // Contributors growth
        $lastMonthContributors = $this->getMonthlyUniqueContributors($user, $lastMonthStart, $lastMonthEnd);
        $currentMonthContributors = $this->getMonthlyUniqueContributors($user, $currentMonthStart);

        $contributorsGrowth = $this->calculateGrowthRate($currentMonthContributors, $lastMonthContributors);

        // Success rate growth
        $lastMonthSuccessRate = $this->calculateMonthlySuccessRate($user, $lastMonthStart, $lastMonthEnd);
        $currentMonthSuccessRate = $this->calculateMonthlySuccessRate($user, $currentMonthStart);

        $successRateGrowth = $this->calculateGrowthRate($currentMonthSuccessRate, $lastMonthSuccessRate);

        return [
            'projectsGrowth' => $projectsGrowth,
            'amountGrowth' => $amountGrowth,
            'contributorsGrowth' => $contributorsGrowth,
            'successRateGrowth' => $successRateGrowth,
        ];
    }

    private function calculateMonthlySuccessRate($user, $startDate, $endDate = null)
    {
        $query = $user->projects()
            ->whereDate('end_date', '<', now());

        if ($endDate) {
            $query->whereBetween('created_at', [$startDate, $endDate]);
        } else {
            $query->where('created_at', '>=', $startDate);
        }

        $completedProjects = $query->get();

        $successfulProjects = $completedProjects->filter(function($project) {
            return $project->current_amount >= $project->goal_amount;
        })->count();

        return $completedProjects->count() > 0 
            ? round(($successfulProjects / $completedProjects->count()) * 100) 
            : 0;
    }

    private function getMonthlyContributionsSum($user, $startDate, $endDate = null)
    {
        $query = $user->projects()
            ->whereHas('contributions', function($q) use ($startDate, $endDate) {
                $q->whereDate('created_at', '>=', $startDate);
                if ($endDate) {
                    $q->whereDate('created_at', '<=', $endDate);
                }
            })
            ->withSum(['contributions' => function($q) use ($startDate, $endDate) {
                $q->whereDate('created_at', '>=', $startDate);
                if ($endDate) {
                    $q->whereDate('created_at', '<=', $endDate);
                }
            }], 'amount');

        return $query->get()->sum('contributions_sum_amount') ?? 0;
    }

    private function getMonthlyUniqueContributors($user, $startDate, $endDate = null)
    {
        return $user->projects()
            ->whereHas('contributions', function($q) use ($startDate, $endDate) {
                $q->whereDate('created_at', '>=', $startDate);
                if ($endDate) {
                    $q->whereDate('created_at', '<=', $endDate);
                }
            })
            ->join('contributions', 'projects.id', '=', 'contributions.project_id')
            ->whereDate('contributions.created_at', '>=', $startDate)
            ->when($endDate, function($q) use ($endDate) {
                $q->whereDate('contributions.created_at', '<=', $endDate);
            })
            ->distinct('contributions.user_id')
            ->count('contributions.user_id');
    }

    private function calculateGrowthRate($current, $previous)
    {
        return $previous > 0 
            ? round((($current - $previous) / $previous) * 100) 
            : ($current > 0 ? 100 : 0);
    }

    private function getChartData($user, $request)
    {
        return [
            'monthlyLabels' => $this->getMonthlyLabels(),
            'monthlyAmounts' => $this->getMonthlyAmounts($user, $request),
            'categoryNames' => $this->getCategoryNames($user, $request),
            'categoryAmounts' => $this->getCategoryAmounts($user, $request),
        ];
    }

    private function getMonthlyLabels()
    {
        return collect(range(5, 0))->map(function($i) {
            return now()->subMonths($i)->format('M Y');
        })->toArray();
    }

    private function getMonthlyAmounts($user, $request)
    {
        return collect(range(5, 0))->map(function($i) use ($user, $request) {
            $month = now()->subMonths($i);
            return $this->getContributionsForMonth($user, $month, $request);
        })->toArray();
    }

    private function getContributionsForMonth($user, $month, $request)
    {
        $monthStart = $month->copy()->startOfMonth();
        $monthEnd = $month->copy()->endOfMonth();
        
        $query = $user->projects();
        $this->applyFiltersToQuery($query, $request);
        
        return $query->whereHas('contributions', function($q) use ($monthStart, $monthEnd) {
                $q->whereBetween('created_at', [$monthStart, $monthEnd]);
            })
            ->withSum(['contributions' => function($q) use ($monthStart, $monthEnd) {
                $q->whereBetween('created_at', [$monthStart, $monthEnd]);
            }], 'amount')
            ->get()
            ->sum('contributions_sum_amount') ?? 0;
    }

    private function applyFiltersToQuery($query, $request)
    {
        if ($request->has('status')) {
            $this->applyStatusFilter($query, $request->status);
        }
        
        if ($request->has('category') && $request->category) {
            $query->where('category_id', $request->category);
        }
        
        if ($request->has('search') && $request->search) {
            $query->where('title', 'like', '%'.$request->search.'%');
        }
    }

    private function getCategoryNames($user, $request)
    {
        $query = $user->projects()->with('category');
        $this->applyFiltersToQuery($query, $request);
        
        return $query->get()
            ->groupBy('category.name')
            ->keys()
            ->toArray();
    }

    private function getCategoryAmounts($user, $request)
    {
        $query = $user->projects()->with('category');
        $this->applyFiltersToQuery($query, $request);
        
        return $query->withSum('contributions', 'amount')
            ->get()
            ->groupBy('category.name')
            ->map(function ($group) {
                return $group->sum('contributions_sum_amount');
            })
            ->values()
            ->toArray();
    }

    private function ajaxResponse($data)
    {
        return response()->json([
            'table' => view('partials.projects-table', [
                'projects' => $data['projects'],
                'categories' => $data['categories']
            ])->render(),
            'pagination' => $data['projects']->appends(request()->all())->links()->toHtml(),
            'stats' => view('partials.stats-cards', [
                'activeProjects' => $data['activeProjects'],
                'totalAmount' => $data['totalAmount'],
                'totalContributors' => $data['totalContributors'],
                'successRate' => $data['successRate'],
                'projectsGrowth' => $data['projectsGrowth'],
                'amountGrowth' => $data['amountGrowth'],
                'contributorsGrowth' => $data['contributorsGrowth'],
                'successRateGrowth' => $data['successRateGrowth']
            ])->render(),
            'monthlyLabels' => $data['monthlyLabels'],
            'monthlyAmounts' => $data['monthlyAmounts'],
            'categoryNames' => $data['categoryNames'],
            'categoryAmounts' => $data['categoryAmounts']
        ]);
    }
}