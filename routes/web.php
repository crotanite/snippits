<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', ['as' => 'home', 'uses' => 'HomeController']);

Route::get('/register', ['as' => 'register', 'uses' => 'AuthController@create']);
Route::post('/register', ['as' => 'register', 'uses' => 'AuthController@store']);
Route::get('/login', ['as' => 'login', 'uses' => 'AuthController@edit']);
Route::post('/login', ['as' => 'login', 'uses' => 'AuthController@update']);
Route::get('/logout', ['as' => 'logout', 'uses' => 'AuthController@destroy']);

Route::get('/create', ['as' => 'create', 'middleware' => ['auth'], 'uses' => 'CreateController@create']);
Route::post('/create', ['as' => 'create', 'middleware' => ['auth'], 'uses' => 'CreateController@store']);

Route::get('/dashboard', ['as' => 'dashboard', 'middleware' => ['auth'], 'uses' => 'DashboardController']);
