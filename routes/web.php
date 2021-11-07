<?php

use Illuminate\Support\Facades\Route;

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
// Creando ruta de listar
Route::get('/', 'CriptomonedaController@list');

//Creando ruta del formulario de criptomonedas
Route::get('/form','CriptomonedaController@criptomonedaform');

//Creando ruta de guardar criptomonedas
Route::post('/save', 'CriptomonedaController@save') ->name('save');

//Creando ruta para eliminar criptomonedas
Route::delete('/delete/{id}', 'CriptomonedaController@delete') ->name('delete');

//Creando ruta para el formulario de editar criptomonedas
Route::get('/editform/{id}', 'CriptomonedaController@editcriptomoneda') ->name('editcriptomoneda');

//Creando ruta para editar el criptomoneda
Route::patch('/edit/{id}', 'CriptomonedaController@edit')-> name('edit');

//Creando ruta del listar lenguaje
Route::get('/lenguajelist','LenguajeController@lenguajelist')->name('lenguajelist');

//Creando ruta para llegar al formulario
Route::get('/lenguajeform', 'LenguajeController@lenguajeform');

//Creando ruta de guardar lenguajes
Route::post('/savelenguaje', 'LenguajeController@savelenguaje')->name('savelenguaje');
