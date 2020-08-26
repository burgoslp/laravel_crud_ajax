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

Route::get('/', 'personaController@index');
Route::get('/persona/listing', 'personaController@listing')->name('persona.listing');
Route::post('/persona/busqueda', 'personaController@Search')->name('persona.Search');
Route::resource('/persona', 'personaController');
