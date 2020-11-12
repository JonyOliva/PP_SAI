<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*funcion que llama a la vista*/
    public function index() 
    {
        return view ('login');
    }
}
