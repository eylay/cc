<?php
Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::post('password/mobile', 'Auth\ForgotPasswordController@sendRestToken');
Route::get('password/token', 'Auth\ForgotPasswordController@showInputCodeForm');
Route::post('password/token', 'Auth\ForgotPasswordController@resetPassword');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/acc', 'UserController@acc')->name('acc');
Route::post('/acc', 'UserController@update');
