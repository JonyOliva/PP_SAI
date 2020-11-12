<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\LoginController@index'); /*si en el buscador pone /, va a LoginController y busca la funcion index*/

Route::get('/login', 'App\Http\Controllers\LoginController@index'); /*si en el buscador pone /login, va a LoginController y busca la funcion index*/

Route::get('/inscription', 'App\Http\Controllers\InscriptionController@index'); /*si en el buscador pone /inscription, va a InscriptionController y busca la funcion index*/
