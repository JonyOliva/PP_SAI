<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\carrera;

class CarreraController extends Controller
{

    public function buscarCarreras(Request $request){

        //Traer del Negocio la lista de carreras
        $carreras = carrera::where("carr_idinscripcion", $request->idInscripcion)->get();
        return response()->json($carreras);
    }

}
