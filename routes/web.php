<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::resource('Alumnos', 'AlumnosController');
//Route::resource('Calificaciones', 'CalificacionesController');
Route::get('ListarCalif/{idAlumno}', 'CalificacionesController@index');
Route::post('AgregarCalif', 'CalificacionesController@store');
Route::put('CambiarCalif', 'CalificacionesController@update');
Route::delete('BorrarCalif', 'CalificacionesController@destroy');
