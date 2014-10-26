<?php

// Routes File
Route::get('/', ['as' => 'home', 'uses' => 'PagesController@index']);
Route::get('/style', 'PagesController@style');

// Sessions Controller controls an existing user logging in and out
Route::get('logout', ['as' => 'logout', 'uses' => 'SessionsController@destroy'] );
Route::resource('login', 'SessionsController');

// UsersController controls new user creation and other functions (i.e. forgot password)
Route::resource('users', 'UserController');
Route::get('forgot-password', ['as' => 'forgotPassword', 'uses' => 'UserController@forgotPassword'] );
Route::get('register', ['as' => 'register', 'uses' => 'UserController@create']);


// Stamp screens
Route::get('s/', ['as' => 'stampScreen', 'uses' => 'StampController@stampScreen'] );
Route::post('s/callback', 'StampController@callback');
Route::post('s/error', 'StampController@error');



