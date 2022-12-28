<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

use App\Http\Controllers\HomeController;

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
});
