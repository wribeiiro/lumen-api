<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use Illuminate\Http\Response;

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

/*
$router->options('/{any:.*}', [
    'middleware' => ['cors'], function () {
        return response('OK', Response::HTTP_OK);
    }
]);
*/

$router->get('/', ['middleware' => ['auth'], 'uses' => 'WorkController@index']);

$router->group(['prefix' => 'api/v1', 'middleware' => ['auth']], function () use ($router) {
    $router->get('/', 'WorkController@index');
    $router->get('/work', 'WorkController@index');
    $router->get('/work/{id}', 'WorkController@show');
    $router->post('/work', 'WorkController@create');
    $router->put('/work/{id}', 'WorkController@update');
    $router->delete('/work/{id}', 'WorkController@destroy');
});
