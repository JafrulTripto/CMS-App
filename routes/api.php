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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

//List of TODO
Route::post('createUser','RegisterController@store');
Route::post('login', 'AuthController@login');
Route::get('findPosts/{id}','TodoController@showUserPost');


Route::group(['middleware' => 'jwt.verify'], function ($router) {

    Route::resource('todo','TodoController');
    Route::post('update_status/{id}','TodoController@updateStatus');
});

Route::group(['middleware' => 'jwt.verify','prefix' => 'auth'], function ($router) {

    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});