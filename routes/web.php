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
Route::get('/brand', [App\Http\Controllers\BrandController::class, 'index'])->name('brand');
Route::post('/brand/delete/', [App\Http\Controllers\BrandController::class, 'delete']);
Route::get('/brand/create', [App\Http\Controllers\BrandController::class, 'create']);
Route::post('/brand/create_submit', [App\Http\Controllers\BrandController::class, 'submit_create']);
Route::get('/brand/edit/{id}', [App\Http\Controllers\BrandController::class, 'edit']);
