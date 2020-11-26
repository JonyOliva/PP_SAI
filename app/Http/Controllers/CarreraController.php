<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\carrera;

class CarreraController extends Controller
{
    public function buscarCarreras($instancia){

        //Traer del Negocio la lista de carreras
        //$carreras = buscarVCarrerasNeg($instancia);
        return view('inscription',compact('carreras'));
    }
}
