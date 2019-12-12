<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Trabajo individual singifica ganancia individual  \\
include_once realpath('../facade/LecturaevotranspiracionFacade.php');


class LecturaevotranspiracionController {

    public static function insert(){
        $idlecturaEvotranspiracion = strip_tags($_POST['idlecturaEvotranspiracion']);
        $fechaLecturaEvotranspiracion = strip_tags($_POST['fechaLecturaEvotranspiracion']);
        $valorLecturaEvotranspiracion = strip_tags($_POST['valorLecturaEvotranspiracion']);
        $Metricaevotranspiracion_idmetricaEvotranspiracion = strip_tags($_POST['metricaEvotranspiracion_idmetricaEvotranspiracion']);
        $metricaevotranspiracion= new Metricaevotranspiracion();
        $metricaevotranspiracion->setIdmetricaEvotranspiracion($Metricaevotranspiracion_idmetricaEvotranspiracion);
        LecturaevotranspiracionFacade::insert($idlecturaEvotranspiracion, $fechaLecturaEvotranspiracion, $valorLecturaEvotranspiracion, $metricaevotranspiracion);
return true;
    }

    public static function listAll(){
        $list=LecturaevotranspiracionFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Lecturaevotranspiracion) {	
	       $rta.="{
	    \"idlecturaEvotranspiracion\":\"{$Lecturaevotranspiracion->getidlecturaEvotranspiracion()}\",
	    \"fechaLecturaEvotranspiracion\":\"{$Lecturaevotranspiracion->getfechaLecturaEvotranspiracion()}\",
	    \"valorLecturaEvotranspiracion\":\"{$Lecturaevotranspiracion->getvalorLecturaEvotranspiracion()}\",
	    \"metricaEvotranspiracion_idmetricaEvotranspiracion_idmetricaEvotranspiracion\":\"{$Lecturaevotranspiracion->getmetricaEvotranspiracion_idmetricaEvotranspiracion()->getidmetricaEvotranspiracion()}\"
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