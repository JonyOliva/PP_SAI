<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InscripcionController extends Controller
{
    public function buscarInscripciones($listaPermisosUsuario){

        //$inscripciones = buscarInscripcionesNeg($listaPermisosUsuario);
        return view('inscription',compact('inscripciones'));
    }

    
    public function buscarAños($id){

        //$fechaInscripcion = buscarAñosNeg($id);
        return view('inscription',compact('fechaInscripcion'));
    }
}
