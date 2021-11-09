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
// Route::post('/bill/delete/', [App\Http\Controllers\AddBillsController::class, 'delete']);
Route::get('/bill/create', [App\Http\Controllers\AddBillsController::class, 'create']);
Route::post('/bill/create_submit', [App\Http\Controllers\AddBillsController::class, 'submit_create']);
// Route::get('/bill/edit/{id}', [App\Http\Controllers\AddBillsController::class, 'edit']);
// Route::post('/bill/create_update', [App\Http\Controllers\AddBillsController::class, 'submit_update']);