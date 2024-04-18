<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function getPage($page = "index")
    {
        if($page == 'login' || $page == 'dashboard'){
            return view('dashboard/' . $page);// dashboard backend
        }else if($page == 'logout'){
            return view('FE/index');// trang chu frontend
        }else if($page == 'profile'){
            return view('profile.edit');// update profile
        }else{
            return view('FE/' . $page);// trang chu frontend
        }
    }
    public function getManage()
    {
        return view('BE/layout/account');
    }
   
}
