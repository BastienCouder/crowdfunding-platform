<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comment;
use App\Models\User;
use App\Models\Project;

class CommentSeeder extends Seeder
{
    public function run()
    {
        $users = User::all();
        $projects = Project::all();

        foreach (range(1, 100) as $i) {
            Comment::create([
                'user_id' => $users->random()->id,
                'project_id' => $projects->random()->id,
                'content' => 'Ceci est un commentaire fictif ' . $i,
            ]);
        }
    }
}