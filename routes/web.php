<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminOrderController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[HomeController::class, 'index'])->name('home');
Route::get('/product-detail/{id}/{slug?}',[HomeController::class, 'detail'])->name('product.detail');
Route::get('/category-product/{id}', [HomeController::class, 'category'])->name('category');
Route::get('/search', [HomeController::class, 'search'])->name('search');

Route::post('/add-to-cart/{id}', [CartController::class, 'index'])->name('add-to-cart');
Route::get('/show-cart', [CartController::class, 'show'])->name('show-cart');
Route::get('/remove-cart-product/{id}', [CartController::class, 'remove'])->name('remove-cart-product');
Route::get('/cart-product-increment', [CartController::class, 'increment'])->name('increment-cart-product');
Route::get('/cart-product-decrement', [CartController::class, 'decrement'])->name('decrement-cart-product');



Route::post('/new-order', [CheckoutController::class, 'newOrder'])->name('new-order');
Route::get('/complete-order', [CheckoutController::class, 'completeOrder'])->name('complete-order');







Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');

    Route::get('/add-category', [CategoryController::class, 'index'])->name('category.add');
    Route::post('/new-category', [CategoryController::class, 'create'])->name('category.new');
    Route::get('/manage-category', [CategoryController::class, 'manage'])->name('category.manage');
    Route::get('/edit-category/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/update-category/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::get('/delete-category/{id}', [CategoryController::class, 'delete'])->name('category.delete');


    Route::get('/product/add',[ProductController::class,'index'] )->name('product.add');
    Route::post('/product/create',[ProductController::class,'create'] )->name('product.create');
    Route::get('/product/manage',[ProductController::class,'manage'] )->name('product.manage');
    Route::get('/product/edit/{id}', [ProductController::class,'edit'])->name('product.edit');
    Route::post('/product/update/{id}', [ProductController::class,'update'])->name('product.update');
    Route::get('/product/delete/{id}', [ProductController::class,'delete'])->name('product.delete');
    Route::get('/detail-product/{id}', [ProductController::class, 'detail'])->name('product.details');


    Route::get('/admin-manage-order', [AdminOrderController::class, 'index'])->name('admin-order.manage');
    Route::get('/admin-view-order-detail/{id}', [AdminOrderController::class, 'detail'])->name('admin-order.detail');

    Route::get('/admin-view-order-invoice/{id}', [AdminOrderController::class, 'viewInvoice'])->name('admin-order.view-invoice');

    Route::get('/admin-edit-order/{id}', [AdminOrderController::class, 'edit'])->name('admin-order.edit');
    Route::post('/admin-update-order/{id}', [AdminOrderController::class, 'update'])->name('admin-order.update');
    Route::get('/admin-delete-order/{id}', [AdminOrderController::class, 'delete'])->name('admin-order.delete');
});
