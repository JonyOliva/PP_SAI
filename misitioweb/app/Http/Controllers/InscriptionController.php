<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InscriptionController extends Controller
{
     /*funcion que llama a la vista*/
     public function index() 
     {
         return view ('inscription');
     }
}
