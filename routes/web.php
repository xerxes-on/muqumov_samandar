<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'main']);
Route::get('blog', [PostController::class, 'blog']);
Route::get('/blog/{id}', [PostController::class, 'show'])->name('blogs.show');
Route::post('/blog/{id}/like', [PostController::class, 'toggleLike'])->name('blogs.toggleLike');
Route::get('talks', [PostController::class, 'talk']);
Route::get('/about', [PostController::class, 'about_me']);
