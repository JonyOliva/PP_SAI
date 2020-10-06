<?php
/**
 * @Author lecba.
 * @Copyright 2011.
 * @Metodos Para metodos sai web genericos.
 * @Modificacion 02/01/2012.
 */
class SaiWebConsultas_Genericos
{
    #--En los Constructores me conecto a la DB para empezar a realizar operaciones--------------------------
	function SaiWebConsultas_Genericos(){
       require 'Convertir.php';
       require 'ConexionBDSAI.php';
       global $con;
       global $Convertir;
       $Convertir=new Convertir();
       $conexion=new ConexionBDSAI();
       $con=$conexion->Conectar();
	}    
    #-------------------------------------------------------------------------------------------------------
    #--------------------------FUNCION DE CARGA DROPDOWNLIST GENERICO---------------------------------------
    function cargarGenericos($datos){
		global $con;
		$tabla = $datos["tabla"];
		$campo = $datos["campo"]? $datos["campo"]:'nombre';
		$campo1 = $datos["campo1"]? $datos["campo1"]:'id';
        $condition = $datos["condition"]? ' WHERE '.$datos["condition"]:'';
		$consulta = "SELECT ".$campo1.", ".$campo." FROM ".$tabla." ".$condition." ORDER BY ".$campo;
		$res = $con->query($consulta);
        #RECORRO LOS REGISTROS------------------------------------------------------------------------------
        $i=0;
        $combo = array();
        foreach ($res as $reg) {
            $option = array("id"=>utf8_decode($reg[$campo1]), "nom"=>utf8_decode($reg[$campo]));
			$combo[$i] = $option;
            $i++;
        }
        $num=$i+1;
        return array($num, $combo);
    }
    
    #-------------------------------------------------------------------------------------------------------
    #--------------------------FUNCION DE CARGA DROPDOWNLIST ANIOS------------------------------------------
    function cargarAnios($datos){
		global $con;
		$inscripcion = trim($datos["inscripcion"]);
		$consulta = "SELECT DISTINCT(inst_anio), inst_anio FROM instancias WHERE inst_idinscripcion='$inscripcion'";
		$res = $con->query($consulta);
        #RECORRO LOS REGISTROS------------------------------------------------------------------------------
        $i=0;
        $combo = array();
        foreach ($res as $reg) {
            $option = array("id"=>utf8_decode($reg["inst_anio"]), "nom"=>utf8_decode($reg["inst_anio"]));
			$combo[$i] = $option;
            $i++;
        }
        $num=$i;
        return array($num, $combo);
    }
    
    #-------------------------------------------------------------------------------------------------------
    #--------------------------FUNCION DE CARGA DROPDOWNLIST CARRERAS---------------------------------------
    function cargarCarreras($datos){
		global $con;
		$inscripcion = trim($datos["inscripcion"]);
		$consulta = "select carreras.carr_id, carreras.carr_descripcion from inscripcion_carreras inner join 
                     carreras on inscripcion_carreras.inca_idcarrera= carreras.carr_id where 
                     inscripcion_carreras.inca_idinscripcion= '$inscripcion' order by carreras.carr_descripcion";
		
        $res = $con->query($consulta);
        #RECORRO LOS REGISTROS------------------------------------------------------------------------------
        $i=0;
        $combo = array();
        foreach ($res as $reg) {
            $option = array("id"=>utf8_decode($reg["carr_id"]), "nom"=>utf8_decode($reg["carr_descripcion"]));
			$combo[$i] = $option;
            $i++;
        }
        $num=$i;
        return array($num, $combo);
    }
    
    #-------------------------------------------------------------------------------------------------------
    #--------------------------FUNCION DE CARGA GRILLA PREINSCRIPTOS----------------------------------------
    function cargarPreinscriptos($datos){
		global $con;
        global $Convertir;
		$idinscripcion = trim($datos["idinscripcion"]);
        $anio = trim($datos["anio"]);
        $idinstancia = trim($datos["idinstancia"]);
        $idcarrera = trim($datos["idcarrera"]);
        $modalidad = trim($datos["modalidad"]);
        $cuales = trim($datos["cuales"]);
        
        #ARMO LA CONSULTA------------------------------------------------------------------------------------
        
        $sql2 = " (instancias.inst_idinscripcion='$idinscripcion')";
        
        if($anio!="TODOS") $sql2=$sql2 ." AND (instancias.inst_anio='$anio')";
        if($idinstancia!="0") $sql2=$sql2 ." AND (datos_inscripcion.dain_idinstancia='$idinstancia')";
        if($idcarrera!="0") $sql2=$sql2 ." AND (datos_inscripcion.dain_idcarrera='$idcarrera')";
        if($modalidad!="TODAS") $sql2=$sql2 ." AND (modalidad.moda_descripcion='$modalidad')";   
        if($cuales!="TODAS"){
            if($cuales=="CON NRO. DE INSCRIPCION") $sql2 = $sql2 . " AND (datos_inscripcion.dain_nroinscripcion > 0)";
            elseif($cuales=="SIN NRO. DE INSCRIPCION") $sql2 = $sql2 ." AND (datos_inscripcion.dain_nroinscripcion = 0)";
        }
        $sql2 = $sql2 . " ORDER BY datos_inscripcion.dain_fechainscripcion";
        
		$consulta = "SELECT datos_personales.dape_apellido, datos_personales.dape_nombre, 
                     datos_inscripcion.dain_fechainscripcion, modalidad.moda_descripcion, datos_personales.dape_email, 
                     datos_personales.dape_telparticular, datos_personales.dape_celular, localidad.loca_descripcion, 
                     datos_personales.dape_calle, datos_personales.dape_nrocalle, carreras.carr_descripcion, 
                     datos_inscripcion.dain_nroinscripcion FROM instancias INNER JOIN (localidad INNER JOIN 
                     (modalidad INNER JOIN (carreras INNER JOIN (datos_inscripcion INNER JOIN datos_personales ON 
                     datos_inscripcion.dain_id = datos_personales.dape_idinscripcion) ON carreras.carr_id = 
                     datos_inscripcion.dain_idcarrera) ON modalidad.moda_id = datos_inscripcion.dain_idmodalidad) ON 
                     localidad.loca_id = datos_personales.dape_idlocalidad) ON instancias.inst_id = 
                     datos_inscripcion.dain_idinstancia WHERE ". $sql2;
		
        $res = $con->query($consulta);
        #RECORRO LOS REGISTROS------------------------------------------------------------------------------
        $i=0;
        $combo = array();
        foreach ($res as $reg) {
            $option = array("apellido"=>utf8_decode($reg["dape_apellido"]), "nombre"=>utf8_decode($reg["dape_nombre"]),
                            "fecha"=>$Convertir->BDFecha(utf8_decode($reg["dain_fechainscripcion"]),1),
                            "modalidad"=>utf8_decode($reg["moda_descripcion"]),"email"=>utf8_decode($reg["dape_email"]),
                            "tel"=>utf8_decode($reg["dape_telparticular"]),"cel"=>utf8_decode($reg["dape_celular"]),
                            "localidad"=>utf8_decode($reg["loca_descripcion"]),"calle"=>utf8_decode($reg["dape_calle"]),
                            "nrocalle"=>utf8_decode($reg["dape_nrocalle"]),"carrera"=>utf8_decode($reg["carr_descripcion"]),
                            "nroinscripcion"=>utf8_decode($reg["dain_nroinscripcion"]));
			$combo[$i] = $option;
            $i=$i+1;
        }
        $num=$i;
        return array($num, $combo);
    }
    
    #-------------------------------------------------------------------------------------------------------
    #--------------------------FUNCION DE CARGA GRILLA RGA COMPLETO-----------------------------------------
    function cargarRGA($datos){
		global $con;
        global $Convertir;
		$idinscripcion = trim($datos["idinscripcion"]);
        $anio = trim($datos["anio"]);
        $idinstancia = trim($datos["idinstancia"]);
        $idcarrera = trim($datos["idcarrera"]);
        $modalidad = trim($datos["modalidad"]);
        $cuales = trim($datos["cuales"]);
        
        #ARMO LA CONSULTA------------------------------------------------------------------------------------
        
        $sql2 = " (instancias.inst_idinscripcion='$idinscripcion')";
        
        if($anio!="TODOS") $sql2=$sql2 ." AND (instancias.inst_anio='$anio')";
        if($idinstancia!="0") $sql2=$sql2 ." AND (datos_inscripcion.dain_idinstancia='$idinstancia')";
        if($idcarrera!="0") $sql2=$sql2 ." AND (datos_inscripcion.dain_idcarrera='$idcarrera')";
        if($modalidad!="TODAS") $sql2=$sql2 ." AND (modalidad.moda_descripcion='$modalidad')";   
        if($cuales!="TODAS"){
            if($cuales=="CON NRO. DE INSCRIPCION") $sql2 = $sql2 . " AND (datos_inscripcion.dain_nroinscripcion > 0)";
            elseif($cuales=="SIN NRO. DE INSCRIPCION") $sql2 = $sql2 ." AND (datos_inscripcion.dain_nroinscripcion = 0)";
        }
        $sql2 = $sql2 . " ORDER BY datos_inscripcion.dain_fechainscripcion";
        
		$consulta = "SELECT datos_inscripcion.dain_nroinscripcion, datos_inscripcion.dain_fechainscripcion, 
                    instancias.inst_descripcion, carreras.carr_descripcion, anexo.anex_descripcion, 
                    modalidad.moda_descripcion, turnos.turn_descripcion, datos_personales.dape_apellido, 
                    datos_personales.dape_nombre, datos_personales.dape_tipodoc, datos_personales.dape_nrodoc, 
                    datos_personales.dape_calle, datos_personales.dape_nrocalle, datos_personales.dape_piso, 
                    datos_personales.dape_dpto, provincias.prov_descripcion, partido.part_descripcion, 
                    localidad.loca_descripcion, datos_personales.dape_telparticular, datos_personales.dape_celular, 
                    datos_personales.dape_email, datos_personales.dape_fechanac, datos_personales.dape_idlocalidadnac, 
                    datos_personales.dape_sexo, datos_personales.dape_nacionalidad, pais.pais_descripcion, 
                    datos_personales.dape_estadocivil, datos_personales.dape_hijos, datos_personales.dape_cantidadhijos, 
                    datos_personales.dape_edades, datos_estudios.daes_estudioscursados, titulos.titu_descripcion, 
                    orientacion.orie_descripcion, datos_estudios.daes_dependencia, datos_estudios.daes_anioegreso, 
                    colegios.cole_descripcion, datos_estudios.daes_cantanios, datos_estudios.daes_otrosestudios, 
                    datos_estudios.daes_otroscarrera, datos_estudios.daes_otrosestablecimiento, 
                    datos_estudios.daes_otrosestado, datos_estudios.daes_informatica, datos_estudios.daes_idioma, 
                    datos_estudios.daes_cual, datos_trabajo.datr_trabaja, datos_trabajo.datr_ocupacion, 
                    datos_trabajo.datr_horassemanales, datos_trabajo.datr_relacion, datos_trabajo.datr_empresa, 
                    datos_trabajo.datr_cargo, datos_familia.dafa_padre, datos_familia.dafa_padreestudios, 
                    datos_familia.dafa_padreocupacion, datos_familia.dafa_madre, datos_familia.dafa_madreestudios, 
                    datos_familia.dafa_madreocupacion, datos_familia.dafa_conyugeestudios, 
                    datos_familia.dafa_conyugeocupacion FROM (turnos INNER JOIN ((partido INNER JOIN localidad ON 
                    partido.part_id = localidad.loca_idpartido) INNER JOIN ((titulos INNER JOIN orientacion ON 
                    titulos.titu_id = orientacion.orie_idtitulo) INNER JOIN (carreras INNER JOIN (modalidad INNER JOIN 
                    (colegios INNER JOIN (pais INNER JOIN (anexo INNER JOIN (((((instancias INNER JOIN 
                    datos_inscripcion ON instancias.inst_id = datos_inscripcion.dain_idinstancia) INNER JOIN 
                    datos_personales ON datos_inscripcion.dain_id = datos_personales.dape_idinscripcion) INNER JOIN 
                    datos_estudios ON datos_inscripcion.dain_id = datos_estudios.daes_idinscripcion) INNER JOIN 
                    datos_trabajo ON datos_inscripcion.dain_id = datos_trabajo.datr_idinscripcion) INNER JOIN 
                    datos_familia ON datos_inscripcion.dain_id = datos_familia.dafa_idinscripcion) ON 
                    anexo.anex_id = datos_inscripcion.dain_idanexo) ON pais.pais_id = datos_personales.dape_pais) ON 
                    colegios.cole_id = datos_estudios.daes_idcolegio) ON modalidad.moda_id = 
                    datos_inscripcion.dain_idmodalidad) ON carreras.carr_id = datos_inscripcion.dain_idcarrera) ON 
                    (titulos.titu_id = datos_estudios.daes_idtitulo) AND (orientacion.orie_id = 
                    datos_estudios.daes_idorientacion)) ON localidad.loca_id = datos_personales.dape_idlocalidad) ON 
                    turnos.turn_id = datos_inscripcion.dain_idturno) INNER JOIN provincias ON 
                    (provincias.prov_id = localidad.loca_idprovincia) AND (provincias.prov_id = partido.part_idprovincia) 
                    AND (pais.pais_id = provincias.prov_idpais) WHERE ". $sql2;
		
        $res = $con->query($consulta);
        #RECORRO LOS REGISTROS------------------------------------------------------------------------------
        $i=0;
        $combo = array();
        foreach ($res as $reg) {
            $option = array("apellido"=>utf8_decode($reg["dape_apellido"]), "nombre"=>utf8_decode($reg["dape_nombre"]),
                            "fecha"=>$Convertir->BDFecha(utf8_decode($reg["dain_fechainscripcion"]),1),
                            "modalidad"=>utf8_decode($reg["moda_descripcion"]),"email"=>utf8_decode($reg["dape_email"]),
                            "tel"=>utf8_decode($reg["dape_telparticular"]),"cel"=>utf8_decode($reg["dape_celular"]),
                            "localidad"=>utf8_decode($reg["loca_descripcion"]),"calle"=>utf8_decode($reg["dape_calle"]),
                            "nrocalle"=>utf8_decode($reg["dape_nrocalle"]),"carrera"=>utf8_decode($reg["carr_descripcion"]),
                            "nroinscripcion"=>utf8_decode($reg["dain_nroinscripcion"]));
			$combo[$i] = $option;
            $i=$i+1;
        }
        $num=$i;
        return array($num, $combo);
    }
}
?>