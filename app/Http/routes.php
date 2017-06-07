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
Route::get('about', 'PagesController@about');
Route::get('/', 'SitesController@index');
Route::post('sites/{user}', 'SitesController@store');
Route::post('notes/{user}', 'NotesController@store');

Route::post('edit_notes', 'NotesController@edit_notes');

Route::delete('/{site}', 'SitesController@delete');

Route::auth();
