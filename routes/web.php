<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TypeController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

Route::get('/',[\App\Http\Controllers\HomeController::class,'index'])->name('homeIndex');
Route::get('/buy/{product}',[\App\Http\Controllers\HomeController::class,'buy'])->name('buyProduct');
Route::get('/user/products',[\App\Http\Controllers\HomeController::class,'usersProducts'])->name('usersProducts');

Route::get('/test', function () {
    //  dd(\App\Models\Product::find(1)->priceInUAH());
    $productIds = DB::table('orders')->select(DB::raw('product_id, count(product_id) as count'))
        ->groupBy('product_id')->orderBy('count','DESC')->limit(6)->get()->pluck('product_id')->toArray();
    dd($productIds);
//select product_id, count(product_id) as count from orders group by product_id order by count desc  limit 4;

});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
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
