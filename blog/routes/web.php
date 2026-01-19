<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('inicio');
})->name('inicio');

Route::get('/posts/prueba', [PostController::class, 'nuevoPrueba']);

Route::get('/posts/editar-prueba/{id}', [PostController::class, 'editarPrueba']);


Route::resource('posts', PostController::class)->only(['index', 'show', 'create', 'edit', 'destroy']);
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
