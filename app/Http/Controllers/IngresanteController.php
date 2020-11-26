<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IngresanteController extends Controller
{
    public function buscarIngresantes($inscipcion,$año,$instancia,$carrera,$modalidad,$opcion){

        //Traer del Negocio la lista de ingresantes
        //$listaIngresantes = buscarIngresantesNeg($inscipcion,$año,$instancia,$carrera,$modalidad,$opcion);
        return view('inscription',compact('listaIngresantes'));
    }
}
