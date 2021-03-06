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

Route::get('/', [\App\Http\Controllers\OrderController::class, 'index'])->name('order.list');
Route::get('/create', [\App\Http\Controllers\OrderController::class, 'create'])->name('order.create');
Route::post('/create', [\App\Http\Controllers\OrderController::class, 'store']);
Route::get('/{id}', [\App\Http\Controllers\OrderController::class, 'show'])->name('order.show');

