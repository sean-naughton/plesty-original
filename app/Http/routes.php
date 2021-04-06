<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@show');

Route::get('/home', 'HomeController@show');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/plests/favorites', 'PlestsController@favorites');
    
    Route::post('/plests', 'PlestsController@store');
    Route::get('/plests', 'PlestsController@index');
    Route::get('/plests/create', 'PlestsController@create');
    Route::get('/plests/{plest}/edit', 'PlestsController@edit');

    Route::post('/plests/{plest}/favorites', 'PlestsFavoritesController@store');
    Route::delete('/plests/{plest}/favorites', 'PlestsFavoritesController@destroy');

    Route::resource('/plests/{plest}/questions', 'PlestsQuestionsController');
});