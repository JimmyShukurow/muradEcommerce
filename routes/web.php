<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\App;
use App\Http\Controllers\UserController;
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


Route::get('/', [App::class, 'index'])->name('home');

Route::post('/login', [UserController::class, 'login']);

Route::post('/logout', [UserController::class, 'logout']);

Route::post('/register', [UserController::class, 'register']);

Route::get('/admin', [AdminController::class, 'index'])->name('admin');

Route::get('/menus', [AdminController::class, 'menus']);

Route::get('/profile', [UserController::class, 'profile']);