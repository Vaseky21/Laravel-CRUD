<?php

use App\Http\Controllers\ProductControler;
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



Route::get('/', [ProductControler::class, 'index'])->name('product.index');
Route::get('/product/create', [ProductControler::class, 'create'])->name('product.create');
Route::post('/product/store', [ProductControler::class, 'store'])->name('product.store');
Route::get('/product/edit/{id}', [ProductControler::class, 'edit']);
Route::put('/product/update{id}', [ProductControler::class, 'update']);
Route::delete('/product/delete/{id}', [ProductControler::class, 'delete']);
Route::get('/product/show/{id}', [ProductControler::class, 'show'])->name('product.show');