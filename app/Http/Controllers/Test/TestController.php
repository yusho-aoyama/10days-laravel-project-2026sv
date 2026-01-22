<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestController extends Controller
{
    // Add an index method
    public function index()
    {
        return response()->json([
            'message' => 'API Test Working'
        ]);
    }
}
