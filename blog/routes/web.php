<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| INICIO
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('inicio');
})->name('inicio');

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/
Route::get('/login', [LoginController::class, 'showLogin'])
    ->middleware('guest')
    ->name('login');

Route::post('/login', [LoginController::class, 'login'])
    ->middleware('guest');

Route::post('/logout', [LoginController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

/*
|--------------------------------------------------------------------------
| POSTS
|--------------------------------------------------------------------------
*/

// Ver posts → cualquiera
Route::resource('posts', PostController::class)
    ->only(['index', 'show']);

// Crear post → usuario logueado
Route::middleware('auth')->group(function () {

    Route::get('/posts/create', [PostController::class, 'create'])
        ->name('posts.create');

    Route::post('/posts', [PostController::class, 'store'])
        ->name('posts.store');

    // 👉 SOLO ADMIN
    Route::middleware('rol:admin')->group(function () {
        Route::delete('/posts/{post}', [PostController::class, 'destroy'])
            ->name('posts.destroy');
    });

    // 👉 Admin O propietario (controlado en controller)
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])
        ->name('posts.edit');

    Route::put('/posts/{post}', [PostController::class, 'update'])
        ->name('posts.update');
});
