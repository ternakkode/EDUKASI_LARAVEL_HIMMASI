<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'v1', 'namespace' => 'API\V1'], function () {
    Route::group(['prefix' => 'article'], function () {
        Route::post('/', 'ArticleController@create');
        Route::get('/', 'ArticleController@index');
        Route::get('/{id}', 'ArticleController@detail')->where('id', '[0-9]+');
        Route::put('/{id}', 'ArticleController@update')->where('id', '[0-9]+');
        Route::delete('/{id}', 'ArticleController@delete')->where('id', '[0-9]+');
    });
});