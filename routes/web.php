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


$router->group(['prefix' => 'user/' ], function () use ($router) {

	$router->get(		'/',		'v'. env('APP_VERSION', '1' ).'\UserController@index');  //get all users
    $router->post(		'/',		'v'. env('APP_VERSION', '1' ).'\UserController@store');  //create users
    $router->get(		'/{id}/', 	'v'. env('APP_VERSION', '1' ).'\UserController@show');   //get user detail
    $router->put(		'/{id}/',	'v'. env('APP_VERSION', '1' ).'\UserController@update'); //update user
    $router->delete(	'/{id}/',	'v'. env('APP_VERSION', '1' ).'\UserController@destroy');//delete user

});

$router->group(['prefix' => 'survey/' ], function () use ($router) {

	$router->get(		'/',		'v'. env('APP_VERSION', '1' ).'\SurveyController@index');  //get all surveys
    $router->post(		'/',		'v'. env('APP_VERSION', '1' ).'\SurveyController@store');  //create surveys
    $router->get(		'/{id}/', 	'v'. env('APP_VERSION', '1' ).'\SurveyController@show');   //get survey detail
    $router->put(		'/{id}/',	'v'. env('APP_VERSION', '1' ).'\SurveyController@update'); //update survey
    $router->delete(	'/{id}/',	'v'. env('APP_VERSION', '1' ).'\SurveyController@destroy');//delete survey

});
