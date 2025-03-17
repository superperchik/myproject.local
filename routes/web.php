<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
Route::get('/', function () {
   return view('layouts/app');
});


Route::resource('products', ProductController::class);
Route::resource('orders', OrderController::class);
