<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\App;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\Mobile\ProductController as MobileProductController;
use App\Http\Controllers\ModelController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WalletController;
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
Route::get('/menus', [AdminController::class, 'menus'])->name('admin.menus');
Route::get('/slides', [AdminController::class, 'slides']);
Route::get('/users', [AdminController::class, 'users']);
Route::get('/products', [AdminController::class, 'products'])->name('admin.products');
Route::get('/orders', [AdminController::class, 'orders'])->name('admin.orders');
Route::get('/roles', [AdminController::class, 'roles'])->name('admin.roles');
Route::get('/settings', [AdminController::class, 'settings']);
Route::get('/brands', [AdminController::class, 'brands']);
Route::get('/models', [AdminController::class, 'models']);



//Moblie
Route::post('/loginMobile', [UserController::class, 'loginMobile']);
Route::prefix('mobile')->group(function(){
    Route::get('/all-products', [MobileProductController::class, 'allProducts']);
    Route::get('/products/{category}', [MobileProductController::class, 'products']);
    Route::get('/product/{product}', [MobileProductController::class, 'product']);
    Route::post('/basket/add/{product_id}', [MobileProductController::class, 'addToBasket']);
    Route::delete('/basket/remove/{product_id}', [MobileProductController::class, 'removeItem']);
    Route::post('/favorite/add/{product_id}', [MobileProductController::class, 'addToFavorites']);
    Route::delete('/favorite/remove/{favorite}', [FavoriteController::class, 'delete']);
    Route::get('/wallet', [WalletController::class, 'myMallet']);
    Route::middleware('wallet')->get('/wallet/purchase/{code}', [WalletController::class, 'myMallet']);

});

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
Route::post('/product', [ProductController::class, 'store']);
Route::delete('/product/{product}', [ProductController::class, 'delete']);

//users
Route::get('/users/{user}', [UserController::class, 'edit']);
Route::post('/user/{user}/role', [UserController::class, 'updateRole']);

//roles
Route::get('/roles/create', [RoleController::class, 'create']);
Route::get('role/{role}', [RoleController::class, 'edit']);
Route::post('/roles', [RoleController::class, 'store']);
Route::delete('/role/{role}', [RoleController::class, 'destroy']);

//settings
Route::post('/settings', [SettingsController::class, 'store']);

//menus
Route::get('/menus/{menu}', [CategoryController::class, 'edit'])->name('admin.menu.edit');
Route::get('/menu/create', [CategoryController::class, 'create']);
Route::post('/menus',[CategoryController::class, 'store']);
Route::put('/menus/{menu}', [CategoryController::class, 'update']);
Route::delete('/menus/{menu}', [CategoryController::class, 'delete']);

//slides
Route::delete('/slide/{slide}', [SlideController::class, 'destroy']);
Route::post('/slide/{slide}/{category_id}', [SlideController::class, 'addCategory']);



//brands
Route::get('/brand/create', [BrandController::class, 'create']);
Route::post('/brand', [BrandController::class, 'store']);
Route::get('/brands/{brand}', [BrandController::class, 'edit']);
Route::put('/brands/{brand}', [BrandController::class, 'update']);
Route::delete('/brands/{brand}', [BrandController::class, 'destroy']);



//models
Route::get('/models/create', [ModelController::class, 'create']);
Route::post('/models', [ModelController::class, 'store']);
Route::get('/model/{model}', [ModelController::class, 'edit']);
Route::put('/models/{model}', [ModelController::class, 'update']);
Route::delete('/models/{model}', [ModelController::class, 'destroy']);

// orders
Route::post('/orders', [OrderController::class, 'store']);

// wallets

