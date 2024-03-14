<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //Kiem tra dang nhap thanh cong
        if($request->username == "admin" && $request->password == "admin"){
            redirect('/loginsuccess');// chuyen trang loginsuccess.blade.php
        }

        // false
        return $next($request);
    }
}
