<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function iniciarSesion(Request $request){
        //Verifica que el usuario y contraseña sean correctos.



        //Agrega el usuario a session.
        session()->put('login', $request->txtUsuario);
        return redirect()->action('InscriptionController@cargarPagina');
    }


}
