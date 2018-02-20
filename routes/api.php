<?php

use Illuminate\Http\Request;
use Illuminate\Routing\Router;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['namespace' => 'Api'], function(Router $router)
{
    /**
     * Auth routes
     */
    $router->group(['middleware' => 'auth:api'], function (Router $router) {
        $router->apiResources([
            'products' => 'ProductController',
            'orders' => 'OrderController',
        ]);
    });
});
