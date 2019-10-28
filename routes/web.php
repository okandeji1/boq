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
    return view('user/dashboard');
});

Route::get('/product', 'ProductController@index');
Route::post('/product', 'ProductController@store');

Route::get('/product-vendor', 'VendorController@index');
Route::post('/product-vendor', 'VendorController@store');

Route::get('/product-category', 'CategoryController@index');
Route::post('/product-category', 'CategoryController@store');

