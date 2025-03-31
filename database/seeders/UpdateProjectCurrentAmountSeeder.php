<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Contribution;

class UpdateProjectCurrentAmountSeeder extends Seeder
{
    public function run()
    {
        $projects = Project::all();

        foreach ($projects as $project) {
           
            $totalContributions = Contribution::where('project_id', $project->id)->sum('amount');

            $project->update([
                'current_amount' => $totalContributions,
            ]);
        }
    }
}