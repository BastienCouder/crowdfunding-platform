<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contribution;
use App\Models\Project;

class ContributionController extends Controller
{
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