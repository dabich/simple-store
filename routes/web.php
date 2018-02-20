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

use Illuminate\Routing\Router;

Auth::routes();

Route::get('/', 'ShowcaseController@index');
Route::get('/orders', 'HomeController@orders')->name('profile');

Route::get('/checkout', 'CheckoutController@checkoutView');
Route::post('/checkout', 'CheckoutController@checkout')->name('checkout');
Route::get('/success', 'CheckoutController@success');
Route::get('/fail', 'CheckoutController@fail');

Route::get('cart', 'CartController@view');
Route::post('cart', 'CartController@add');
Route::put('cart', 'CartController@update');
Route::delete('cart', 'CartController@clear');
Route::delete('cart/{product_id}', 'CartController@remove');

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'admin'], function (Router $router) {
    $router->get('', 'DashboardController@index')->name('admin');
    $router->get('dashboard', 'DashboardController@index')->name('admin');

    $router->get('customers', 'CustomersController@index')->name('customers.index');
    $router->get('customers/{user}', 'CustomersController@show')->name('customers.show');

    $router->resource('orders', 'OrderController');
    $router->resource('products', 'ProductController');
});