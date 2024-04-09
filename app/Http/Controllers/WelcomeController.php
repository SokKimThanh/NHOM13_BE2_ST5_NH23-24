<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function getPage($page = "index")
    {
        return view('FE/' . $page);
    }
}
