<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user/{name}',function($name){
    return "xin chao, " . $name;
});

Route::get('/user2/{name?}',function($name = "admin"){
    return "xin chao, " . $name;
});

// demo regular expresion
Route::get('/user2/{name?}',function($name = "admin"){
    return "xin chao, " . $name;
})->where('name', '[a-z]{4}');