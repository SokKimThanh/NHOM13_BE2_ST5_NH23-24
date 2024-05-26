<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\HomeController;
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

Auth::routes();

// Dinh nghia route cho login
Route::get('/home', [HomeController::class, 'index'])->name('home');// quay ve trang login

// Định nghĩa route cho trang chủ
Route::get('/', [HomeController::class, 'index'])->name('home_index');

Route::post('/api/upload', [App\Http\Controllers\Api\ApiController::class, 'uploadFile'])->name('api.uploadfile');
 