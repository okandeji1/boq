<?php

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
    return view('index');
});

Route::get('/register', function () {
    return view('user/register');
});

Route::post('/login', 'UserController@login');
Route::post('/register', 'UserController@register');
Route::get('/logout', 'UserController@logout');
Route::get('/dashboard', function () {
    if (Auth::guest()) {
        //is a guest so redirect
        return redirect('/');
    }
    return view('user/dashboard');
});

Route::get('/product', 'ProductController@index');
Route::post('/product', 'ProductController@store');

Route::get('/product-vendor', 'VendorController@index');
Route::post('/product-vendor', 'VendorController@store');

Route::get('/product-category', 'CategoryController@index');
Route::post('/product-category', 'CategoryController@store');

Route::get('/customer', 'CustomerController@index');
Route::post('/customer', 'CustomerController@store');

Route::get('/stock-in', 'StockController@index');
Route::post('/stock-in', 'StockController@store');
Route::get('/make-order', 'StockController@order');
Route::get('/sp', 'StockController@getProduct');
Route::get('/invoice', 'StockController@invoice');


