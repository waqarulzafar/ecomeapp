<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/add-to-cart/{id}',[\App\Http\Controllers\FrontPageController::class,'addToCard'])->name('add-to-cart');
Route::get('/cart',[\App\Http\Controllers\FrontPageController::class,'cart'])->name('cart');
Route::get('/update-cart/{id}',[\App\Http\Controllers\FrontPageController::class,'updateCart'])->name('cart.update');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/',[\App\Http\Controllers\FrontPageController::class,'products'])->name('products');
Route::group(['prefix'=>'category','middleware'=>['auth']],function(){
   Route::get('create',[\App\Http\Controllers\Admin\CategoryController::class,'create'])->name('category.create');
   Route::get('/edit/{id}',[\App\Http\Controllers\Admin\CategoryController::class,'edit'])->name('category.edit');
   Route::post('/update/{id}',[\App\Http\Controllers\Admin\CategoryController::class,'update'])->name('category.update');
   Route::post('store',[\App\Http\Controllers\Admin\CategoryController::class,'store'])->name('category.store');
   Route::get('/',[\App\Http\Controllers\Admin\CategoryController::class,'index'])->name('categories.show');
   Route::get('/delete/{id}',[\App\Http\Controllers\Admin\CategoryController::class,'delete'])->name('category.delete');
});
Route::group(['prefix'=>'product'],function (){
    Route::get('/',[\App\Http\Controllers\Admin\ProductController::class,'index'])->name('product.show');
Route::get('/create',[\App\Http\Controllers\Admin\ProductController::class,'create'])->name('product.create');
Route::post('/store',[\App\Http\Controllers\Admin\ProductController::class,'store'])->name('product.store');
});


