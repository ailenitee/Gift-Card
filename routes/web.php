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
Route::group(['middleware' => 'web'], function () {
  Route::get('/card/details', 'CardController@index');
  Route::get('/categories', 'HomeController@categories');
  Route::get('/contact', 'HomeController@contact');
  Route::get('/confirm', 'CardController@confirm');
  Route::get('/checkout', 'CardController@checkout');
  Route::get('/clear-cart',['as' => 'clear_cart','uses' => 'CardController@clearCart']);

  //post
  Route::post('/cart', ['as' => 'cart', 'uses' => 'CardController@store']);
  Route::post('/cart/transaction', ['as' => 'cart_transaction', 'uses' => 'CardController@transaction']);

  //Auth
  Route::get('/login', 'Auth\LoginController@login');
  Route::post('/register', ['as' => 'register', 'uses' => 'Auth\RegisterController@register']);
  Route::post('/login-user',['as' => 'user_login', 'uses' => 'Auth\LoginController@loginProcess']);
  Route::get('/logout', ['uses' => 'Auth\LoginController@logout']);
});
