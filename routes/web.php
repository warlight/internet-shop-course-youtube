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

Route::get('/', 'MainController@index')->name('index');
Route::get('/categories', 'MainController@categories')->name('categories');

Route::get('/{category}', 'MainController@category')->name('category');

Route::get('/{category}/{product?}', 'MainController@product')->name('product');

ROute::get('/basket', 'MainController@basket')->name('basket');

ROute::get('/basket/place', 'MainController@basketPlace')->name('basket-place');
