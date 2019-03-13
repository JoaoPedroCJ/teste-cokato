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

Route::get("cokato", "CokatoController@index");
Route::get("cokato/{cokato}", "CokatoController@show");
Route::post("cokato", "CokatoController@store");
Route::patch("cokato/{cokato}", "CokatoController@update");
Route::delete("cokato/{cokato}", "CokatoController@destroy");

