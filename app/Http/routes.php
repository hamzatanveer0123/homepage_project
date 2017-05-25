<?php

/*
|--------------------------------------------------------------------------
| Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PagesController@home');
Route::get('about', 'PagesController@about');
Route::get('/', 'CardsController@index');
Route::post('cards/{user}', 'CardsController@store');
Route::post('notes/{user}', 'NotesController@store');

Route::delete('/{card}', 'CardsController@delete');

Route::auth();
