<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SignupController extends Controller
{
    // process signup
    public function process_signup(Request $request)
    {
        echo "Xin chao " . $request->fullname;
    }
}
