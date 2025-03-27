<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        $comments = $user->comments()
            ->with([
                'project.images', 
                'replies.user', 
                'project.category',
                'likes'
            ])
            ->withCount(['likes', 'replies'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $totalComments = $user->comments()->count();
        $commentedProjects = $user->comments()->distinct('project_id')->count('project_id');
        $receivedReplies = $user->comments()->withCount('replies')->get()->sum('replies_count');

        $projects = $user->comments()
            ->with('project')
            ->get()
            ->pluck('project')
            ->unique('id')
            ->sortBy('title');

        $popularProjects = Project::withCount('comments')
            ->with('images')
            ->where('end_date', '>', now())
            ->orderBy('comments_count', 'desc')
            ->take(3)
            ->get();

        return view('comment.index', compact(
            'comments',
            'totalComments',
            'commentedProjects',
            'receivedReplies',
            'projects',
            'popularProjects'
        ));
    }

    public function update(Request $request, Comment $comment)
    {
        $this->authorize('update', $comment);

        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $comment->update(['content' => $request->content]);

        return redirect()->route('comments.index')
            ->with('success', 'Commentaire mis à jour avec succès.');
    }

    public function destroy(Comment $comment)
    {
        $this->authorize('delete', $comment);

        $comment->delete();

        return redirect()->route('comments.index')
            ->with('success', 'Commentaire supprimé avec succès.');
    }

    
    public function store(Request $request, Project $project)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $project->comments()->create([
            'content' => $request->content,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('projects.show', $project)->with('success', 'Commentaire ajouté avec succès !');
    }
}