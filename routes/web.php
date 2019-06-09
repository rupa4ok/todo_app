<?php

Route::get('/', 'TodoController@index')->name('index');
Route::get('/todo-{id}', 'TodoController@show')->name('show');

Auth::routes();

Route::group(
	[
		'prefix' => 'admin',
		'as' => 'admin.',
		'namespace' => 'Admin',
		'middleware' => ['auth'],
	],
	function () {
		Route::get('/', 'TodoController@index')->name('index');
		Route::get('/todo-{id}', 'TodoController@show')->name('show');
	}
);