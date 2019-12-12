<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    404 Frase no encontrada  \\
include_once realpath('../facade/LecturafisicasueloFacade.php');


class LecturafisicasueloController {

    public static function insert(){
        $idlecturaFisicaSuelo = strip_tags($_POST['idlecturaFisicaSuelo']);
        $fechaLecturaFisicaSuelo = strip_tags($_POST['fechaLecturaFisicaSuelo']);
        $valorLecturaFisicaSuelo = strip_tags($_POST['valorLecturaFisicaSuelo']);
        $Metricassuelo_idmetricasSuelo = strip_tags($_POST['metricasSuelo_idmetricasSuelo']);
        $metricassuelo= new Metricassuelo();
        $metricassuelo->setIdmetricasSuelo($Metricassuelo_idmetricasSuelo);
        LecturafisicasueloFacade::insert($idlecturaFisicaSuelo, $fechaLecturaFisicaSuelo, $valorLecturaFisicaSuelo, $metricassuelo);
return true;
    }

    public static function listAll(){
        $list=LecturafisicasueloFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Lecturafisicasuelo) {	
	       $rta.="{
	    \"idlecturaFisicaSuelo\":\"{$Lecturafisicasuelo->getidlecturaFisicaSuelo()}\",
	    \"fechaLecturaFisicaSuelo\":\"{$Lecturafisicasuelo->getfechaLecturaFisicaSuelo()}\",
	    \"valorLecturaFisicaSuelo\":\"{$Lecturafisicasuelo->getvalorLecturaFisicaSuelo()}\",
	    \"metricasSuelo_idmetricasSuelo_idmetricasSuelo\":\"{$Lecturafisicasuelo->getmetricasSuelo_idmetricasSuelo()->getidmetricasSuelo()}\"
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