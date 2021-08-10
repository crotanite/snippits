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

// auth routes
Route::group(['middleware' => 'guest'], function() {
    Route::get('/register', ['as' => 'register', 'uses' => 'AuthController@create']);
    Route::post('/register', ['as' => 'register', 'uses' => 'AuthController@store']);
    Route::get('/login', ['as' => 'login', 'uses' => 'AuthController@edit']);
    Route::post('/login', ['as' => 'login', 'uses' => 'AuthController@update']);
});
Route::get('/logout', ['as' => 'logout', 'middleware' => ['auth'], 'uses' => 'AuthController@destroy']);

// snippet routes
Route::group(['as' => 'snippets.', 'prefix' => 'snippets'], function() {
    Route::group(['middleware' => ['auth']], function() {
        Route::get('/', ['as' => 'index', 'uses' => 'SnippetController@index']);
        Route::get('/create', ['as' => 'create', 'uses' => 'SnippetController@create']);
        Route::post('/create', ['as' => 'store', 'uses' => 'SnippetController@store']);
    });

    Route::group(['prefix' => '{snippet_id}'], function() {
        Route::get('/', ['as' => 'show', 'uses' => 'SnippetController@show']);
        Route::group(['middleware' => ['auth']], function() {
            Route::get('/approve', ['as' => 'approve', 'uses' => 'SnippetController@approve']);
            Route::get('/unapprove', ['as' => 'unapprove', 'uses' => 'SnippetController@unapprove']);
            Route::get('/edit', ['as' => 'edit', 'uses' => 'SnippetController@edit']);
            Route::patch('/edit', ['as' => 'update', 'uses' => 'SnippetController@update']);
            Route::delete('/delete', ['as' => 'destroy', 'uses' => 'SnippetController@destroy']);
        });
    });
});

// invite routes
Route::group(['as' => 'invites.', 'middleware' => ['auth'], 'prefix' => 'invites'], function() {
    Route::get('/', ['as' => 'index', 'uses' => 'InviteController@index']);
    Route::get('/create', ['as' => 'create', 'uses' => 'InviteController@store']);
});
