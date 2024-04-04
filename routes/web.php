<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

// Route::get('/', function () {
//     return view('welcome');
// });

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
//==============================ONTAP========================================
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
// Route::get('/home', function () {
//     return view('ontap');
// })->name('home');
//---------------------------------------------------------------------------
//---------------------------------------------------------------------------
//==============================middleware===================================
//---------------------------------------------------------------------------
//---------------------------------------------------------------------------
// Route::get('admin/{age}', function($age){
//     return "Ban du tuoi truy cap trang nay";
// })->middleware('checkAge');


//---------------------------------------------------------------------------
//---------------------------------------------------------------------------
//=============== exe3 middle ware kiem tra user pass login==================
//---------------------------------------------------------------------------
//---------------------------------------------------------------------------

//trang kiem tra dang nhap + chuyen trang
Route::post("/login", function () {
    return view('/'); // kiem tra middle ware truoc khi vao trang nay
})->middleware('checkLogin'); // xu ly middle ware

// trang dang nhap
// Route::get("/{name?}", function ($name = "trangchu") {
//     return view($name); // dang nhap thanh cong chuyen trang success
// })->name("name");



// trang chủ đặt tên lại là index
Route::get(
    /** Trình duyệt đường dẫn URL: 127.1.0.0:8000/ */
    "/",

    function () {
        return view(
            /** Đi đến file tên là "trangchu.blade.php" */
            "/trangchu"
        );
    }
)->name(
    /** Đặt tên route này là index: {{ route('index') }}*/
    "index"
);
//---------------------------------------------------------------------------
// Tao Request
//---------------------------------------------------------------------------
 
// Route::post("process", function(Request $request){
//     return "Xin chao " . $request->username;
// });

//---------------------------------------------------------------------------
// Tao Controller
//---------------------------------------------------------------------------
Route::post("process", [SignupController::class,"process_signup"]);

//---------------------------------------------------------------------------
// Tao Resource 7 phuong thuc
//---------------------------------------------------------------------------
// Route::resource("product", ProductController::Class);

//---------------------------------------------------------------------------
// Tuan 5: migrattion db:seed template bootstrap
//---------------------------------------------------------------------------

// Route::get('/{page?}', [WelcomeController::class, 'page'])


//---------------------------------------------------------------------------
// 
//---------------------------------------------------------------------------
Route::get('/{page?}', [ProductController::class, 'index'])->name('name');
