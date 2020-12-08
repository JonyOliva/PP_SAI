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

//Login
Route::get('/', 'LoginController@Index');
Route::get('login', 'LoginController@Index');
Route::post('login', 'LoginController@iniciarSesion');

//Inscription
Route::get('inscription', 'InscriptionController@cargarPagina');
Route::post('inscription', 'IngresanteController@buscarIngresantes');

    //DropDowns
    Route::get('buscarAnios','InscripcionController@buscarAños');
    Route::get('buscarInstancias','InstanciaController@buscarInstancias');
    Route::get('buscarCarreras','CarreraController@buscarCarreras');