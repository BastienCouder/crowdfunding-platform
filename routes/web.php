<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContributionController;
use App\Http\Controllers\MigrationCheckerController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'welcome'])->name('welcome');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/how-it-works', [HomeController::class, 'howItWorks'])->name('how-it-works');
Route::get('/faq', [HomeController::class, 'faq'])->name('faq');
Route::get('/faq/search', [FaqController::class, 'search'])->name('faq.search');

// Routes publiques pour les projets
Route::get('/projets', [ProjectController::class, 'index'])->name('projects.index');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    
    Route::get('/contributions', [ContributionController::class, 'index'])->name('contributions.index');
    Route::get('/comments', [CommentController::class, 'index'])->name('comments.index');
    Route::put('/comments/{comment}', [CommentController::class, 'update'])->name('comments.update');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Routes protégées pour les projets
    Route::prefix('projets')->group(function () {
        Route::get('/my-projects', [ProjectController::class, 'myProjects'])->name('projects.my-projects');
        Route::get('/create', [ProjectController::class, 'create'])->name('projects.create');
        Route::post('/create/step1', [ProjectController::class, 'storeStep1'])->name('projects.store-step1');
        Route::get('/create/step2', [ProjectController::class, 'showStep2'])->name('projects.show-step2');
        Route::post('/create/step2', [ProjectController::class, 'storeStep2'])->name('projects.store-step2');
        Route::get('/create/step3', [ProjectController::class, 'showStep3'])->name('projects.show-step3');
        Route::post('/create/step3', [ProjectController::class, 'storeStep3'])->name('projects.store-step3');
        Route::post('/', [ProjectController::class, 'store'])->name('projects.store');
        
        Route::get('/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
        Route::put('/{project}', [ProjectController::class, 'update'])->name('projects.update');
        Route::delete('/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');

        Route::post('/{project}/comments', [CommentController::class, 'store'])->name('comments.store');
        Route::post('/{project}/contributions', [ContributionController::class, 'store'])->name('contributions.store');
    });
    
    Route::get('/projets/{project}', [ProjectController::class, 'show'])->name('projects.show');
    
    Route::middleware(['auth', 'can:access-admin'])->prefix('admin')->name('admin.')->group(function () {
        
        Route::get('/', [AdminController::class, 'index'])->name('dashboard');
        Route::get('/projects', [AdminController::class, 'projects'])->name('projects');
        Route::get('/users', [AdminController::class, 'users'])->name('users');
       
        Route::patch('/projects/{project}/status', [AdminController::class, 'updateProjectStatus'])->name('projects.status');
      
        Route::post('/users', [AdminController::class, 'storeUser'])->name('users.store');
        Route::get('/users/{user}/edit', [AdminController::class, 'editUser'])->name('users.edit');
        Route::patch('/users/{user}', [AdminController::class, 'updateUser'])->name('users.update');
        Route::delete('/users/{user}', [AdminController::class, 'destroyUser'])->name('users.destroy');
    });
});

require __DIR__.'/auth.php';