<?php

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

Route::get('/', function () {
    return view('index');
});

Route::get('/test', function () {
    return asset('images/image_id/IQC5bzhc87PcUytcdZevNaNHT.png');
});

Route::get('/admin/create',[\App\Http\Controllers\ProductController::class,'create']);
Route::post('/admin/create',[\App\Http\Controllers\ProductController::class,'store'])->name('createProduct');

