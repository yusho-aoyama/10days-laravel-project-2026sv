<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Add use line
use App\Models\User;

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
