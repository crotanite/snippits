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

Route::group(['as' => 'snippets.', 'prefix' => 'snippets'], function() {
    Route::get('/', ['as' => 'index', 'middleware' => ['auth'], 'uses' => 'SnippetController@index']);
    Route::get('/create', ['as' => 'create', 'middleware' => ['auth'], 'uses' => 'SnippetController@create']);
    Route::post('/create', ['as' => 'store', 'middleware' => ['auth'], 'uses' => 'SnippetController@store']);
    Route::get('/{snippet_id}', ['as' => 'show', 'uses' => 'SnippetController@show']);
    Route::get('/{snippet_id}/approve', ['as' => 'approve', 'middleware' => ['auth'], 'uses' => 'SnippetController@approve']);
    Route::get('/{snippet_id}/edit', ['as' => 'edit', 'middleware' => ['auth'], 'uses' => 'SnippetController@edit']);
    Route::patch('/{snippet_id}/edit', ['as' => 'update', 'middleware' => ['auth'], 'uses' => 'SnippetController@update']);
    Route::delete('{snippet_id}/delete', ['as' => 'destroy', 'middleware' => ['auth'], 'uses' => 'SnippetController@destroy']);
});

Route::group(['as' => 'invites.', 'prefix' => 'invites'], function() {
    Route::get('/', ['as' => 'index', 'uses' => 'InviteController@index']);
    Route::get('/create', ['as' => 'create', 'uses' => 'InviteController@store']);
});
