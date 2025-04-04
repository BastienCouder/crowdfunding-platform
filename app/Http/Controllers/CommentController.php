<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Project;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index(Request $request)
    {
        $data = $this->getCommentsData($request);

        if ($request->ajax()) {
            return $this->ajaxResponse($data);
        }

        return view('comment.index', $data);
    }

    private function getCommentsData($request)
    {
        $user = auth()->user();
        
        return [
            'comments' => $this->getFilteredComments($user, $request),
            'totalComments' => $this->calculateTotalComments($user),
            'commentedProjects' => $this->calculateCommentedProjects($user),
            'receivedReplies' => $this->calculateReceivedReplies($user),
            'projects' => $this->getUserCommentedProjects($user),
            'popularProjects' => $this->getPopularProjects()
        ];
    }

    private function getFilteredComments($user, $request)
    {
        $query = $user->comments()
                    ->with([
                        'project.images', 
                        'replies.user',
                        'project.category',
                        'likes'
                    ])
                    ->withCount(['likes', 'replies']);

        // Filtre de recherche
        if ($request->has('search') && $request->search) {
            $query->where('content', 'like', '%'.$request->search.'%');
        }

        // Filtre par projet
        if ($request->has('project') && $request->project) {
            $query->where('project_id', $request->project);
        }

        // Filtre par date
        if ($request->has('date') && $request->date) {
            $this->applyDateFilter($query, $request->date);
        }

        // Tri
        $this->applySorting($query, $request->sort ?? 'newest');

        return $query->paginate(10);
    }

    private function applyDateFilter($query, $dateFilter)
    {
        switch ($dateFilter) {
            case 'this-week':
                $query->whereBetween('created_at', [
                    now()->startOfWeek(),
                    now()->endOfWeek()
                ]);
                break;
            case 'this-month':
                $query->whereBetween('created_at', [
                    now()->startOfMonth(),
                    now()->endOfMonth()
                ]);
                break;
            case 'last-month':
                $query->whereBetween('created_at', [
                    now()->subMonth()->startOfMonth(),
                    now()->subMonth()->endOfMonth()
                ]);
                break;
            case 'this-year':
                $query->whereBetween('created_at', [
                    now()->startOfYear(),
                    now()->endOfYear()
                ]);
                break;
        }
    }

    private function applySorting($query, $sort)
    {
        switch ($sort) {
            case 'newest':
                $query->orderBy('created_at', 'desc');
                break;
            case 'oldest':
                $query->orderBy('created_at', 'asc');
                break;
            case 'most-liked':
                $query->orderBy('likes_count', 'desc');
                break;
            case 'most-replied':
                $query->orderBy('replies_count', 'desc');
                break;
        }
    }

    public function store(Request $request, Project $project)
    {
        $validated = $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $comment = new Comment();
        $comment->content = $validated['content'];
        $comment->user_id = Auth::id();
        $comment->project_id = $project->id;
        $comment->save();

        return redirect()
            ->route('projects.show', $project)
            ->with('success', 'Commentaire ajouté avec succès !');
    }

    private function calculateTotalComments($user)
    {
        return $user->comments()->count();
    }

    private function calculateCommentedProjects($user)
    {
        return $user->comments()->distinct('project_id')->count('project_id');
    }

    private function calculateReceivedReplies($user)
    {
        return $user->comments()->withCount('replies')->get()->sum('replies_count');
    }

    private function getUserCommentedProjects($user)
    {
        return $user->comments()
                ->with('project')
                ->get()
                ->pluck('project')
                ->unique('id')
                ->sortBy('title');
    }

    private function getPopularProjects()
    {
        return Project::withCount('comments')
                ->with('images')
                ->where('end_date', '>', now())
                ->orderBy('comments_count', 'desc')
                ->take(3)
                ->get();
    }

    private function ajaxResponse($data)
    {
        return response()->json([
            'comments' => view('comment.partials.comments-list', [
                'comments' => $data['comments']
            ])->render(),
            'pagination' => $data['comments']->appends(request()->all())->links()->toHtml(),
            'stats' => [
                'totalComments' => $data['totalComments'],
                'commentedProjects' => $data['commentedProjects'],
                'receivedReplies' => $data['receivedReplies']
            ]
        ]);
    }

    public function update(Request $request, Comment $comment)
    {
        $this->authorize('update', $comment);

        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $comment->update(['content' => $request->content]);

        return back()->with('success', 'Commentaire mis à jour avec succès.');
    }

    public function destroy(Comment $comment)
    {
        $this->authorize('delete', $comment);

        $comment->delete();

        return back()->with('success', 'Commentaire supprimé avec succès.');
    }
}