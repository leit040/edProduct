<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TypeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
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

Route::get('/test', function () {


});


Route::get('/products/',[\App\Http\Controllers\ProductController::class,'index'])->name('adminIndex');
Route::get('/products/create',[\App\Http\Controllers\ProductController::class,'create'])->name('createProduct');
Route::post('/products/create',[\App\Http\Controllers\ProductController::class,'store'])->name('storeProduct');;
Route::get('/products/edit/{product}',[\App\Http\Controllers\ProductController::class,'edit'])->name('editProduct');
Route::put('/products/{product}',[\App\Http\Controllers\ProductController::class,'update'])->name('updateProduct');
Route::delete('/products/{product}',[\App\Http\Controllers\ProductController::class,'destroy'])->name('deleteProduct');

Route::resource('types', TypeController::class)
    ->missing(function (Request $request) {
        return Redirect::route('types.index');
    });

Route::resource('categories', CategoryController::class)
    ->missing(function (Request $request) {
        return Redirect::route('categories.index');
    });
