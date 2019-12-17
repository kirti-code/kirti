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
Auth::routes();


Route::get('/', function () {
    return view('welcome');
});

Route::get('dashboard', 'CategoryController@dashboard')->name('dashboard');
Route::get('product/searchPro', 'ProductController@searchProduct')->name('searchPro');
Route::get('category/searchCat', 'CategoryController@searchCat')->name('searchCat');
Route::get('downloadData', 'HomeController@downloadDataNew');
Route::get('importData', 'HomeController@importSheet');
Route::get('downloadDataNew', 'CategoryController@downloadDataNew');
Route::get('downloadDataNew', 'CategoryController@downloadDataNew');
Route::get('test', 'CategoryController@testExcel');

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('category', 'CategoryController');
Route::resource('product', 'ProductController');


Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::get('/form', function () {
    return view('form');
});

Route::get('testing', 'CategoryController@test');
