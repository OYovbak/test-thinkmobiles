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

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/favorite', 'FavoriteController@index')->name('films.favorite');
Route::get('/films', 'FilmController@index')->name('films.film');
Route::get('/film/{id}', 'FilmController@show')->name('films.show');
Route::get('/film/add-to-favorite/{id}', 'FilmController@addToFavorite')->name('films.successful');
Route::get('/film/delete-from-favorite/{id}', 'FilmController@deleteFromFavorite')->name('films.delete');
Route::get('/profile/{id}', 'ProfileController@show')->middleware('auth')->name('profile.show');
Route::post('/user-update/{userId}', 'ProfileController@updateUser');

