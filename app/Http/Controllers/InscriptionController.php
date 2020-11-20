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
}
