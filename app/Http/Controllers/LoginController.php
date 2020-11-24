<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function iniciarSesion($usuario, $contraseña){
        //Verifica que el usuario y contraseña sean correctos.



        //Agrega el usuario a session.
        Session::put('login', $usuario);
        return view('inscription');
    }


}
