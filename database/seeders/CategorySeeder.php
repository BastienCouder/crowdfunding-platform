<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            'Écologie',
            'Énergie renouvelable',
            'Agriculture durable',
            'Recyclage',
            'Protection des animaux',
        ];

        foreach ($categories as $category) {
            Category::create(['name' => $category]);
        }
    }
}