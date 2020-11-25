<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Instancia;
use Session;

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

    public function cargarPagina(){
        //dd(Session::get('login'));
        if(session()->has('login')){
            return view('inscription');
        }
        else
            return view('login');
    }
}
