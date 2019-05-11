<?php

Route::get('login', 'Logins\LoginController@index');
Route::post('login', 'Logins\LoginController@login');

Route::get('/', 'TopController@index');
