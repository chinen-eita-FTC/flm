<?php

Route::get('login', 'LoginController@index');
Route::post('login', 'LoginController@login');

Route::get('/', 'TopController@index');
