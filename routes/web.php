<?php

/** @var \Laravel\Lumen\Routing\Router $router */
use Illuminate\Support\Facades\Auth;

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



//Users
$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('users',  ['uses' => 'UsersController@showAllusers']);

    $router->get('users/{id}', ['uses' => 'UsersController@showOneUsers']);

    $router->post('users', ['as' => 'criar_perfil', 'uses' => 'UsersController@create']);

    $router->delete('users/{id}', ['uses' => 'UsersController@destroy']);

    $router->put('users/{id}', ['uses' => 'UsersController@update']);

    $router->post('login', ['uses' => 'UsersController@authenticate']);

//Times
    $router->get('times',  ['uses' => 'TimesController@showAllTimes']);

    $router->get('times/{id}', ['uses' => 'TimesController@showOneTimes']);

    $router->post('times', ['uses' => 'TimesController@create']);

    $router->delete('times/{id}', ['uses' => 'TimesController@delete']);

    $router->put('times/{id}', ['uses' => 'TimesController@update']);
  });
