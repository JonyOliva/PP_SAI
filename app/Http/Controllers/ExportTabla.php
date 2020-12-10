<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\alumno;

class BusquedaDeIngresantesController extends Controller
{    
    public function exportrga(Request $request){
        //traer la tabla como array
        //array de prueba reemplazar con la tabla
        $data = [
            ["firstname" => "Mary", "lastname" => "Johnson", "age" => 25],
            ["firstname" => "Amanda", "lastname" => "Miller", "age" => 18],
            ["firstname" => "James", "lastname" => "Brown", "age" => 31],
            ["firstname" => "Patricia", "lastname" => "Williams", "age" => 7],
            ["firstname" => "Michael", "lastname" => "Davis", "age" => 43],
            ["firstname" => "Sarah", "lastname" => "Miller", "age" => 24],
            ["firstname" => "Patrick", "lastname" => "Miller", "age" => 27]
          ];

        //evitar autoformat del excel 
        function cleanData(&$str)
        {
        
          $str = preg_replace("/\t/", "\\t", $str);
          
          $str = preg_replace("/\r?\n/", "\\n", $str);
      
          // convert 't' y 'f' a valores boolenos
          if($str == 't') $str = 'TRUE';
          if($str == 'f') $str = 'FALSE';
      
          // fuerza ciertos numerso y fechas a strings
          if(preg_match("/^0/", $str) || preg_match("/^\+?\d{8,}$/", $str) || preg_match("/^\d{4}.\d{1,2}.\d{1,2}/", $str)) {
            $str = "'$str";
          }
      
          if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
        }

  // nombre del archivo a descargar
  $filename = "website_data_" . date('Ymd') . ".xls";

  header("Content-Disposition: attachment; filename=\"$filename\"");
  header("Content-Type: application/vnd.ms-excel");

  $flag = false;
  foreach($data as $row) {
    if(!$flag) {
      // display los nombres de  field/column como primera fila
      echo implode("\t", array_keys($row)) . "\r\n";
      $flag = true;
    }
    array_walk($row, __NAMESPACE__ . '\cleanData');
    echo implode("\t", array_values($row)) . "\r\n";
  }
  exit;
        
    }
}
