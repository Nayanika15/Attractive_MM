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

Route::group(['middleware' => 'setlocale', 'prefix' => '{locale}'], function()
{
	Route::get('', function () {
	    return view('welcome');
	})->name('homepage');

	Auth::routes();

	Route::get('home', 'HomeController@index')->name('home');
	Route::get('editor', function(){
		return view('editor');
	})->name('editor');
});