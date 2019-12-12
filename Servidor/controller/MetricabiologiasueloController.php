<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Esta es una frase no referenciada  \\
include_once realpath('../facade/MetricabiologiasueloFacade.php');


class MetricabiologiasueloController {

    public static function insert(){
        $idmetricaBiologiaSuelo = strip_tags($_POST['idmetricaBiologiaSuelo']);
        $descripcionMetricaBiologiaSuelo = strip_tags($_POST['descripcionMetricaBiologiaSuelo']);
        $Biologiasuelo_idbiologiaSuelo = strip_tags($_POST['biologiaSuelo_idbiologiaSuelo']);
        $biologiasuelo= new Biologiasuelo();
        $biologiasuelo->setIdbiologiaSuelo($Biologiasuelo_idbiologiaSuelo);
        MetricabiologiasueloFacade::insert($idmetricaBiologiaSuelo, $descripcionMetricaBiologiaSuelo, $biologiasuelo);
return true;
    }

    public static function listAll(){
        $list=MetricabiologiasueloFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Metricabiologiasuelo) {	
	       $rta.="{
	    \"idmetricaBiologiaSuelo\":\"{$Metricabiologiasuelo->getidmetricaBiologiaSuelo()}\",
	    \"descripcionMetricaBiologiaSuelo\":\"{$Metricabiologiasuelo->getdescripcionMetricaBiologiaSuelo()}\",
	    \"biologiaSuelo_idbiologiaSuelo_idbiologiaSuelo\":\"{$Metricabiologiasuelo->getbiologiaSuelo_idbiologiaSuelo()->getidbiologiaSuelo()}\"
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