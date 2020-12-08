<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\inscripcion;

class InscripcionController extends Controller
{    
    public function buscarAños(Request $request){

        //TODO_ Query para traer los años de las inscripciones

        //$anios=inscripcion::select('')->where('',$request->id)->get();
        //return response()->json($anios);
    }
}
