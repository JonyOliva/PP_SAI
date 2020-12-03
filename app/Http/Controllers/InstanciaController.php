<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\instancia;

class InstanciaController extends Controller
{
    public function buscarInstancias($año){
        
        $instancia = instancia::where("inst_anio", $año)->get();
        return view('inscription', compact('instancia'));
    }
}
