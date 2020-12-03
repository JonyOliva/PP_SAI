<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\carrera;

class CarreraController extends Controller
{

    //Se supone que $instacia es el objeto completo de tipo instancia 
    public function buscarCarreras($instancia){

        //Traer del Negocio la lista de carreras
        $carreras = carrera::where("carr_idinscripcion", $instancia->inst_idinscripcion)->get();
        //$carreras = buscarVCarrerasNeg($instancia);
        return view('inscription', compact('carreras'));
    }

}
