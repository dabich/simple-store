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

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'admin'], function (Router $router) {
    $router->get('', 'DashboardController@index')->name('admin');
    $router->get('dashboard', 'DashboardController@index')->name('admin');

    $router->get('customers', 'CustomersController@index')->name('customers.index');
    $router->get('customers/{user}', 'CustomersController@show')->name('customers.show');

    $router->resource('orders', 'OrderController');
    $router->resource('products', 'ProductController');
});