<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\modalidad;

class ModalidadController extends Controller
{
    public function buscarModalidades(){
        //Traer del Negocio la lista de modalidades
        $modalidades = modalidad::all();
        return view('inscription',compact('modalidades'));
    }
}
