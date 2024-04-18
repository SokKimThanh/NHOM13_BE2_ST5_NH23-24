<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    public function getPageFrontEnd($page = "index")
    {
        if ($page == 'index') {
            return view($page); // trang chu frontend
        } else if ($page == 'profile') {
            return view('profile.edit');
        }
        return view('dashboard/' . $page);
    }
    public function getManage()
    {
        return view('BE/layout/account');
    }
    public function getPageBackEnd($page = 'dashboard')
    {
        if ($page == 'profile') {
            return view('profile.edit');
        }
        return "dashboard/" . $page;
    }
}
