<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/todos', [App\Http\Controllers\todoController::class, 'index'])->name('home');

Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('home');

Route::get('/todos/create', [App\Http\Controllers\todoController::class, 'create'])->middleware('auth');

Route::post('/todos/create', [App\Http\Controllers\todoController::class, 'store']);

Route::get('/todos/{todo}', [App\Http\Controllers\todoController::class, 'show']);

Route::get('/todos/{todo}/edit', [App\Http\Controllers\todoController::class, 'edit']);

Route::post('/todos/{todo}/edit', [App\Http\Controllers\todoController::class, 'update']);

Route::get('/todos/{todo}/delete', [App\Http\Controllers\todoController::class, 'delete']);

Route::get('/users/{user}', [App\Http\Controllers\userController::class, 'show']);

Route::get('/users/{user}/edit', [App\Http\Controllers\userController::class, 'edit']);

Route::post('/users/{user}/edit', [App\Http\Controllers\userController::class, 'update']);

Route::get('/users/{user}/delete', [App\Http\Controllers\userController::class, 'delete']);
