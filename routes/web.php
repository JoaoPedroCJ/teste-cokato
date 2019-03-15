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

Route::get('/', function(){
    $users = DB::table('cokatos')->get();
    return view('users')->with('users', $users);
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('edit/{id}', function($id){
    $users = DB::table('cokatos')->get();
    return view('users')->with('users', $users)->with('editUser', $id);
});