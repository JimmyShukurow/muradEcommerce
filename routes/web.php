<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\App;
use App\Http\Controllers\ProductController;
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

//Dashboard
Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::get('/menus', [AdminController::class, 'menus']);
Route::get('/slides', [AdminController::class, 'slides']);
Route::get('/users', [AdminController::class, 'users']);
Route::get('/products', [AdminController::class, 'products'])->name('admin.products');

//Moblie
Route::post('/mobileLogin', [UserController::class, 'loginMobile']);
//Mobile Footer
Route::get('/quick', [UserController::class, 'quick']);
Route::get('/favorites', [UserController::class, 'favorites']);
Route::get('/basket', [UserController::class, 'basket']);
Route::get('/profile', [UserController::class, 'profile']);
Route::get('/mobileLogin', [UserController::class, 'mobileLogin'])->name('mobile.login');


//products
Route::get('/products/{product}', [ProductController::class, 'edit'])->name('product');
Route::put('/products/{product}', [ProductController::class, 'update']);
Route::get('/product/create', [ProductController::class, 'create']);

