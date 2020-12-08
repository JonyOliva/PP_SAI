<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Instancia;
use App\inscripcion;
use App\modalidad;
use Session;

class InscriptionController extends Controller
{
    public function Index(){
        return view('inscription');
    }

    public function cargarPagina(Request $request){
        //dd(Session::get('login'));
        if(session()->has('login')){
            //TODO_ traer los datos de inscripciones
            //$inscripciones = inscripcion::select()->get();
            $modalidades = modalidad::all();
            return view('inscription',compact('modalidades'/*,'inscripciones'*/));
        }
        else
            //Si no hay usuario en session se remueve todo lo que esta en session y se vuelve al login.
            session()->flush();
            return view('login');
    }
}
