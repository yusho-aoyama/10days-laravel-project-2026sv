<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use App\Models\User;

// Add use line

class Days1TestController extends Controller
{
    public function index()
    {
        // Get all user data from the User Model
        $users = User::all();

        // pass the data to the view
        return view('day1test', ['users' => $users]);
    }

}
