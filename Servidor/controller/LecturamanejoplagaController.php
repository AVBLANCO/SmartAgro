<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Proletarios del mundo ¡Uníos!  \\
include_once realpath('../facade/LecturamanejoplagaFacade.php');


class LecturamanejoplagaController {

    public static function insert(){
        $idlecturaManejoPlaga = strip_tags($_POST['idlecturaManejoPlaga']);
        $valorLecturaManejoPlagacol = strip_tags($_POST['valorLecturaManejoPlagacol']);
        $fechaLecturaManejoPlaga = strip_tags($_POST['fechaLecturaManejoPlaga']);
        $Metricamanejoplagas_idmetricaManejoPlagas = strip_tags($_POST['metricaManejoPlagas_idmetricaManejoPlagas']);
        $metricamanejoplagas= new Metricamanejoplagas();
        $metricamanejoplagas->setIdmetricaManejoPlagas($Metricamanejoplagas_idmetricaManejoPlagas);
        LecturamanejoplagaFacade::insert($idlecturaManejoPlaga, $valorLecturaManejoPlagacol, $fechaLecturaManejoPlaga, $metricamanejoplagas);
return true;
    }

    public static function listAll(){
        $list=LecturamanejoplagaFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Lecturamanejoplaga) {	
	       $rta.="{
	    \"idlecturaManejoPlaga\":\"{$Lecturamanejoplaga->getidlecturaManejoPlaga()}\",
	    \"valorLecturaManejoPlagacol\":\"{$Lecturamanejoplaga->getvalorLecturaManejoPlagacol()}\",
	    \"fechaLecturaManejoPlaga\":\"{$Lecturamanejoplaga->getfechaLecturaManejoPlaga()}\",
	    \"metricaManejoPlagas_idmetricaManejoPlagas_idmetricaManejoPlagas\":\"{$Lecturamanejoplaga->getmetricaManejoPlagas_idmetricaManejoPlagas()->getidmetricaManejoPlagas()}\"
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