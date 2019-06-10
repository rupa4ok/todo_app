<?php

Route::get('/', 'HomeController@index')->name('home');

Route::resource('todo', 'TodoController');

Auth::routes();
