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
        // Gather statistics
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

        // Recent projects
        $recent_projects = Project::with(['user', 'category', 'images'])
            ->latest()
            ->take(5)
            ->get();

        // Recent users
        $recent_users = User::latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'recent_projects', 'recent_users'));
    }
  /**
     * Display the projects admin page.
     *
     * @return \Illuminate\Http\Response
     */
    public function projects()
    {
        $projects = Project::with(['user', 'category', 'images'])->latest()->paginate(10);
        $categories = Category::all();

        return view('admin.projects', compact('projects', 'categories'));
    }

    /**
     * Display the users admin page.
     *
     * @return \Illuminate\Http\Response
     */
    public function users()
    {
        $users = User::withCount(['projects', 'contributions'])->latest()->paginate(10);

        return view('admin.users', compact('users'));
    }

    /**
     * Update the status of a project.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function updateProjectStatus(Request $request, Project $project)
    {
        $request->validate([
            'status' => 'required|in:pending,approved,rejected',
            'comment' => 'nullable|string|max:500',
        ]);

        $project->status = $request->status;
        $project->admin_comment = $request->comment;
        $project->save();

        // Notify the project owner
        // You can implement notification logic here

        return redirect()->route('admin.projects')->with('success', 'Le statut du projet a été mis à jour avec succès.');
    }

    /**
     * Store a newly created user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'is_admin' => 'sometimes|boolean',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->is_admin = $request->has('is_admin');
        $user->avatar = 'https://ui-avatars.com/api/?name=' . urlencode($request->name) . '&color=7F9CF5&background=EBF4FF';
        $user->save();

        return redirect()->route('admin.users')->with('success', 'L\'utilisateur a été créé avec succès.');
    }

    /**
     * Get user data for editing.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function editUser(User $user)
    {
        return response()->json([
            'name' => $user->name,
            'email' => $user->email,
            'is_admin' => $user->is_admin,
        ]);
    }

    /**
     * Update the specified user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function updateUser(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'is_admin' => 'sometimes|boolean',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        
        $user->is_admin = $request->has('is_admin');
        $user->save();

        return redirect()->route('admin.users')->with('success', 'L\'utilisateur a été mis à jour avec succès.');
    }

    /**
     * Remove the specified user.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroyUser(User $user)
    {
        // Prevent self-deletion
        if (Auth::id() === $user->id) {
            return redirect()->route('admin.users')->with('error', 'Vous ne pouvez pas supprimer votre propre compte.');
        }

        // Delete user's projects
        foreach ($user->projects as $project) {
            $project->delete();
        }

        $user->delete();

        return redirect()->route('admin.users')->with('success', 'L\'utilisateur et tous ses projets ont été supprimés avec succès.');
    }
}