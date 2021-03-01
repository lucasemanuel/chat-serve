<?php

use Illuminate\Support\Facades\Route;

$namespace = 'App\Http\Controllers';

// Auth
Route::post('/auth/login', $namespace.'\AuthController@login');
Route::post('/auth/logout', $namespace.'\AuthController@logout');

// Users
Route::post('/users/', $namespace.'\UserController@store');
Route::group([
    'namespace' => $namespace,
    'middleware' => 'auth:api',
    'prefix' => 'users'
], function ($router) {
    Route::get('/', 'UserController@index');
    Route::delete('/', 'UserController@destroy');
});

