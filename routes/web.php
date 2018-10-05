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
  Route::get('/card/details2', 'CardController@index2'); //backup layout details
  Route::get('/categories', 'HomeController@categories');
  Route::get('/contact', 'HomeController@contact');
  Route::get('/confirm', 'CardController@confirm');
  Route::get('/checkout', 'CardController@checkout');
  Route::get('/brand', ['as' => 'brand','uses' => 'HomeController@brand']);
  Route::get('brand/giftcard/{template}', ['as' => 'giftcard','uses' => 'HomeController@giftcard']);

  Route::get('/clear-cart',['as' => 'clear_cart','uses' => 'CardController@clearCart']);
  Route::get('/delete-cart/{id}',['as' => 'delete_cart','uses' => 'CardController@deleteCart']);
  Route::get('/edit-cart/{id}', ['as' => 'edit_cart','uses' => 'CardController@edit']);

  //post
  Route::post('/cart', ['as' => 'cart', 'uses' => 'CardController@store']);
  Route::post('/update-cart', ['as' => 'update_cart','uses' => 'CardController@update']);
  Route::post('/cartcheckout', ['as' => 'cartcheckout', 'uses' => 'CardController@cartcheckout']);
  Route::post('/cart/transaction', ['as' => 'cart_transaction', 'uses' => 'CardController@transaction']);

  //payment
  Route::post('/payment/success', ['as' => 'success', 'uses' => 'CardController@success']);

  //Auth
  Route::get('/login', 'Auth\LoginController@login');
  Route::post('/register', ['as' => 'register', 'uses' => 'Auth\RegisterController@register']);
  Route::post('/login-user',['as' => 'user_login', 'uses' => 'Auth\LoginController@loginProcess']);
  Route::get('/logout', ['uses' => 'Auth\LoginController@logout']);

  //CMS
  Route::get('/cms/dashboard', ['as' => 'index', 'uses' => 'CmsController@index']);
});
