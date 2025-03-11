<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Category;
use App\Models\User;
use App\Models\ProjectImage;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run()
    {
        $categories = Category::all();
        $users = User::all();

        $projects = [
            [
                'title' => 'Parc éolien',
                'description' => 'Soutenez la construction d\'un parc éolien en Bretagne pour produire de l\'énergie renouvelable.',
                'goal_amount' => 150000,
                'current_amount' => 0,
                'category_id' => $categories->where('name', 'Énergie renouvelable')->first()->id,
                'images' => [
                    'https://images.unsplash.com/photo-1546883648-8c5648200abc?q=80&w=2074&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                    'https://images.unsplash.com/photo-1598491621613-b1e4460573a0?q=80&w=2087&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                    'https://images.unsplash.com/photo-1591500785381-d2ba7749e941?q=80&w=2069&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                ],
            ],
            [
                'title' => 'Reforestation dans les Vosges',
                'description' => 'Aidez-nous à planter 5 000 arbres dans le massif des Vosges pour restaurer la biodiversité.',
                'goal_amount' => 25000,
                'category_id' => $categories->where('name', 'Écologie')->first()->id,
                'images' => [
                    'https://images.unsplash.com/photo-1546883648-8c5648200abc?q=80&w=2074&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                    'https://source.unsplash.com/640x480/?windmill,france',
                    'https://source.unsplash.com/640x480/?energy,france',
                ],
            ],
            [
                'title' => 'Ferme biologique',
                'description' => 'Soutenez une ferme biologique en Provence qui promeut une agriculture durable et locale.',
                'goal_amount' => 50000,
                'category_id' => $categories->where('name', 'Agriculture durable')->first()->id,
                'images' => [
                    'https://images.unsplash.com/photo-1546883648-8c5648200abc?q=80&w=2074&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                    'https://source.unsplash.com/640x480/?windmill,france',
                    'https://source.unsplash.com/640x480/?energy,france',
                ],
            ],
            [
                'title' => 'Centre de recyclage',
                'description' => 'Financez un centre de recyclage innovant à Lyon pour réduire les déchets et promouvoir l\'économie circulaire.',
                'goal_amount' => 75000,
                'category_id' => $categories->where('name', 'Recyclage')->first()->id,
                'images' => [
                    'https://images.unsplash.com/photo-1546883648-8c5648200abc?q=80&w=2074&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                    'https://source.unsplash.com/640x480/?windmill,france',
                    'https://source.unsplash.com/640x480/?energy,france',
                ],
            ],
            [
                'title' => 'Protection des loups dans les Alpes',
                'description' => 'Participez à la protection des loups dans les Alpes françaises pour préserver la biodiversité.',
                'goal_amount' => 30000,
                'category_id' => $categories->where('name', 'Protection des animaux')->first()->id,
                'images' => [
                    'https://images.unsplash.com/photo-1546883648-8c5648200abc?q=80&w=2074&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                    'https://source.unsplash.com/640x480/?windmill,france',
                    'https://source.unsplash.com/640x480/?energy,france',
                ],
            ],
        ];

        foreach ($projects as $projectData) {
            $project = Project::create([
                'user_id' => $users->random()->id,
                'title' => $projectData['title'],
                'description' => $projectData['description'],
                'goal_amount' => $projectData['goal_amount'],
                'current_amount' => 0,
                'start_date' => now(),
                'end_date' => now()->addMonths(6),
                'status' => 'pending',
                'category_id' => $projectData['category_id'],
            ]);


            foreach ($projectData['images'] as $imageUrl) {
                ProjectImage::create([
                    'project_id' => $project->id,
                    'image_url' => $imageUrl,
                ]);
            }
        }
    }
}