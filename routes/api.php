<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\UserController;





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

Route::apiResources(['user' => 'App\Http\Controllers\UserController']);
Route::get('profile', 'App\Http\Controllers\UserController@profile');
Route::put('profile', 'App\Http\Controllers\UserController@updateProfile');

/////////////

Route::get('products', 'App\Http\Controllers\ProductsController@index');
Route::post('products', 'App\Http\Controllers\ProductsController@store');
Route::delete('products/{id}', 'App\Http\Controllers\ProductsController@destroy');
Route::put('products/{id}', 'App\Http\Controllers\ProductsController@update');

Route::get('search/{name}', 'App\Http\Controllers\ProductsController@search');
