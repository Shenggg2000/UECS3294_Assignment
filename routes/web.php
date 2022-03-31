<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['adminManagementPage']], function () {
  Route::get('dashboard', [App\Http\Controllers\HomeController::class, 'dashboard']);
  Route::resource('users', UserController::class);
  Route::resource('orders', OrderController::class);
  Route::resource('products', ProductController::class);
  Route::resource('product_categories', ProductCategoryController::class);
});
