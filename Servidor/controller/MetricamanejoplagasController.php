<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Nuestra empresa cuenta con una división sólo para las frases. Disfrútalas  \\
include_once realpath('../facade/MetricamanejoplagasFacade.php');


class MetricamanejoplagasController {

    public static function insert(){
        $idmetricaManejoPlagas = strip_tags($_POST['idmetricaManejoPlagas']);
        $descripcionMetricaManejoPlagas = strip_tags($_POST['descripcionMetricaManejoPlagas']);
        $Manejointegradoplagas_idmanejoIntegradoPlagas = strip_tags($_POST['manejoIntegradoPlagas_idmanejoIntegradoPlagas']);
        $manejointegradoplagas= new Manejointegradoplagas();
        $manejointegradoplagas->setIdmanejoIntegradoPlagas($Manejointegradoplagas_idmanejoIntegradoPlagas);
        MetricamanejoplagasFacade::insert($idmetricaManejoPlagas, $descripcionMetricaManejoPlagas, $manejointegradoplagas);
return true;
    }

    public static function listAll(){
        $list=MetricamanejoplagasFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Metricamanejoplagas) {	
	       $rta.="{
	    \"idmetricaManejoPlagas\":\"{$Metricamanejoplagas->getidmetricaManejoPlagas()}\",
	    \"descripcionMetricaManejoPlagas\":\"{$Metricamanejoplagas->getdescripcionMetricaManejoPlagas()}\",
	    \"manejoIntegradoPlagas_idmanejoIntegradoPlagas_idmanejoIntegradoPlagas\":\"{$Metricamanejoplagas->getmanejoIntegradoPlagas_idmanejoIntegradoPlagas()->getidmanejoIntegradoPlagas()}\"
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