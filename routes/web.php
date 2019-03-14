<?php

use Illuminate\Support\Facades\DB;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', function(){
    //if(Auth::check()){
    $users = DB::table('cokatos')->get();
    return view('users')->with('users', $users);
    //}
    //else {
        //return view('/login');
    //}
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

