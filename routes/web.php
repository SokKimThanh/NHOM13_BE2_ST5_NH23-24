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

// Route::get("/{page?}", function ($page = "index") {
//     return view($page);
// });

// ===================================================
// WelcomeController
// Route::get("/{page?}", [WelcomeController::class, 'index']);

// ===================================================
// group route name controller
Route::get("/{page?}", [WelcomeController::class, 'index'])->name('page');
