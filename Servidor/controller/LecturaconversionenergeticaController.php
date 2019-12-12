<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    La gente siempre me pregunta si conozco a Tyler Durden.  \\
include_once realpath('../facade/LecturaconversionenergeticaFacade.php');


class LecturaconversionenergeticaController {

    public static function insert(){
        $idlecturaConversionEnergetica = strip_tags($_POST['idlecturaConversionEnergetica']);
        $fechaLecturaConversionEnergetica = strip_tags($_POST['fechaLecturaConversionEnergetica']);
        $valorLecturaConversionEnergeticacol = strip_tags($_POST['valorLecturaConversionEnergeticacol']);
        $Metricaconversionenergetica_idmetricaConversionEnergetica = strip_tags($_POST['metricaConversionEnergetica_idmetricaConversionEnergetica']);
        $metricaconversionenergetica= new Metricaconversionenergetica();
        $metricaconversionenergetica->setIdmetricaConversionEnergetica($Metricaconversionenergetica_idmetricaConversionEnergetica);
        LecturaconversionenergeticaFacade::insert($idlecturaConversionEnergetica, $fechaLecturaConversionEnergetica, $valorLecturaConversionEnergeticacol, $metricaconversionenergetica);
return true;
    }

    public static function listAll(){
        $list=LecturaconversionenergeticaFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Lecturaconversionenergetica) {	
	       $rta.="{
	    \"idlecturaConversionEnergetica\":\"{$Lecturaconversionenergetica->getidlecturaConversionEnergetica()}\",
	    \"fechaLecturaConversionEnergetica\":\"{$Lecturaconversionenergetica->getfechaLecturaConversionEnergetica()}\",
	    \"valorLecturaConversionEnergeticacol\":\"{$Lecturaconversionenergetica->getvalorLecturaConversionEnergeticacol()}\",
	    \"metricaConversionEnergetica_idmetricaConversionEnergetica_idmetricaConversionEnergetica\":\"{$Lecturaconversionenergetica->getmetricaConversionEnergetica_idmetricaConversionEnergetica()->getidmetricaConversionEnergetica()}\"
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