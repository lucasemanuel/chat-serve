<?php

use Illuminate\Support\Facades\Route;

$namespace = 'App\Http\Controllers';
$settingsRouteGroup = [
    'namespace' => $namespace,
    'middleware' => 'auth:api',
];

// Auth
Route::post('/auth/login', $namespace.'\AuthController@login');
Route::group(['prefix' => 'auth' ] + $settingsRouteGroup, function ($router) {
    Route::post('/logout', 'AuthController@logout');
});

// Users
Route::post('/users/', $namespace.'\UserController@store');
Route::group(['prefix' => 'users'] + $settingsRouteGroup, function ($router) {
    Route::get('/', 'UserController@index');
    Route::delete('/', 'UserController@destroy');
});

// Messages
Route::group(['prefix' => 'messages'] + $settingsRouteGroup, function ($router) {
    Route::get('/{user}', 'MessageController@index');
    Route::post('/', 'MessageController@store');
});

// Messages
Route::group(['prefix' => 'conversations'] + $settingsRouteGroup, function ($router) {
    Route::get('/', 'ConversationController@index');
});
