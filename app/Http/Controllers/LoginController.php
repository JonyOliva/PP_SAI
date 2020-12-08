<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use Session;

class LoginController extends Controller
{   
    public function index(){
        return view('login');
    }

    public function iniciarSesion(Request $request){
        //Trae el usuario de la base de datos
        //TODO_ el model de Usuario esta incompleto
        $usuario = Usuario::where("usua_user" , $request->txtUsuario)->get();
        //Verificar que el usuario y contraseña sean correctos.
        if(/*empty*/($usuario)){
            //Agrega el usuario a session(Se tendrian que agregar todos los datos del usuario).
            session()->put('login', $request->txtUsuario);
            return redirect()->action('InscriptionController@cargarPagina');
        }
        else
            //Se vuelve al login y se muestra el error
            return view('login')->with('loginError',true);
    }
}
