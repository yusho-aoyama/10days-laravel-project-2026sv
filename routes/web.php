<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Add a test route
Route::get('/day1test', [\App\Http\Controllers\Test\Days1TestController::class, 'index']);
