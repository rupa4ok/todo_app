<?php

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::group(
	[
		'prefix' => 'admin',
		'as' => 'admin.',
		'namespace' => 'Admin',
		'middleware' => ['auth'],
	],
	function () {
		Route::get('/', 'TodoController@index')->name('todo');
	}
);