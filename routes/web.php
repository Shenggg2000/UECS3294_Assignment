<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\User\userGroceryController;
use App\Http\Controllers\User\userCartController;
use App\Http\Controllers\User\userOrderController;
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
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile']);
Route::post('/edit', [App\Http\Controllers\HomeController::class, 'editProfile']);

//grocery product action
Route::get('/groceries/{category}', [App\Http\Controllers\User\userGroceryController::class, 'groceries']);
Route::get('/groceries/detail/{product_id}', [App\Http\Controllers\User\userGroceryController::class, 'productDetail']);

//cart action
Route::get('/cart', [App\Http\Controllers\User\userCartController::class, 'cart']);
Route::post('/addcart', [App\Http\Controllers\User\userCartController::class, 'addcart']);
Route::post('/addQuantity/{product_id}', [App\Http\Controllers\User\userCartController::class, 'addQuantity']);
Route::post('/minQuantity/{product_id}', [App\Http\Controllers\User\userCartController::class, 'minQuantity']);
Route::post('/removeItem/{product_id}', [App\Http\Controllers\User\userCartController::class, 'removeItem']);
//checkout, payment action
Route::post('/checkout', [App\Http\Controllers\User\userOrderController::class, 'checkout']);
Route::post('/checkout/payment', [App\Http\Controllers\User\userOrderController::class, 'proceedPayment']);
Route::get('/clearCart', [App\Http\Controllers\User\userOrderController::class, 'clearCart']);
Route::get('/orders', [App\Http\Controllers\User\userOrderController::class, 'orders']);

Route::group(['prefix' => 'admin', 'middleware' => ['adminManagementPage']], function () {
  Route::get('dashboard', [App\Http\Controllers\HomeController::class, 'dashboard']);
  Route::resource('users', UserController::class);
  Route::resource('orders', OrderController::class);
  Route::resource('products', ProductController::class);
  Route::resource('product_categories', ProductCategoryController::class);
});
