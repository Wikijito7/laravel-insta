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


Route::group(['middleware' => 'auth'], function() {
  Route::get('/', 'ImagenesController@index')->name('imagenes.index');
  Route::get('/subir', 'ImagenesController@create')->name('imagenes.subir');
  Route::post('/subir', 'ImagenesController@store')->name('imagenes.guardar');
  Route::get('/u/{id}', 'ProfileController@show');
});

Auth::routes();

Route::get('/salir', function() {
  Auth::logout();
  return redirect()->action('ImagenesController@index');
});

Route::get('/home', 'HomeController@index')->name('home');
