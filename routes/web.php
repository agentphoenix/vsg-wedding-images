<?php

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('posts', 'PostsController');

Route::post('/posts/{post}/favorites', 'FavoritesController@store')->name('favorites.store');
Route::delete('/posts/{post}/favorites', 'FavoritesController@destroy')->name('favorites.destroy');

Route::post('/posts/{post}/comment', 'CommentsController@store')->name('comments.store');

Route::get('/sign-in', 'LoginController@index')->name('login');
Route::post('/sign-in', 'LoginController@authenticate')->name('authenticate');
Route::post('/sign-out', 'LoginController@logout')->name('logout');
Route::get('/sign-in/get-guarded-users', 'LoginController@getGuardedUsers');

Route::get('/home', 'HomeController@index')->name('home');
