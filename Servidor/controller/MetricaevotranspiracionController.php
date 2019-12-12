<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Todos los animales son iguales, pero algunos animales son más iguales que otros  \\
include_once realpath('../facade/MetricaevotranspiracionFacade.php');


class MetricaevotranspiracionController {

    public static function insert(){
        $idmetricaEvotranspiracion = strip_tags($_POST['idmetricaEvotranspiracion']);
        $descripcionMetricaEvotranspiracion = strip_tags($_POST['descripcionMetricaEvotranspiracion']);
        $Evotranspiracion_idevotranspiracion = strip_tags($_POST['evotranspiracion_idevotranspiracion']);
        $evotranspiracion= new Evotranspiracion();
        $evotranspiracion->setIdevotranspiracion($Evotranspiracion_idevotranspiracion);
        MetricaevotranspiracionFacade::insert($idmetricaEvotranspiracion, $descripcionMetricaEvotranspiracion, $evotranspiracion);
return true;
    }

    public static function listAll(){
        $list=MetricaevotranspiracionFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Metricaevotranspiracion) {	
	       $rta.="{
	    \"idmetricaEvotranspiracion\":\"{$Metricaevotranspiracion->getidmetricaEvotranspiracion()}\",
	    \"descripcionMetricaEvotranspiracion\":\"{$Metricaevotranspiracion->getdescripcionMetricaEvotranspiracion()}\",
	    \"evotranspiracion_idevotranspiracion_idevotranspiracion\":\"{$Metricaevotranspiracion->getevotranspiracion_idevotranspiracion()->getidevotranspiracion()}\"
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