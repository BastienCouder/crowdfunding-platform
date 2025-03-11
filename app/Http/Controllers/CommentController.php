<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Project;

class CommentController extends Controller
{
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