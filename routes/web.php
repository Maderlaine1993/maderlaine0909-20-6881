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



