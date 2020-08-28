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

/*$router->get('/', function () use ($router) {
    return $router->app->version();
});*/

$router->get('/', 'WorkController@index');

$router->group(['prefix' => 'api/v1', 'middleware' => 'auth'], function () use ($router) {
    $router->get('/work', 'WorkController@index');
    $router->post('/work', 'WorkController@create');
    $router->get('/work/{id}', 'WorkController@show');
    $router->put('/work/{id}', 'WorkController@update');
    $router->delete('/work/{id}', 'WorkController@destroy');
});