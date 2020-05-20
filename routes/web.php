<?php

Route::get('/', function () {
    return view('welcome');
});
Route::resource('towers', 'TowerController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('towers/create', 'TowerController@selectCus');

Route::get('home', 'TowerController@marker');



// Route::get('/mapdata', 'MapController@show');