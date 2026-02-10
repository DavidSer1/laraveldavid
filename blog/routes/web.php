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
 AUTH

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


Route::middleware(['auth'])->resource('posts', PostController::class)
->except(['index', 'show']);

Route::resource('posts', PostController::class)->only(['index', 'show']);

