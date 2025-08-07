<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use App\Livewire\PostList;
use App\Livewire\CreatePost;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [AuthenticatedSessionController::class, 'create'])
    ->middleware(['guest'])
    ->name('login');
    
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', PostList::class)->name('dashboard');

Route::get('/posts/create', CreatePost::class)->name('posts.create');
});
// Rutas para ver un post individual (lo crearemos más tarde)
Route::get('/posts/{post:slug}', function (App\Models\Post $post) {
    return view('posts.show', ['post' => $post]);
})->name('posts.show');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
