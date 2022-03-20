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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/show-all-categories','API\CategoryController@index');


Route::get('/show/category/{id}','API\CategoryController@show');


Route::post('/category/store','API\CategoryController@store');

Route::post('/category/delete','API\CategoryController@delete');

Route::post('/category/update','API\CategoryController@update');
