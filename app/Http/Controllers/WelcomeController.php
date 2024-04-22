<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    public function getPageFrontEnd($page = "index")
    {
        return view('FE/' . $page);
    }
    public function getPageBackEnd($page = 'layout')
    {
        return view('layout/' . $page);
    }
}
