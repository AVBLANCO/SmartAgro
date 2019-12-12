<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Trabajo individual singifica ganancia individual  \\
include_once realpath('../facade/MetricaquimicasueloFacade.php');


class MetricaquimicasueloController {

    public static function insert(){
        $idmetricaQuimicaSuelo = strip_tags($_POST['idmetricaQuimicaSuelo']);
        $descripcionMetricaQuimicaSuelocol = strip_tags($_POST['descripcionMetricaQuimicaSuelocol']);
        $Quimicasuelo_idQuimicaSuelo = strip_tags($_POST['quimicaSuelo_idQuimicaSuelo']);
        $quimicasuelo= new Quimicasuelo();
        $quimicasuelo->setIdQuimicaSuelo($Quimicasuelo_idQuimicaSuelo);
        MetricaquimicasueloFacade::insert($idmetricaQuimicaSuelo, $descripcionMetricaQuimicaSuelocol, $quimicasuelo);
return true;
    }

    public static function listAll(){
        $list=MetricaquimicasueloFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Metricaquimicasuelo) {	
	       $rta.="{
	    \"idmetricaQuimicaSuelo\":\"{$Metricaquimicasuelo->getidmetricaQuimicaSuelo()}\",
	    \"descripcionMetricaQuimicaSuelocol\":\"{$Metricaquimicasuelo->getdescripcionMetricaQuimicaSuelocol()}\",
	    \"quimicaSuelo_idQuimicaSuelo_idQuimicaSuelo\":\"{$Metricaquimicasuelo->getquimicaSuelo_idQuimicaSuelo()->getidQuimicaSuelo()}\"
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