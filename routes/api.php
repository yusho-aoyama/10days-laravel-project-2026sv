<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Test\TestController;

Route::get('/test', [TestController::class, 'index']);
