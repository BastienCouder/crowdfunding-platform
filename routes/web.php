<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContributionController;
use App\Http\Controllers\MigrationCheckerController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/check-migrations', [MigrationCheckerController::class, 'updateMigrations']);

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        // Modifiez cette partie pour les projets
        Route::prefix('projets')->group(function () {
               
            Route::get('/my-projects', [ProjectController::class, 'myProjects'])->name('projects.my-projects');
            Route::get('/', [ProjectController::class, 'index'])->name('projects.index');
            Route::get('/create', [ProjectController::class, 'create'])->name('projects.create');
            Route::post('/projects/create-step2', [ProjectController::class, 'createStep2'])->name('projects.create-step2');
            Route::post('/projects/create-step3', [ProjectController::class, 'createStep3'])->name('projects.create-step3');
            Route::post('/', [ProjectController::class, 'store'])->name('projects.store');
            Route::get('/{project}', [ProjectController::class, 'show'])->name('projects.show');
            Route::get('/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
            Route::put('/{project}', [ProjectController::class, 'update'])->name('projects.update');
            Route::delete('/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');
        });
    
    Route::post('/projets/{project}/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::post('/projets/{project}/contributions', [ContributionController::class, 'store'])->name('contributions.store');
});

require __DIR__.'/auth.php';