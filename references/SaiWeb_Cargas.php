<?php
/**
 * @Author lecba.
 * @Copyright 2011.
 * @Metodos Para metodos sai web.
 * @Modificacion 08/09/2011.
 */
class SaiWeb_Cargas
{
    #--En los Constructores me conecto a la DB para empezar a realizar operaciones--------------------------
	function SaiWeb_Cargas(){
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
    function cargarDDList($datos){
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
    #-------------------------------------FUNCION QUE CARGA LOS ANEXO---------------------------------------
    function cargarAnexo($datos){
		global $con;
		$idinstancia = $datos["idinstancia"];
		$consulta = "SELECT anex_id, anex_descripcion FROM anexo INNER JOIN instancias_anexos 
                    ON anexo.anex_id = instancias_anexos.inan_idanexo WHERE 
                    instancias_anexos.inan_idinstancia='$idinstancia'";
        $res = $con->query($consulta);
        #RECORRO LOS REGISTROS------------------------------------------------------------------------------
        $i=0;
        $combo = array();
        foreach ($res as $reg) {
            $option = array("id"=>utf8_decode($reg["anex_id"]), "nom"=>utf8_decode($reg["anex_descripcion"]));
			$combo[$i] = $option;
            $i++;
        }
        $num=$i+1;
        return array($num, $combo);
    }
    #-------------------------------------------------------------------------------------------------------
    #-------------------------------------FUNCION QUE CARGA LAS MODALIDADES---------------------------------
    function cargarModalidad($datos){
		global $con;
		$idinstancia = $datos["idinstancia"];
		$consulta = "SELECT modalidad.moda_id, modalidad.moda_descripcion FROM modalidad INNER JOIN 
                    instancias_modalidad ON modalidad.moda_id = instancias_modalidad.inmo_idmodalidad 
                    WHERE instancias_modalidad.inmo_idinstancia='$idinstancia' ORDER BY modalidad.moda_descripcion";
        $res = $con->query($consulta);
        #RECORRO LOS REGISTROS------------------------------------------------------------------------------
        $i=0;
        $combo = array();
        foreach ($res as $reg) {
            $option = array("id"=>utf8_decode($reg["moda_id"]), "nom"=>utf8_decode($reg["moda_descripcion"]));
			$combo[$i] = $option;
            $i++;
        }
        $num=$i+1;
        return array($num, $combo);
    }
    #-------------------------------------------------------------------------------------------------------
    #-------------------------------------FUNCION QUE CARGA LOS TURNOS--------------------------------------
    function cargarTurnos($datos){
		global $con;
		$idinstancia = $datos["idinstancia"];
		$consulta = "SELECT turnos.turn_id, turnos.turn_descripcion FROM turnos INNER JOIN instancias_turnos 
                    ON turnos.turn_id = instancias_turnos.intu_idturno WHERE instancias_turnos.intu_idinstancia
                    ='$idinstancia' ORDER BY turnos.turn_descripcion";
        $res = $con->query($consulta);
        #RECORRO LOS REGISTROS------------------------------------------------------------------------------
        $i=0;
        $combo = array();
        foreach ($res as $reg) {
            $option = array("id"=>utf8_decode($reg["turn_id"]), "nom"=>utf8_decode($reg["turn_descripcion"]));
			$combo[$i] = $option;
            $i++;
        }
        $num=$i+1;
        return array($num, $combo);
    }
    #-------------------------------------------------------------------------------------------------------
    #-----------------------------FUNCION QUE DEVUELVE UN ID GENERICO---------------------------------------
    function getIdInstancia($datos){
		global $con;
		$carrera = $datos["idcarrera"];
		$consulta = "SELECT instancias.inst_id FROM (carreras INNER JOIN inscripcion_carreras ON 
                    carreras.carr_id = inscripcion_carreras.inca_idcarrera) INNER JOIN 
                    instancias ON inscripcion_carreras.inca_idinscripcion = instancias.inst_idinscripcion 
                    WHERE (instancias.inst_estado='ABIERTA') AND (carreras.carr_id='$carrera')";

		$res = $con->query($consulta);
        #RECORRO LOS REGISTROS------------------------------------------------------------------------------
        $i=0;
        $id="";
        foreach ($res as $reg) {
            $id = utf8_decode($reg["inst_id"]);
			$i++;
        }
        return $id;
    }
    #-------------------------------------------------------------------------------------------------------
    #-------------------------------FUNCION QUE CARGA LOS DATOS LOCALIDAD-----------------------------------
    function cargarLocalidad($datos){
		global $con;
		$idlocalidad = $datos["idlocalidad"];
		$consulta = "SELECT partido.part_descripcion, localidad.loca_cp FROM partido INNER JOIN 
                    localidad ON partido.part_id = localidad.loca_idpartido WHERE 
                    localidad.loca_id='$idlocalidad'";
        $res = $con->query($consulta);
        #RECORRO LOS REGISTROS------------------------------------------------------------------------------
        $i=0;
        $combo = array();
        foreach ($res as $reg) {
            $option = array("partido"=>utf8_decode($reg["part_descripcion"]), "cp"=>utf8_decode($reg["loca_cp"]));
			$combo[$i] = $option;
            $i++;
        }
        $num=$i+1;
        return array($num, $combo);
    }
    #-------------------------------------------------------------------------------------------------------
    #--------------------------------------FUNCION QUE CARGA LOS COLEGIOS-----------------------------------
    function cargarColegios($datos){
		global $con;
		$condition = $datos["condition"]? ' WHERE '.$datos["condition"]:'';
		$consulta = "SELECT colegios.cole_id, colegios.cole_descripcion || ' --Localidad :' || localidad.loca_descripcion as nombre 
                    FROM localidad INNER JOIN colegios ON localidad.loca_id = colegios.cole_idlocalidad 
                    ".$condition." ORDER BY nombre";
		$res = $con->query($consulta);
        #RECORRO LOS REGISTROS------------------------------------------------------------------------------
        $i=0;
        $combo = array();
        foreach ($res as $reg) {
            $option = array("id"=>utf8_decode($reg["cole_id"]), "nom"=>utf8_decode($reg["nombre"]));
			$combo[$i] = $option;
            $i++;
        }
        $num=$i+1;
        return array($num, $combo);
    }
    #-------------------------------------------------------------------------------------------------------
    #--------------------------FUNCION QUE GRABA LOS DATOS DE LA PRE-INSCRIPCION----------------------------
    function guardarDatos($datinsc,$datpers,$datest,$dattrab,$datfam,$datenc){
        #CONEXION A LA BASE DE DATOS------------------------------------------------------------------------
        global $con;
        
        #INSTANCIA DE CLASE PARA CONVERTIR DATOS------------------------------------------------------------
        global $Convertir;
        
        #ARMO LOS DATOS DE INSCRIPCION----------------------------------------------------------------------
        $id="";
        $fechainscripcion= $Convertir->SqlFecha(date("d/m/Y"),2);
        $idcarrera=trim($datinsc["idcarrera"]);
        $idanexo=trim($datinsc["idanexo"]);
        $idmodalidad=trim($datinsc["idmodalidad"]);
        $idturno=trim($datinsc["idturno"]);
        $idinstancia=trim($datinsc["idinstancia"]);
        $nropreinscripcion="";
       
        #ARMO LOS DATOS DE PERSONALES-----------------------------------------------------------------------
		$apellido=trim($datpers["apellido"]);
        $nombre=trim($datpers["nombre"]);
        $tipodoc=trim($datpers["tipodoc"]);
        $nrodoc=trim($datpers["nrodoc"]);
        $calle=trim($datpers["calle"]);
        $nrocalle=trim($datpers["nrocalle"]);
        $dpto=trim($datpers["dpto"]);
        $piso=trim($datpers["piso"]);
        $idlocalidad=trim($datpers["idlocalidad"]);
        $tel=trim($datpers["tel"]);
        $cel=trim($datpers["cel"]);
        $email=trim($datpers["email"]);
        $fechanac=$Convertir->SqlFecha(trim($datpers["fechanac"]),2);
        $lugarnac=trim($datpers["lugarnac"]);
        $nacionalidad=trim($datpers["nacionalidad"]);
        $sexo=trim($datpers["sexo"]);
        $pais=trim($datpers["pais"]);
        $estadocivil=trim($datpers["estadocivil"]);
        $hijos=trim($datpers["hijos"]);
        $canthijos=trim($datpers["canthijos"]);
        $edades=trim($datpers["edades"]);
        
        #ARMO LOS DATOS DE ESTUDIOA------------------------------------------------------------------------
		$cursados=trim($datest["cursados"]);
        $idtitulo=trim($datest["idtitulo"]);
        $idorientacion=trim($datest["idorientacion"]);
        $dependencia=trim($datest["dependencia"]);
        $egreso=trim($datest["egreso"]);
        $cantanios=trim($datest["cantanios"]);
        $idcolegio=trim($datest["idcolegio"]);
        $otrosestudios=trim($datest["otrosestudios"]);
        $otroscarrera=trim($datest["otroscarrera"]);
        $otrosestablecimiento=trim($datest["otrosestablecimiento"]);
       	$informatica=trim($datest["informatica"]);
        $idioma=trim($datest["idioma"]);
        $cual=trim($datest["cual"]);
        $otrosestado=trim($datest["otrosestado"]);		
		
        #ARMO LOS DATOS DE TRABAJO------------------------------------------------------------------------
        $trabaja=trim($dattrab["trabaja"]);
        $ocupacion=trim($dattrab["ocupacion"]);
        $canthoras=trim($dattrab["canthoras"]);
        $relacion=trim($dattrab["relacion"]);
        $empresa=trim($dattrab["empresa"]);
        $cargo=trim($dattrab["cargo"]);
        
        #ARMO LOS DATOS DE FAMILIA------------------------------------------------------------------------
        $madre=trim($datfam["madre"]);
        $madreocupacion=trim($datfam["madreocupacion"]);
        $madreestudio=trim($datfam["madreestudio"]);
        $padre=trim($datfam["padre"]);
        $padreocupacion=trim($datfam["padreocupacion"]);
        $padreestudio=trim($datfam["padreestudio"]);
        $conyestudio=trim($datfam["conyestudio"]);
        $conyocupacion=trim($datfam["conyocupacion"]);
       
        #ARMO LOS DATOS DE ENCUESTA------------------------------------------------------------------------
        $tipoenc=trim($datenc["tipoenc"]);
        $selecenc=trim($datenc["selecenc"]);
        $otroenc=trim($datenc["otroenc"]);
        
        #VERIFICO QUE NO SE HALLA DADO DE ALTA-------------------------------------------------------------
        $consulta = "SELECT datos_inscripcion.dain_id FROM datos_inscripcion INNER JOIN datos_personales 
                    ON datos_inscripcion.dain_id = datos_personales.dape_idinscripcion WHERE 
                    (datos_inscripcion.dain_idinstancia='$idinstancia') AND 
                    (datos_personales.dape_tipodoc='$tipodoc') AND (datos_personales.dape_nrodoc='$nrodoc')";
        $res = $con->query($consulta);
        #RECORRO LOS REGISTROS------------------------------------------------------------------------------
        $ENC="NO";
        foreach ($res as $reg) {
            $ENC="SI";
        }
        if($ENC=="SI"){$ERROR="ERROR- YA EXISTE UNA PREINSCRIPCION";	return $ERROR; exit;}
        
        #INICIO UNA TRANSACCION-----------------------------------------------------------------------------
        $con->beginTransaction();
        
        #BUSCO EL ULTIMO ID---------------------------------------------------------------------------------
        $consulta = "SELECT parametros.para_id FROM parametros";
        $res = $con->query($consulta);
        #RECORRO LOS REGISTROS------------------------------------------------------------------------------
        $ENC="NO";
        foreach ($res as $reg) {
            $ENC="SI";
            $id=$reg["para_id"];
        }
        if(ENC=="NO"){$ERROR="ERROR- NO SE PUDO OBTENER EL ULTIMO ID";	return $ERROR; exit;}
        $id=$id+1;
        
        #ACTUALIZO EL ID------------------------------------------------------------------------------------
        $consulta=$con->prepare("UPDATE parametros SET para_id='$id'");                  
        if(!$consulta->execute()){$ERROR="ERROR- NO SE PUDO ACTUALIZAR EL ID";$con->rollback();
                                	return $ERROR; exit;}

        #INSERTO DATOS INSCRIPCION--------------------------------------------------------------------------
        $fech=explode("/",date("d/m/Y"));
        $nropreinscripcion=$fech[2].$fech[1].$fech[0].$id;
        $consulta=$con->prepare("INSERT INTO datos_inscripcion(dain_id, dain_fechainscripcion, dain_idcarrera, 
                                dain_idanexo,dain_idmodalidad,dain_idturno, dain_nropreinscripcion, 
                                dain_idinstancia) VALUES ('$id','$fechainscripcion', '$idcarrera','$idanexo',
                                '$idmodalidad', '$idturno', '$nropreinscripcion','$idinstancia')");   
                
        if(!$consulta->execute()){$ERROR="ERROR- NO SE PUDO GRABAR DATOS INSCRIPCION";$con->rollback();
                                	return $ERROR; exit;}
       
        #INSERTO DATOS PERSONALES--------------------------------------------------------------------------
        $consulta=$con->prepare("INSERT INTO datos_personales(dape_idinscripcion, dape_apellido, dape_nombre, 
                                dape_tipodoc, dape_nrodoc, dape_calle, dape_nrocalle, dape_piso, dape_dpto, 
                                dape_idlocalidad, dape_telparticular, dape_celular, dape_email, dape_fechanac, 
                                dape_idlocalidadnac, dape_sexo, dape_nacionalidad, dape_pais, dape_estadocivil, 
                                dape_hijos, dape_cantidadhijos, dape_edades) VALUES ('$id', '$apellido', 
                                '$nombre', '$tipodoc', '$nrodoc', '$calle', '$nrocalle', '$piso', '$dpto', 
                                '$idlocalidad', '$tel', '$cel', '$email', '$fechanac', '$lugarnac', '$sexo', 
                                '$nacionalidad', '$pais', '$estadocivil', '$hijos', '$canthijos','$edades')");
        
       /* $consulta=$con->prepare("INSERT INTO datos_personales(dape_idinscripcion, dape_apellido, dape_nombre, 
                                dape_tipodoc, dape_nrodoc, dape_calle, dape_nrocalle, dape_piso, dape_dpto, 
                                dape_idlocalidad, dape_telparticular, dape_celular, dape_email, dape_fechanac, 
                                dape_idlocalidadnac, dape_sexo, dape_nacionalidad, dape_pais, dape_estadocivil, 
                                dape_hijos, dape_cantidadhijos, dape_edades) VALUES ('$id', '$apellido', 
                                '$nombre', '$tipodoc', '$nrodoc', '$calle', '$nrocalle', '$piso', '$dpto', 
                                '$idlocalidad', '$tel', '$cel', '$email', '$fechanac', '$lugarnac', '$sexo', 
                                '$nacionalidad', '$pais', '$estadocivil', '$hijos', '$canthijos', '$edades')"); */  
            
        if(!$consulta->execute()){$ERROR="ERROR- NO SE PUDO GRABAR DATOS PERSONALES";$con->rollback();
                                	return $ERROR; exit;}
        
        #INSERTO DATOS ESTUDIOS---------------------------------------------------------------------------
        $consulta=$con->prepare("INSERT INTO datos_estudios(daes_idinscripcion, daes_estudioscursados, 
                                daes_idtitulo, daes_dependencia, daes_anioegreso, daes_idcolegio, 
                                daes_cantanios, daes_otrosestudios, daes_otroscarrera, 
                                daes_otrosestablecimiento, daes_otrosestado, daes_informatica, daes_idioma, 
                                daes_cual, daes_idorientacion) VALUES ('$id', '$cursados', '$idtitulo', 
                                '$dependencia', '$egreso', '$idcolegio', '$cantanios', '$otrosestudios', 
                                '$otroscarrera', '$otrosestablecimiento', '$otrosestado', '$informatica', 
                                '$idioma', '$cual', '$idorientacion')");   
           
        if(!$consulta->execute()){$ERROR="ERROR- NO SE PUDO GRABAR DATOS ESTUDIOS";$con->rollback();
                                	return $ERROR; exit;}
        
        #INSERTO DATOS TRABAJO---------------------------------------------------------------------------
        $consulta=$con->prepare("INSERT INTO datos_trabajo(datr_idinscripcion, datr_trabaja, datr_ocupacion, 
                                datr_horassemanales, datr_relacion, datr_empresa, datr_cargo) VALUES ('$id', 
                                '$trabaja', '$ocupacion', '$canthoras', '$relacion', '$empresa', 
                                '$cargo')");   
           
        if(!$consulta->execute()){$ERROR="ERROR- NO SE PUDO GRABAR DATOS TRABAJO";$con->rollback();
                                	return $ERROR; exit;}
        
        #INSERTO DATOS FAMILIA---------------------------------------------------------------------------
        $consulta=$con->prepare("INSERT INTO datos_familia(dafa_idinscripcion, dafa_padre, dafa_padreestudios, 
                                dafa_padreocupacion, dafa_madre, dafa_madreestudios, dafa_madreocupacion, 
                                dafa_conyugeestudios, dafa_conyugeocupacion) VALUES ('$id', '$padre', 
                                '$padreestudio', '$padreocupacion', '$madre', '$madreestudio', '$madreocupacion', 
                                '$conyestudio', '$conyocupacion')");   
          
        if(!$consulta->execute()){$ERROR="ERROR- NO SE PUDO GRABAR DATOS FAMILIA";$con->rollback();
                                	return $ERROR; exit;}
        
        #INSERTO DATOS ENCUESTA--------------------------------------------------------------------------
        $consulta=$con->prepare("INSERT INTO datos_encuestas(daen_idinscripcion, daen_tipoenc, daen_selecenc, 
                                daen_otroenc) VALUES ('$id', '$tipoenc', '$selecenc', '$otroenc')");   
          
        if(!$consulta->execute()){$ERROR="ERROR- NO SE PUDO GRABAR DATOS ENCUESTA";$con->rollback();
                                	return $ERROR; exit;}
        
       #TERMINO LA TRANSACCION------------------------------------------------------------------------------
       $con->commit();
       
       #DEVUELVO QUE TERMINO CON EXITO----------------------------------------------------------------------
       $ERROR="EXITO";
       return array($ERROR,$nropreinscripcion);
    }
}
?>