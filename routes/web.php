<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductDetailController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/', [HomeController::class, 'index']);

Route::get('/productDetail/{productId}', [HomeController::class, 'productDetail'])->name('product.detail');
Route::get('/category/{id}', [HomeController::class, 'categoryDetail'])->name('category.detail');
Route::get('/product-search', [HomeController::class, 'productSearch'])->name('product.search');

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function(){


    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('/categories', [CategoryController::class, 'index'])->name('admin.categories.index');
    
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('admin.categories.store');

  //  Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('admin.categories.show');
   
    Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('admin.categories.update');
    
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');

    /**
     * admin products
     */
    Route::get('/products', [ProductController::class, 'index'])->name('admin.products.index');
    
    Route::get('/products/create', [ProductController::class, 'create'])->name('admin.products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('admin.products.store');

  //  Route::get('/products/{id}', [ProductController::class, 'show'])->name('admin.products.show');
   
    Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('/products/{id}', [ProductController::class, 'update'])->name('admin.products.update');
    
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('admin.products.destroy');

    /**
     * admin orders
     *
     */
    Route::get('/orders', [OrderController::class, 'index'])->name('admin.orders.index');
    Route::get('/orders/{id}/edit', [OrderController::class, 'edit'])->name('admin.orders.edit');
    Route::put('/orders/{id}', [OrderController::class, 'update'])->name('admin.orders.update');
    
    Route::delete('/orders/{id}', [OrderController::class, 'destroy'])->name('admin.orders.destroy');

    Route::get('/orders/{id}', [OrderController::class, 'show'])->name('admin.orders.show');

    /**
     * admin users
     */
    Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy');
    

    
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/**
 * Login google
 */
Route::get('login/google', function(){
  return Socialite::driver('google')->redirect();
})->name('login.google');

Route::get('callback/google', [LoginController::class, 'handleGoogleCallback']);

/**
 * add to cart
 */
Route::get('product/add-to-cart/{id}',[ProductDetailController::class, 'addToCart'])->name('addToCart');
/**
 * show cart
 */
Route::group(['middleware' => ['auth']], function(){
  Route::get('cart', [CartController::class, 'index'])->name('show.cart');
  Route::post('cart/delete', [CartController::class, 'deleteOrderDetail'])->name('cart.delete');
});

/**
 * Send Mail
 */
Route::get('/users/verify/{token}',[UserController::class,'verify']);



