<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('/test', 'Api\AuthenticateController@index');

$api = app('api.router');

$api->version('v1', function($api){
    $api->post('login', ['uses' => 'App\Http\Controllers\Api\AuthenticateController@login']);
    $api->post('logout', ['uses' => 'App\Http\Controllers\Api\AuthenticateController@logout']);
    $api->post('register', ['uses' => 'App\Http\Controllers\Api\AuthenticateController@register']);

    //need an authentication using Basic Authentication
    $api->group(['middleware' => 'api.auth'], function($api){
        $api->get('users', ['uses' => 'App\Http\Controllers\Api\UserController@index' /*, 'middleware' => 'api.throttle' , 'limit' => '1' , 'expires' => '2'*/ ]);
    });

});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
});
