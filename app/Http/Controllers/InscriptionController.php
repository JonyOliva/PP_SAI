<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Instancia;     
class InscriptionController extends Controller
{
    public function Index(){
        //Es para probar la conexion entre Eloquent y las vistas
        //$test = Instancia::find("1");
        //return view('inscription')->with('instancia', $test);
        return view('inscription');
    }

    public function buscarInscripciones($listaPermisosUsuario){


    }

    public function buscarAños($inscipcion){


    }

    public function buscarInstancias($año){


    }

    public function buscarCarreras($instancia){


    }

    public function buscarModalidades(){

    }

    public function buscarIngresantes($inscipcion,$año,$instancia){

        return $listaIngresantes;
    }

    public function cargarPagina(){
        if(Session::get('login')!=null){
            //cargar combox de inscripciones y modalidades
        }
        else
            return view('login');
    }
}
