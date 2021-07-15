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





// API route group
$router->group(['prefix' => 'api'], function () use ($router) {

	$router->get('users','UserController@index');
	$router->get('users/{id}','UserController@get');
	$router->post('create','UserController@create');
	$router->post('edit/{id}','UserController@update');
	$router->delete('delete/{id}','UserController@delete');
	$router->get('test','UserController@test');


	//auth
    $router->post('login', 'AuthController@login');
    $router->get('checkLogin', 'ExampleController@checkLogin');

});

$router->get('/debug-sentry', function () {
    throw new Exception('My first Sentry error!');
});
