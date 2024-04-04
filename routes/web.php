<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;

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

// Home
Route::group(['prefix' => 'home'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/index', 'HomeController@index')->name('home');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/trangchu', 'HomeController@index')->name('home');
});

// Products
Route::group(['prefix' => 'products', 'as' => 'products.'], function () {
    Route::get('/products', [ProductController::class, 'index'])->name('index');
    Route::get('/products/{category}', 'ProductController@category')->name('products.category');
    Route::get('/products/{id}', 'ProductController@show')->name('products.show');
});

// Cart
Route::group(['prefix' => 'cart', 'as' => 'cart.'], function () {
    Route::get('/cart', 'CartController@index')->name('cart.index');
    Route::post('/cart', 'CartController@store')->name('cart.store');
    Route::patch('/cart/{productId}', 'CartController@update')->name('cart.update');
    Route::delete('/cart/{productId}', 'CartController@destroy')->name('cart.destroy');
});

// Checkout
Route::group(['prefix' => 'checkout', 'as' => 'checkout.'], function () {
    Route::get('/checkout', 'CheckoutController@index')->name('checkout.index');
    Route::post('/checkout', 'CheckoutController@store')->name('checkout.store');
});

// Orders
Route::group(['prefix' => 'orders', 'as' => 'orders.'], function () {
    Route::get('/orders', 'OrderController@index')->name('orders.index');
    Route::get('/orders/{id}', 'OrderController@show')->name('orders.show');
});

// Users
Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
    Route::get('/login', 'AuthController@showLoginForm')->name('users.login');
    Route::post('/login', 'AuthController@login');
    Route::get('/register', 'AuthController@showRegistrationForm')->name('users.register');
    Route::post('/register', 'AuthController@register');
});

//// Admin ////

// Permission
Route::group(['prefix' => 'permission', 'as' => 'admin.permission.'], function () {
    Route::get('/admin/permissions', 'PermissionController@index')->name('admin.permissions.index');
    Route::post('/admin/permissions', 'PermissionController@store')->name('admin.permissions.store');
});

// Employees
Route::group(['prefix' => 'employees', 'as' => 'admin.employees.'], function () {
    Route::get('/admin/employees', 'EmployeeController@index')->name('admin.employees.index');
    Route::get('/admin/employees/create', 'EmployeeController@create')->name('admin.employees.create');
    Route::post('/admin/employees', 'EmployeeController@store')->name('admin.employees.store');
    Route::get('/admin/employees/{id}/edit', 'EmployeeController@edit')->name('admin.employees.edit');
    Route::put('/admin/employees/{id}', 'EmployeeController@update')->name('admin.employees.update');
    Route::delete('/admin/employees/{id}', 'EmployeeController@destroy')->name('admin.employees.destroy');
});

// Suppliers
Route::group(['prefix' => 'suppliers', 'as' => 'admin.suppliers.'], function () {
    Route::get('/admin/suppliers', 'SupplierController@index')->name('admin.suppliers.index');
    Route::get('/admin/suppliers/create', 'SupplierController@create')->name('admin.suppliers.create');
    Route::post('/admin/suppliers', 'SupplierController@store')->name('admin.suppliers.store');
    Route::get('/admin/suppliers/{id}/edit', 'SupplierController@edit')->name('admin.suppliers.edit');
    Route::put('/admin/suppliers/{id}', 'SupplierController@update')->name('admin.suppliers.update');
    Route::delete('/admin/suppliers/{id}', 'SupplierController@destroy')->name('admin.suppliers.destroy');
});

// Ads
Route::group(['prefix' => 'ads', 'as' => 'admin.ads.'], function () {
    Route::get('/admin/ads', 'AdController@index')->name('admin.ads.index');
    Route::get('/admin/ads/create', 'AdController@create')->name('admin.ads.create');
    Route::post('/admin/ads', 'AdController@store')->name('admin.ads.store');
    Route::get('/admin/ads/{id}/edit', 'AdController@edit')->name('admin.ads.edit');
    Route::put('/admin/ads/{id}', 'AdController@update')->name('admin.ads.update');
    Route::delete('/admin/ads/{id}', 'AdController@destroy')->name('admin.ads.destroy');
});

// Ads
Route::group(['prefix' => 'purchases', 'as' => 'purchases.ads.'], function () {
    Route::get('/admin/purchases', 'PurchaseController@index')->name('admin.purchases.index');
    Route::get('/admin/purchases/create', 'PurchaseController@create')->name('admin.purchases.create');
    Route::post('/admin/purchases', 'PurchaseController@store')->name('admin.purchases.store');
    Route::get('/admin/purchases/{id}/edit', 'PurchaseController@edit')->name('admin.purchases.edit');
    Route::put('/admin/purchases/{id}', 'PurchaseController@update')->name('admin.purchases.update');
    Route::delete('/admin/purchases/{id}', 'PurchaseController@destroy')->name('admin.purchases.destroy');
});