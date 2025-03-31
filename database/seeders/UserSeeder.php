<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Listes de prénoms et noms français
        $firstNames = [
            'Jean', 'Marie', 'Pierre', 'Anne', 'Luc', 'Sophie', 'Claude', 'Isabelle', 'François', 'Nathalie',
            'Thomas', 'Valérie', 'David', 'Catherine', 'Christophe', 'Sandrine', 'Nicolas', 'Emilie', 'Olivier', 'Caroline'
        ];

        $lastNames = [
            'Dupont', 'Martin', 'Bernard', 'Thomas', 'Robert', 'Petit', 'Durand', 'Leroy', 'Moreau', 'Simon',
            'Laurent', 'Lefebvre', 'Michel', 'Garcia', 'David', 'Bertrand', 'Roux', 'Vincent', 'Fournier', 'Morel'
        ];

        // Créer un utilisateur admin
        User::create([
            'name' => 'Admin Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'avatar' => 'https://randomuser.me/api/portraits/men/0.jpg', // Avatar spécifique pour l'admin
            'bio' => 'Administrateur de la plateforme.',
        ]);

        // Créer 10 utilisateurs avec des noms et avatars réalistes
        for ($i = 1; $i <= 10; $i++) {
            $firstName = $firstNames[array_rand($firstNames)]; // Sélection aléatoire d'un prénom
            $lastName = $lastNames[array_rand($lastNames)]; // Sélection aléatoire d'un nom
            $gender = ($i % 2 === 0) ? 'women' : 'men'; // Alterner entre hommes et femmes

            User::create([
                'name' => $firstName . ' ' . $lastName,
                'email' => strtolower($firstName) . '.' . strtolower($lastName) . '@example.com',
                'password' => Hash::make('password'),
                'role' => 'user',
                'avatar' => 'https://randomuser.me/api/portraits/' . $gender . '/' . $i . '.jpg', // Avatar réaliste
                'bio' => 'Je suis un utilisateur de la plateforme.',
            ]);
        }
    }
}