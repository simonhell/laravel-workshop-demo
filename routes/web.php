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

//Drink
Route::get('/drinks', 'DrinkController@index')->name('drinks.index');

//User
Route::get('/users', 'UserController@index')->name('users.index');
Route::get('/users/{id}/edit', 'UserController@edit')->name('users.edit');


