<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Project;
use App\Models\Contribution;
use App\Models\Comment;
use App\Models\CommentLike;
use App\Models\ProjectImage;
use App\Models\UpdateProjectCurrentAmount;

class DatabaseSeeder extends Seeder
{
    public function run()
    {

        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            ProjectSeeder::class,
            ContributionSeeder::class,
            CommentSeeder::class,
            UpdateProjectCurrentAmountSeeder::class,
        ]);
    }
}