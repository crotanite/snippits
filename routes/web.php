<?php

use App\Http\Livewire\CreateSnippet;
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

Route::group(['as' => 'snippets.', 'middleware' => ['auth'], 'prefix' => 'snippets'], function() {
    Route::get('/', ['as' => 'index', 'uses' => 'SnippetController@index']);
    Route::get('/create', ['as' => 'create', 'uses' => 'Snippets\\CreateComponent']);
    Route::post('/create', ['as' => 'create', 'uses' => 'SnippetController@store']);
    Route::delete('/delete/{snippet_id}', ['as' => 'destroy', 'uses' => 'SnippetController@destroy']);
});

Route::group(['as' => 'invites.', 'prefix' => 'invites'], function() {
    Route::get('/', ['as' => 'index', 'uses' => 'InviteController@index']);
    Route::get('/create', ['as' => 'create', 'uses' => 'InviteController@store']);
});
