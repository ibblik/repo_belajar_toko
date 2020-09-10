<?php

use Illuminate\Http\Request;

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

Route::post('/costumer', 'CostumerController@store');
Route::get('/costumer', 'CostumerController@show');
Route::delete('/costumer/{id}', 'CostumerController@destroy');

Route::post('/product', 'ProductController@store');
Route::get('/product', 'ProductController@show');
Route::delete('/product/{id}', 'ProductController@destroy');

Route::post('/order', 'OrderController@store');
Route::get('/order', 'OrderController@show');
Route::get('/order/{id}', 'OrderController@detail');
Route::put('/order/{id}', 'OrderController@update');
Route::delete('/order/{id}', 'OrderController@destroy');