<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use App\Livewire\PostList;
use App\Livewire\CreatePost;
use App\Models\Post;

// Ruta de inicio para usuarios no autenticados
Route::get('/', function () {
    return view('welcome');
});

// Rutas generadas por Laravel Breeze
require __DIR__.'/auth.php';

// Esta nueva ruta mostrará la vista de confirmación
// Se protege con el middleware 'auth' para que solo los usuarios logueados puedan verla.
Route::middleware('auth')->group(function () {
    Route::get('/account-verified', function () {
        return view('auth.verified-account');
    })->name('account.verified');

    // Rutas para el perfil del usuario
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Este grupo de rutas requiere que el usuario esté autenticado y su email verificado
// Aquí van las funcionalidades principales de tu blog
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', PostList::class)->name('dashboard');
    Route::get('/posts/create', CreatePost::class)->name('posts.create');
    Route::get('/posts/{post:slug}', function (Post $post) {
        return view('posts.show', ['post' => $post]);
    })->name('posts.show');
});



// La ruta de login que redirigía a la raíz debe ser eliminada para evitar conflictos
Route::get('/', [AuthenticatedSessionController::class, 'create'])->middleware(['guest'])->name('login');
