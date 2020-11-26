<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Instancia;
use App\inscripcion;
use Session;

class InscriptionController extends Controller
{
    public function Index(){
        //Es para probar la conexion entre Eloquent y las vistas
        //$test = Instancia::find("1");
        //return view('inscription')->with('instancia', $test);
        return view('inscription');
    }

    public function cargarPagina(){
        //dd(Session::get('login'));
        if(session()->has('login')){
            //TODO_ traer los datos de inscripciones y modalidades
            return view('inscription',compact('inscripciones','modalidades'));
        }
        else
            return view('login');
    }
}
