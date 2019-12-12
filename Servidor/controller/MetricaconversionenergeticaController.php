<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Damos paso a la anarquía...  \\
include_once realpath('../facade/MetricaconversionenergeticaFacade.php');


class MetricaconversionenergeticaController {

    public static function insert(){
        $idmetricaConversionEnergetica = strip_tags($_POST['idmetricaConversionEnergetica']);
        $desripcionMetricaConversionEnergetica = strip_tags($_POST['desripcionMetricaConversionEnergetica']);
        $Conversionenergetica_idconversionEnergetica = strip_tags($_POST['conversionEnergetica_idconversionEnergetica']);
        $conversionenergetica= new Conversionenergetica();
        $conversionenergetica->setIdconversionEnergetica($Conversionenergetica_idconversionEnergetica);
        MetricaconversionenergeticaFacade::insert($idmetricaConversionEnergetica, $desripcionMetricaConversionEnergetica, $conversionenergetica);
return true;
    }

    public static function listAll(){
        $list=MetricaconversionenergeticaFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Metricaconversionenergetica) {	
	       $rta.="{
	    \"idmetricaConversionEnergetica\":\"{$Metricaconversionenergetica->getidmetricaConversionEnergetica()}\",
	    \"desripcionMetricaConversionEnergetica\":\"{$Metricaconversionenergetica->getdesripcionMetricaConversionEnergetica()}\",
	    \"conversionEnergetica_idconversionEnergetica_idconversionEnergetica\":\"{$Metricaconversionenergetica->getconversionEnergetica_idconversionEnergetica()->getidconversionEnergetica()}\"
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