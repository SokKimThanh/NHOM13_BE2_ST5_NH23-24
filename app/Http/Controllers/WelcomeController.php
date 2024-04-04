<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{

    function index($page = "index")
    {
        return view('FE/' . $page);
    }
}
