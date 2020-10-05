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

Route::post('/register', 'UserController@register');
Route::post('/login', 'UserController@login');


Route::group(['middleware' => ['jwt.verify']], function ()
{
    route::group(['middleware' => ['api.superadmin']], function()
    {
        Route::delete('/costumer/{id}', 'CostumerController@destroy');
        Route::delete('/product/{id}', 'ProductController@destroy');
        Route::delete('/order/{id}', 'OrderController@destroy');

    });
    route::group(['middleware' => ['api.admin']], function()
    {
        Route::post('/costumer', 'CostumerController@store');

        Route::post('/product', 'ProductController@store');

        Route::post('/order', 'OrderController@store');
        Route::put('/order/{id}', 'OrderController@update');

    });
    
    Route::get('/costumer', 'CostumerController@show');
    
    Route::get('/product', 'ProductController@show');
     
    Route::get('/order', 'OrderController@show');
    Route::get('/order/{id}', 'OrderController@detail');
    
    
});