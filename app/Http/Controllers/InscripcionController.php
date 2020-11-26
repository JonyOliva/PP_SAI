<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InscripcionController extends Controller
{
    public function buscarInscripciones($listaPermisosUsuario){

        //$inscripciones = buscarInscripcionesNeg($listaPermisosUsuario);
        return $inscripciones;  
    }

    
    public function buscarAños($id){

        //$fechaInscripcion = buscarAñosNeg($id);
        return $fechaInscripcion;
    }
}
