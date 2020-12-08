<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\instancia;

class InstanciaController extends Controller
{
    public function buscarInstancias(Request $request){
        
        $instancia = instancia::where("inst_anio", $request->anio)->get();
        return response()->json($instancia);
    }
}
