<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Ella no te quiere </3 mejor ponte a programar  \\
include_once realpath('../facade/MetricamanejointegradoenfermedadesFacade.php');


class MetricamanejointegradoenfermedadesController {

    public static function insert(){
        $idmetricaManejoIntegradoEnfermedades = strip_tags($_POST['idmetricaManejoIntegradoEnfermedades']);
        $descricionMetricaManejoIntegradoEnfermedades = strip_tags($_POST['descricionMetricaManejoIntegradoEnfermedades']);
        $Manejointegradoenfermedades_idmanejoIntegradoEnfermedades = strip_tags($_POST['manejoIntegradoEnfermedades_idmanejoIntegradoEnfermedades']);
        $manejointegradoenfermedades= new Manejointegradoenfermedades();
        $manejointegradoenfermedades->setIdmanejoIntegradoEnfermedades($Manejointegradoenfermedades_idmanejoIntegradoEnfermedades);
        MetricamanejointegradoenfermedadesFacade::insert($idmetricaManejoIntegradoEnfermedades, $descricionMetricaManejoIntegradoEnfermedades, $manejointegradoenfermedades);
return true;
    }

    public static function listAll(){
        $list=MetricamanejointegradoenfermedadesFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Metricamanejointegradoenfermedades) {	
	       $rta.="{
	    \"idmetricaManejoIntegradoEnfermedades\":\"{$Metricamanejointegradoenfermedades->getidmetricaManejoIntegradoEnfermedades()}\",
	    \"descricionMetricaManejoIntegradoEnfermedades\":\"{$Metricamanejointegradoenfermedades->getdescricionMetricaManejoIntegradoEnfermedades()}\",
	    \"manejoIntegradoEnfermedades_idmanejoIntegradoEnfermedades_idmanejoIntegradoEnfermedades\":\"{$Metricamanejointegradoenfermedades->getmanejoIntegradoEnfermedades_idmanejoIntegradoEnfermedades()->getidmanejoIntegradoEnfermedades()}\"
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