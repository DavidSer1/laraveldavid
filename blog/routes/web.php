<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('inicio');
})->name('inicio');

/*
Route::get('/posts', function () {
    return view('posts.listado');
})->name('posts_listado');

Route::get('/posts/{id}', function ($id) {
    return view('posts.ficha', ['id' => $id]);
})->where('id', '[0-9]+')->name('posts_ficha');

*/

Route::resource('posts', PostController::class)
->only(['index', 'show', 'create', 'edit']);
