<?php

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
    return view('index'); 
});

$router->post('/create-user',      'UserController@store');
$router->get('/read-users',        'UserController@index');
$router->get('/read-user/{id}',    'UserController@show');
$router->post('/edit-user/{id}', 'UserController@update');
$router->post('/delete-user/{id}', 'UserController@destroy');
