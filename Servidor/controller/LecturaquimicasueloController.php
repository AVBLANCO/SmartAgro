<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Era más fácil crear un framework que aprender a usar uno existente  \\
include_once realpath('../facade/LecturaquimicasueloFacade.php');


class LecturaquimicasueloController {

    public static function insert(){
        $idlecturaQuimicaSuelo = strip_tags($_POST['idlecturaQuimicaSuelo']);
        $fechaLecturaQuimicaSuelo = strip_tags($_POST['fechaLecturaQuimicaSuelo']);
        $valorLecturaQuimicaSuelo = strip_tags($_POST['valorLecturaQuimicaSuelo']);
        $Metricaquimicasuelo_idmetricaQuimicaSuelo = strip_tags($_POST['metricaQuimicaSuelo_idmetricaQuimicaSuelo']);
        $metricaquimicasuelo= new Metricaquimicasuelo();
        $metricaquimicasuelo->setIdmetricaQuimicaSuelo($Metricaquimicasuelo_idmetricaQuimicaSuelo);
        LecturaquimicasueloFacade::insert($idlecturaQuimicaSuelo, $fechaLecturaQuimicaSuelo, $valorLecturaQuimicaSuelo, $metricaquimicasuelo);
return true;
    }

    public static function listAll(){
        $list=LecturaquimicasueloFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Lecturaquimicasuelo) {	
	       $rta.="{
	    \"idlecturaQuimicaSuelo\":\"{$Lecturaquimicasuelo->getidlecturaQuimicaSuelo()}\",
	    \"fechaLecturaQuimicaSuelo\":\"{$Lecturaquimicasuelo->getfechaLecturaQuimicaSuelo()}\",
	    \"valorLecturaQuimicaSuelo\":\"{$Lecturaquimicasuelo->getvalorLecturaQuimicaSuelo()}\",
	    \"metricaQuimicaSuelo_idmetricaQuimicaSuelo_idmetricaQuimicaSuelo\":\"{$Lecturaquimicasuelo->getmetricaQuimicaSuelo_idmetricaQuimicaSuelo()->getidmetricaQuimicaSuelo()}\"
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