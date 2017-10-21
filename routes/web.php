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

Route::get('persons', 'PersonController@index');
Route::get('persons/{id}', 'PersonController@show');
Route::get('persons/{firstname}/{lastname}/{description}', 'PersonController@create');
Route::get('persons/{id}/{firstname}/{lastname}/{description}', 'PersonController@update');
Route::get('persons/{id}/{confirm}', 'PersonController@delete');