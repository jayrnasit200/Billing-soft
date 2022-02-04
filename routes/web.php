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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::group(['middleware' => ['auth']], function() {
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// brand
Route::get('/brand', [App\Http\Controllers\BrandController::class, 'index'])->name('brand');
Route::post('/brand/delete/', [App\Http\Controllers\BrandController::class, 'delete']);
Route::get('/brand/create', [App\Http\Controllers\BrandController::class, 'create']);
Route::post('/brand/create_submit', [App\Http\Controllers\BrandController::class, 'submit_create']);
Route::get('/brand/edit/{id}', [App\Http\Controllers\BrandController::class, 'edit']);
Route::post('/brand/create_update', [App\Http\Controllers\BrandController::class, 'submit_update']);

// product
Route::get('/product', [App\Http\Controllers\ProductController::class, 'index'])->name('product');
Route::post('/product/delete/', [App\Http\Controllers\ProductController::class, 'delete']);
Route::get('/product/create', [App\Http\Controllers\ProductController::class, 'create']);
Route::post('/product/create_submit', [App\Http\Controllers\ProductController::class, 'submit_create']);
Route::get('/product/edit/{id}', [App\Http\Controllers\ProductController::class, 'edit']);
Route::post('/product/create_update', [App\Http\Controllers\ProductController::class, 'submit_update']);


// bill
Route::get('/bill', [App\Http\Controllers\AddBillsController::class, 'index'])->name('bills');
Route::post('/bill/delete/', [App\Http\Controllers\AddBillsController::class, 'delete']);
Route::get('/bill/create', [App\Http\Controllers\AddBillsController::class, 'create']);
Route::post('/bill/create_submit', [App\Http\Controllers\AddBillsController::class, 'submit_create']);
Route::get('/bill/edit/{id}', [App\Http\Controllers\AddBillsController::class, 'edit']);
Route::post('/bill/update_submit', [App\Http\Controllers\AddBillsController::class, 'submit_update']);

// sell
Route::get('/sell', [App\Http\Controllers\SellController::class, 'index'])->name('bills');
Route::post('/getproductdata', [App\Http\Controllers\SellController::class, 'getproductdata']);
Route::post('/getallproductdata', [App\Http\Controllers\SellController::class, 'getallproductdata']);
Route::post('/sell/delete/', [App\Http\Controllers\SellController::class, 'delete']);
Route::get('/sell/create', [App\Http\Controllers\SellController::class, 'create']);
Route::post('/sell/create_submit', [App\Http\Controllers\SellController::class, 'submit_create']);
Route::get('/sell/sell_print/{id}', [App\Http\Controllers\SellController::class, 'invoice']);
Route::get('/sell/edit/{id}', [App\Http\Controllers\SellController::class, 'edit']);
Route::post('/sell/update_submit', [App\Http\Controllers\SellController::class, 'submit_update']);

// Report
Route::get('/report', [App\Http\Controllers\ReportController::class, 'index']);
Route::post('/report/get', [App\Http\Controllers\ReportController::class, 'report_get']);

Route::get('/setting', [App\Http\Controllers\HomeController::class, 'setting']);
Route::post('/setting', [App\Http\Controllers\HomeController::class, 'setting_submit']);


});