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

Route::get('/', [App\Http\Controllers\Controller::class, 'index'])->name('index');
Route::get('/cart', [App\Http\Controllers\Controller::class, 'showCart'])->name('cart');
Route::post('/cart/{id}', [App\Http\Controllers\Controller::class, 'addToCart'])->name('addToCart');
Route::delete('/cart/{id}', [App\Http\Controllers\Controller::class, 'deleteProductOnCart'])->name('deleteProductOnCart');
Route::patch('/cart/update/{id}', [App\Http\Controllers\Controller::class, 'updateCart'])->name('updateCart');
Route::get('/receipt', [App\Http\Controllers\Controller::class, 'showReceipt'])->name('showReceipt');
