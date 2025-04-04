<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Hash;
use App\Models\Contribution;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:access-admin');
    }

    public function index()
    {
        $stats = [
            'total_projects' => Project::count(),
            'total_users' => User::count(),
            'total_contributions' => Contribution::count(),
            'total_amount' => Contribution::sum('amount'),
            'pending_projects' => Project::where('status', 'pending')->count(),
            'approved_projects' => Project::where('status', 'approved')->count(),
            'rejected_projects' => Project::where('status', 'rejected')->count(),
            'projects_by_category' => Category::withCount('projects')
                ->orderByDesc('projects_count')
                ->get()
                ->map(function ($category) {
                    return [
                        'name' => $category->name,
                        'count' => $category->projects_count
                    ];
                })
        ];

        $recent_projects = Project::with(['user', 'category', 'images'])
            ->latest()
            ->take(5)
            ->get();

        $recent_users = User::latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'recent_projects', 'recent_users'));
    }

    public function projects()
    {
        $projects = Project::with(['user', 'category', 'images'])->latest()->paginate(10);
        $categories = Category::all();

        return view('admin.projects', compact('projects', 'categories'));
    }

    public function users()
    {
        $users = User::withCount(['projects', 'contributions'])->latest()->paginate(10);
        return view('admin.users', compact('users'));
    }

    public function updateProjectStatus(Request $request, Project $project)
    {
        $request->validate([
            'status' => 'required|in:pending,approved,rejected',
        ]);

        $project->status = $request->status;
        $project->save();

        return redirect()->route('admin.projects')->with('success', 'Le statut du projet a été mis à jour avec succès.');
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:user,admin',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);
  
        return redirect()->route('admin.users')->with('success', 'Utilisateur créé avec succès.');
    }

    public function editUser(User $user)
    {
        return response()->json([
            'name' => $user->name,
            'email' => $user->email,
            'role' => $user->role,
        ]);
    }

    public function updateUser(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'role' => 'required|in:user,admin',
        ]);
        
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ];
      
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);
        return redirect()->route('admin.users')->with('success', 'Utilisateur mis à jour avec succès.');
    }

    public function destroyUser(User $user)
    {
        if (Auth::id() === $user->id) {
            return redirect()->route('admin.users')->with('error', 'Vous ne pouvez pas supprimer votre propre compte.');
        }

        $user->projects()->delete();
        $user->delete();

        return redirect()->route('admin.users')->with('success', 'Utilisateur et tous ses projets supprimés avec succès.');
    }
}