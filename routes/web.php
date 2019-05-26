<?php
Route::get('/', 'TopController@index');

// ログイン画面に関するルーティング
Route::prefix('login')->group(function () {
  Route::get('', 'LoginController@index');
  Route::post('', 'LoginController@login');
});

// 蔵書管理画面に関するルーティング
Route::prefix('library')->group(function () {
  Route::get('list', 'LibraryController@list');
  Route::get('delete', 'LibraryController@delete');
  Route::post('delete', 'LibraryController@deleted');
});