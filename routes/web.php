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

$router->get('/', function () use ($router) {
    return $router->app->version();
});



$router->get('/api/users','UserController@index');
$router->get('/api/users/{id}','UserController@get');
$router->post('/api/create','UserController@create');
$router->post('/api/edit/{id}','UserController@update');
$router->delete('/api/delete/{id}','UserController@delete');
$router->get('/api','UserController@test');
