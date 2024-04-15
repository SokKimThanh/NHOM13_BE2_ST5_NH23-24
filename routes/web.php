<?php

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
Route::get('/{page?}', [WelcomeController::class, 'getPage'])->name('page');
Route::get('/manage/layout', [WelcomeController::class, 'getManage']);// Cái này tui làm để test nên ông ko cần thì xóa luôn nhen

