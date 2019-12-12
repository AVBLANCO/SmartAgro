<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Si mi madre entendiera mi código, estaría orgullosa  \\
include_once realpath('../facade/MetricassueloFacade.php');


class MetricassueloController {

    public static function insert(){
        $idmetricasSuelo = strip_tags($_POST['idmetricasSuelo']);
        $descripcioMetricasSuelo = strip_tags($_POST['descripcioMetricasSuelo']);
        $Fisicasuelo_idfisicaSuelo = strip_tags($_POST['fisicaSuelo_idfisicaSuelo']);
        $fisicasuelo= new Fisicasuelo();
        $fisicasuelo->setIdfisicaSuelo($Fisicasuelo_idfisicaSuelo);
        MetricassueloFacade::insert($idmetricasSuelo, $descripcioMetricasSuelo, $fisicasuelo);
return true;
    }

    public static function listAll(){
        $list=MetricassueloFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Metricassuelo) {	
	       $rta.="{
	    \"idmetricasSuelo\":\"{$Metricassuelo->getidmetricasSuelo()}\",
	    \"descripcioMetricasSuelo\":\"{$Metricassuelo->getdescripcioMetricasSuelo()}\",
	    \"fisicaSuelo_idfisicaSuelo_idfisicaSuelo\":\"{$Metricassuelo->getfisicaSuelo_idfisicaSuelo()->getidfisicaSuelo()}\"
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