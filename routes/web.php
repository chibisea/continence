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
    
    Route::get('profile/delete', 'ProfileController@delete');
    
    Route::get('profile/edit', 'ProfileController@edit');
    Route::post('profile/edit', 'ProfileController@update');
    
    Route::get('diary/create', 'DiaryController@add');
    Route::post('diary/create', 'DiaryController@create');
    
    Route::get('diary/index', 'DiaryController@index');
    
    Route::get('profile/graph2', 'DiaryController@graph2');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
