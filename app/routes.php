<?php

// Routes File
Route::get('/', 'PagesController@index');

// Sessions Controller controls an existing user logging in and out
Route::get('login', 'SessionsController@create');
Route::get('logout', 'SessionsController@destroy');
Route::resource('sessions', 'SessionsController');

// UsersController controls new user creation and other functions (i.e. forgot password)
Route::get('register', 'UsersController@register');
Route::post('register', 'UsersController@registerNew');
Route::get('forgot-password', 'UsersController@forgotPassword');

// Stamp screens
Route::get('s/', 'StampController@stampScreen');
Route::post('s/callback', 'StampController@callback');
Route::post('s/error', 'StampController@error');

// o

