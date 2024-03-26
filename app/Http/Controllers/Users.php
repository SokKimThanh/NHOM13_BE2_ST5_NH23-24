<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Users extends Controller
{
    //
    public function login()
    {
        return view('users.login', compact('users'));
    }
}