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





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::group(['middleware' => 'web'], function(){
	Route::auth();
	Route::get('/', 'GalleryController@index');

	Route::resource('gallery','GalleryController');

	Route::resource('photo','PhotoController');

	Route::get('/gallery/show/{id}', 'GalleryController@show');
	Route::get('/photo/create/{id}', 'PhotoController@create');
	Route::get('/photo/details/{id}', 'PhotoController@details');
	Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
});