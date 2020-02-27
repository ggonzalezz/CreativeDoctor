<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//especialidades
Route::get('/specialties', 'SpecialtyController@index');
Route::get('/specialties/create', 'SpecialtyController@create');
Route::get('/specialties/{specialty}/edit', 'SpecialtyController@edit');

Route::post('/specialties', 'SpecialtyController@store');
Route::put('/specialties/{specialty}', 'SpecialtyController@update');
Route::delete('/specialties/{specialty}', 'SpecialtyController@destroy');

//Medicos
Route::resource('doctors','DoctorController');









