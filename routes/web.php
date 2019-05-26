<?php

Route::get('login', 'LoginController@index');
Route::post('login', 'LoginController@login');

Route::get('/', 'TopController@index');

Route::get('/library/list', 'LibraryController@list');
Route::get('/library/delete', 'LibraryController@delete');
Route::post('/library/delete', 'LibraryController@deleted');