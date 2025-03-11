<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContributionController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/projets', [ProjectController::class, 'index'])->name('projects');
    Route::get('/projets/create', [ProjectController::class, 'create'])->name('projects.create');
    Route::post('/projets', [ProjectController::class, 'store'])->name('projects.store');
    Route::get('/projets/{project}', [ProjectController::class, 'show'])->name('projects.show');
    Route::get('/projets/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
    Route::delete('/projets/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');
    
    Route::post('/projets/{project}/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::post('/projets/{project}/contributions', [ContributionController::class, 'store'])->name('contributions.store');
});

require __DIR__.'/auth.php';