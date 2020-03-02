<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Se define la en kernel.php el middleware admin 
Route::middleware(['auth', 'admin'])->namespace('Admin')->group(function(){
    //especialidades
    Route::get('/specialties', 'SpecialtyController@index');
    Route::get('/specialties/create', 'SpecialtyController@create');
    Route::get('/specialties/{specialty}/edit', 'SpecialtyController@edit');
    Route::post('/specialties', 'SpecialtyController@store');
    Route::put('/specialties/{specialty}', 'SpecialtyController@update');
    Route::delete('/specialties/{specialty}', 'SpecialtyController@destroy');
    //Medicos
    Route::resource('doctors','DoctorController');
    //Pacientes 
    Route::resource('patients','PatientController');

});
 
//Rutas para la vista doctores
Route::middleware(['auth', 'doctor'])->namespace('Doctor')->group(function(){
    //Doctores
    // Comando laravel para crear un controlador
    // php artisan make:controller Doctor/CalendarioController
    Route::get('/calendario', 'CalendarioController@edit');


});