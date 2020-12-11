<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExportTabla extends Controller
{
    public function exportrga(Request $request){
        //traer la tabla como array
        //array de prueba reemplazar con la tabla



        if($request->EXCEL != null){

        
            $data = [
                    
                ["nombre" => "Mary", "apellido" => "Johnson", "DNI" => "123456" , "Fecha" => "6/5/1994", "Email"=>"gg@gmail.com", "Telefono" => 0114264,"Celular" => 66699988,"Localidad" => "garin","Calle" => "gegege","Nro. calle" => "456","Carrera" => "programacion","Nro. inscripcion" => "45","Modalidad" => "presencial"],
                ["nombre" => "lucas", "apellido" => "gregori", "DNI" => "458999" , "Fecha" => "8/8/1999", "Email"=>"gege@gmail.com", "Telefono" => 454884,"Celular" => 46565,"Localidad" => "del viso","Calle" => "loma alta","Nro. calle" => "232","Carrera" => "mecanica","Nro. inscripcion" => "50","Modalidad" => "presencial"],
                ["nombre" => "claudio", "apellido" => "fierro", "DNI" => "7846" , "Fecha" => "14/5/1998", "Email"=>"prueba@gmail.com", "Telefono" => 358984,"Celular" => 123123,"Localidad" => "tigre","Calle" => "brix","Nro. calle" => "6666","Carrera" => "programacion","Nro. inscripcion" => "15","Modalidad" => "presencial"],
                ["nombre" => "mario", "apellido" => "lopez", "DNI" => "1346" , "Fecha" => "26/4/1994", "Email"=>"didio@gmail.com", "Telefono" => 164144,"Celular" => 654654,"Localidad" => "garin","Calle" => "danonino","Nro. calle" => "9999","Carrera" => "programacion","Nro. inscripcion" => "20","Modalidad" => "distancia"],
                ["nombre" => "juan", "apellido" => "domingo peron", "DNI" => "4477888" , "Fecha" => "14/12/1996",, "Email"=>"kono@gmail.com", "Telefono" => 65465,"Celular" => 87878,"Localidad" => "escobar","Calle" => "general peron","Nro. calle" => "145","Carrera" => "mecanica","Nro. inscripcion" => "21","Modalidad" => "presencial"],
                ["nombre" => "diego", "apellido" => "brando", "DNI" => "666" , "Fecha" => "2/10/1995", "Email"=>"dio@gmail.com", "Telefono" => 5556,"Celular" => 6699966,"Localidad" => "lopez camelo","Calle" => "juan domingo","Nro. calle" => "698","Carrera" => "programacion","Nro. inscripcion" => "23","Modalidad" => "presencial"],
                ["nombre" => "martin", "apellido" => "pescador", "DNI" => "9999" , "Fecha" => "4/5/1990", "Email"=>"da@gmail.com", "Telefono" => 496153,"Celular" => 555666,"Localidad" => "sasasa","Calle" => "vamos a volvar","Nro. calle" => "555","Carrera" => "mecanica","Nro. inscripcion" => "12","Modalidad" => "presencial"],
                ["nombre" => "dio", "apellido" => "brando", "DNI" => "011011" , "Fecha" => "9/11/1992", "Email"=>"reeee@gmail.com", "Telefono" => 59865654,"Celular" => 0303456,"Localidad" => "pilar","Calle" => "diputades","Nro. calle" => "486","Carrera" => "programacion","Nro. inscripcion" => "11","Modalidad" => "distancia"],

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

        if($request->RGA != null){
            $data = [
                    
                ["nombre" => "Mary", "apellido" => "Johnson", "DNI" => "123456" ,"Email"=>"gg@gmail.com", "Telefono" => 0114264,"Celular" => 66699988 ],
                ["nombre" => "lucas", "apellido" => "gregori", "DNI" => "458999" ,"Email"=>"gege@gmail.com", "Telefono" => 454884,"Celular" => 46565],
                ["nombre" => "claudio", "apellido" => "fierro", "DNI" => "7846" ,"Email"=>"prueba@gmail.com", "Telefono" => 358984,"Celular" => 123123],
                ["nombre" => "mario", "apellido" => "lopez", "DNI" => "1346" , "Email"=>"didio@gmail.com", "Telefono" => 164144,"Celular" => 654654],
                ["nombre" => "juan", "apellido" => "domingo peron", "DNI" => "4477888" , "Email"=>"kono@gmail.com", "Telefono" => 65465,"Celular" => 87878],
                ["nombre" => "diego", "apellido" => "brando", "DNI" => "666" ,"Email"=>"dio@gmail.com", "Telefono" => 5556,"Celular" => 6699966],
                ["nombre" => "martin", "apellido" => "pescador", "DNI" => "9999" ,"Email"=>"da@gmail.com", "Telefono" => 496153,"Celular" => 555666],
                ["nombre" => "dio", "apellido" => "brando", "DNI" => "011011" , "Email"=>"reeee@gmail.com", "Telefono" => 59865654,"Celular" => 0303456],

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
}
