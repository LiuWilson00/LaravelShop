<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\PageController as AdminPageController;
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


/**
 * ==not logged in ==
 */
//* page
Route::get('/', [PageController::class, 'home']);
//* products
//* products/search
//* users
//* carts/index
Route::resource('/cart', CartController::class)->middleware('check.token');


/**
 * ==logged in ==
 */
//* orders
//* profile
//* carts/purchase


/**
 * ==logged in ==
 */
//* admin/page
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::get('/', [AdminPageController::class, 'home'])->name('home');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
//* admin/products
Route::resource('/products', ProductController::class);
//* admin/orders
Route::resource('/orders', OrderController::class);
//* admin/brands
//* admin/categories
//* admin/users
//* admin/carts










require __DIR__ . '/auth.php';
