<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return view('inicio');
})->name('inicio');

Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

/*
Route::get('/posts/prueba', [PostController::class, 'nuevoPrueba']);

Route::get('/posts/editar-prueba/{id}', [PostController::class, 'editarPrueba']);
*/
Route::middleware(['auth'])->resource('posts', PostController::class)
->except(['index', 'show']);

Route::resource('posts', PostController::class)->only(['index', 'show']);

Route::resource('posts', PostController::class)->only(['index', 'show', 'create', 'edit', 'destroy', 'update']);
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
