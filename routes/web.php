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

// Route::get('/user/{name}',function($name){
//     return "xin chao, " . $name;
// });

// Route::get('/user2/{name?}',function($name = "admin"){
//     return "xin chao, " . $name;
// });

// // demo regular expresion
// Route::get('/user2/{name?}',function($name = "admin"){
//     return "xin chao, " . $name;
// })->where('name', '[a-z]{4}');

// // route variables
// Route::get('/{name?}', function($name = 'trangchu'){
//     return view($name);
// });


// Route::group(['as' => 'name.'], function () {
//     Route::get('/{name?}', function ($name = 'trangchu') {
//         return view($name);
//     })->name('view');
// });
//---------------------------------------------------------------------------
//---------------------------------------------------------------------------
//==============================ONTAP=======================================
//---------------------------------------------------------------------------
//---------------------------------------------------------------------------
//14/03/2024
//route tham so bat buoc
// Route::get('/thanh/{name}', function ($name) {
//     return "Xin chao " . $name;
// });

// // route tham so khoong bat buoc
// Route::get('{name?}', function ($name = 'admin') {
//     return "Xin chao, " . $name;
// });

// // route ràng buộc định dạng tham số
// Route::get('/id/{id?}', function ($id) {
//     return "XIn chao, " . $id;
// })->where('id', '\d{5}tt\d{4}');

// Route đặt tên 
Route::get('/home', function () {
    return view('ontap');
})->name('home');

