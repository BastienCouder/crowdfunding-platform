<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comment;
use App\Models\User;
use App\Models\Project;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    public function run()
    {
        $users = User::all();
        $projects = Project::all();

        // Création des commentaires
        $comments = [];
        foreach (range(1, 100) as $i) {
            $comment = Comment::create([
                'user_id' => $users->random()->id,
                'project_id' => $projects->random()->id,
                'content' => 'Ceci est un commentaire fictif ' . $i,
                'created_at' => now()->subDays(rand(0, 30)),
            ]);
            $comments[] = $comment;
        }

        // Ajout des likes aléatoires
        foreach ($comments as $comment) {
            // Sélectionner un nombre aléatoire d'utilisateurs qui vont liker (entre 0 et 10)
            $likers = $users->random(rand(0, 10));
            
            foreach ($likers as $user) {
                // Vérifier que l'utilisateur n'est pas l'auteur du commentaire
                if ($user->id !== $comment->user_id) {
                    // Ajouter le like avec une date aléatoire
                    DB::table('comment_likes')->insert([
                        'user_id' => $user->id,
                        'comment_id' => $comment->id,
                        'created_at' => now()->subDays(rand(0, 30)),
                    ]);
                }
            }
        }
    }
}