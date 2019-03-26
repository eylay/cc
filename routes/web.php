<?php
Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/acc', 'UserController@acc')->name('acc');
Route::post('/acc', 'UserController@update');
