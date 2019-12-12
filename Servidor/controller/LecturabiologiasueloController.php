<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Has encontrado la frase #1024 ¡Felicidades! Ahora tu proyecto funcionará a la primera  \\
include_once realpath('../facade/LecturabiologiasueloFacade.php');


class LecturabiologiasueloController {

    public static function insert(){
        $idlecturaBiologiaSuelo = strip_tags($_POST['idlecturaBiologiaSuelo']);
        $fechaLecturaBiologiaSuelo = strip_tags($_POST['fechaLecturaBiologiaSuelo']);
        $valorLecturaBiologiaSuelocol = strip_tags($_POST['valorLecturaBiologiaSuelocol']);
        $Metricabiologiasuelo_idmetricaBiologiaSuelo = strip_tags($_POST['metricaBiologiaSuelo_idmetricaBiologiaSuelo']);
        $metricabiologiasuelo= new Metricabiologiasuelo();
        $metricabiologiasuelo->setIdmetricaBiologiaSuelo($Metricabiologiasuelo_idmetricaBiologiaSuelo);
        LecturabiologiasueloFacade::insert($idlecturaBiologiaSuelo, $fechaLecturaBiologiaSuelo, $valorLecturaBiologiaSuelocol, $metricabiologiasuelo);
return true;
    }

    public static function listAll(){
        $list=LecturabiologiasueloFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Lecturabiologiasuelo) {	
	       $rta.="{
	    \"idlecturaBiologiaSuelo\":\"{$Lecturabiologiasuelo->getidlecturaBiologiaSuelo()}\",
	    \"fechaLecturaBiologiaSuelo\":\"{$Lecturabiologiasuelo->getfechaLecturaBiologiaSuelo()}\",
	    \"valorLecturaBiologiaSuelocol\":\"{$Lecturabiologiasuelo->getvalorLecturaBiologiaSuelocol()}\",
	    \"metricaBiologiaSuelo_idmetricaBiologiaSuelo_idmetricaBiologiaSuelo\":\"{$Lecturabiologiasuelo->getmetricaBiologiaSuelo_idmetricaBiologiaSuelo()->getidmetricaBiologiaSuelo()}\"
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