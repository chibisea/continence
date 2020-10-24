<?php

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

Route::group(['middleware' => 'auth'], function() {
    Route::get('profile/create', 'ProfileController@add');
    Route::post('profile/create', 'ProfileController@create');
    
    Route::get('profile/index', 'ProfileController@index');
    
    
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
