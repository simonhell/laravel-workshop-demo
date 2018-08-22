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


//Highscore
Route::get('/', 'HighscoreController@index')->name('highscores.index');
Route::post('/', 'HighscoreController@saveDrink')->name('highscores.saveDrink');

//User
Route::get('/users', 'UserController@index')->name('users.index');
Route::post('/users', 'UserController@store')->name('users.store');
Route::get('/users/{id}/edit', 'UserController@edit')->name('users.edit');
Route::delete('/users/{id}', 'UserController@destroy')->name('users.destroy');
Route::put('/users/{id}', 'UserController@update')->name('users.update');


