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
  Route::get('/u/{id}', 'ProfileController@show')->name('perfil.mostrar');
  Route::get('/like/{id}', 'ImagenesController@like')->name('imagenes.like');
  Route::get('/p/{id}', 'ImagenesController@show')->name('imagenes.show');
  Route::post('/enviar-comentario', 'ImagenesController@comment')->name('imagenes.comment');
  Route::get('/del/{id}', 'ImagenesController@destroy')->name('imagenes.destroy');
  Route::post('/edit/{id}', 'ImagenesController@update')->name('imagenes.update');
});

Auth::routes();

Route::get('/salir', function() {
  Auth::logout();
  return redirect()->action('ImagenesController@index');
});

Route::get('/home', 'HomeController@index')->name('home');
