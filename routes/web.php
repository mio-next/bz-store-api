<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->group(['prefix' => 'auth'], function () use ($router) {
    $router->post('code2session',  'AuthController@code2session');
});

$router->group(['prefix' => '/'], function () use ($router) {
    $router->get('categories', 'DefaultController@categories');
    $router->get('categories/{id}', 'DefaultController@childCategories');
    $router->get('swipers', 'DefaultController@swipers');
    $router->get('navs', 'DefaultController@navs');
    $router->get('blocks', 'DefaultController@blocks');

    $router->get('goods', 'GoodsController@index');
    $router->get('goods/{id:[\d]+}', 'GoodsController@show');
});


$router->group(['prefix' => 'me'], function () use ($router) {
    $router->get('profile', 'UserController@profile');
    $router->group(['prefix' => 'cart'], function () use ($router) {
        $router->get('', 'UserCartController@index');
        $router->post('', 'UserCartController@store');
        $router->delete('{id}', 'UserCartController@delete');
        $router->post('{id:[\d]+}', 'UserCartController@update');
    });

    $router->group(['prefix' => 'transaction'], function () use ($router) {
        $router->get('', 'UserTransactionController@index');
        $router->post('', 'UserTransactionController@store');
        $router->delete('{id}', 'UserTransactionController@delete');
        $router->post('{id:[\d]+}', 'UserTransactionController@update');
        $router->post('{id:[\d+]}/pay', 'UserTransactionController@toPay');
    });

    $router->group(['prefix' => 'favorite'], function () use ($router) {
        $router->get('', 'UserFavoriteController@index');
        $router->post('', 'UserFavoriteController@store');
        $router->delete('{id}', 'UserFavoriteController@delete');
    });
});
