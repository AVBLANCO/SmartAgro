<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Tranquilo, yo tampoco entiendo cómo funciona mi código  \\
include_once realpath('../facade/LecturamanejointegradoenfermedadesFacade.php');


class LecturamanejointegradoenfermedadesController {

    public static function insert(){
        $idlecturaManejoIntegradoEnfermedades = strip_tags($_POST['idlecturaManejoIntegradoEnfermedades']);
        $fechaLecturaManejoIntegradoEnfermedadescol = strip_tags($_POST['fechaLecturaManejoIntegradoEnfermedadescol']);
        $valorLecturaManejoIntegradoEnfermedades = strip_tags($_POST['valorLecturaManejoIntegradoEnfermedades']);
        $Metricamanejointegradoenfermedades_idmetricaManejoIntegradoEnfermedades = strip_tags($_POST['metricaManejoIntegradoEnfermedades']);
        $metricamanejointegradoenfermedades= new Metricamanejointegradoenfermedades();
        $metricamanejointegradoenfermedades->setIdmetricaManejoIntegradoEnfermedades($Metricamanejointegradoenfermedades_idmetricaManejoIntegradoEnfermedades);
        LecturamanejointegradoenfermedadesFacade::insert($idlecturaManejoIntegradoEnfermedades, $fechaLecturaManejoIntegradoEnfermedadescol, $valorLecturaManejoIntegradoEnfermedades, $metricamanejointegradoenfermedades);
return true;
    }

    public static function listAll(){
        $list=LecturamanejointegradoenfermedadesFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Lecturamanejointegradoenfermedades) {	
	       $rta.="{
	    \"idlecturaManejoIntegradoEnfermedades\":\"{$Lecturamanejointegradoenfermedades->getidlecturaManejoIntegradoEnfermedades()}\",
	    \"fechaLecturaManejoIntegradoEnfermedadescol\":\"{$Lecturamanejointegradoenfermedades->getfechaLecturaManejoIntegradoEnfermedadescol()}\",
	    \"valorLecturaManejoIntegradoEnfermedades\":\"{$Lecturamanejointegradoenfermedades->getvalorLecturaManejoIntegradoEnfermedades()}\",
	    \"metricaManejoIntegradoEnfermedades_idmetricaManejoIntegradoEnfermedades\":\"{$Lecturamanejointegradoenfermedades->getmetricaManejoIntegradoEnfermedades()->getidmetricaManejoIntegradoEnfermedades()}\"
	       },";
        }

        if($rta!=""){
	       $rta = substr($rta, 0, -1);
	       $msg="{\"msg\":\"exito\"}";
        }else{
	       $msg="{\"msg\":\"MANEJO DE EXCEPCIONES AQUÍ\"}";
	       $rta="{\"result\":\"No se encontraron registros.\"}";	
        }
        return "[{$msg},{$rta}]";
    }

}
//That`s all folks!