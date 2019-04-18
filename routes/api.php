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

Route::post('/gasto/create', 'GastoController@store');
Route::get('/gastos', 'GastoController@index');
Route::delete('/gasto/delete/{id}', 'GastoController@delete');
Route::get('/gasto/edit/{id}', 'GastoController@edit');
Route::post('/gasto/update/{id}', 'GastoController@update');