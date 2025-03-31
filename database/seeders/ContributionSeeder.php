<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contribution;
use App\Models\User;
use App\Models\Project;

class ContributionSeeder extends Seeder
{
    public function run()
    {
        $users = User::all();
        $projects = Project::all();

        foreach (range(1, 50) as $i) {
            Contribution::create([
                'user_id' => $users->random()->id,
                'project_id' => $projects->random()->id,
                'amount' => rand(10, 500),
                'anonymous' => rand(0, 1),
            ]);
        }
    }
}