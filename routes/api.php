<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Test\TestController;
use App\Http\Controllers\ProductController;

Route::get('/test', [TestController::class, 'index']);


// Routes for ProductController
Route::post('product', [ProductController::class, 'store']);
Route::get('/products',[ProductController::class, 'index']);

