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
})->name('home');

Route::get('/carts', 'CartController@index')->name('carts');
Route::get('/cart_delete/{id}', 'CartController@destroy')->name('cart_delete');
Route::post('/add_to_cart', 'CartController@store')->name('add_to_cart');

Route::get('/products', 'ProductController@index')->name('products');
Route::get('/invoice/{id_cart}', 'CartController@invoice')->name('invoice');
