<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Ahora tú puedes ser el tipo con el látigo  \\
include_once realpath('../facade/EscenarioFacade.php');


class EscenarioController {

    public static function insert(){
        $idescenario = strip_tags($_POST['idescenario']);
        $descripcionEscenario = strip_tags($_POST['descripcionEscenario']);
        $Proyeccion_idproyeccion = strip_tags($_POST['proyeccion_idproyeccion']);
        $proyeccion= new Proyeccion();
        $proyeccion->setIdproyeccion($Proyeccion_idproyeccion);
        $valorEscenario = strip_tags($_POST['valorEscenario']);
        EscenarioFacade::insert($idescenario, $descripcionEscenario, $proyeccion, $valorEscenario);
return true;
    }

    public static function listAll(){
        $list=EscenarioFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Escenario) {	
	       $rta.="{
	    \"idescenario\":\"{$Escenario->getidescenario()}\",
	    \"descripcionEscenario\":\"{$Escenario->getdescripcionEscenario()}\",
	    \"proyeccion_idproyeccion_idproyeccion\":\"{$Escenario->getproyeccion_idproyeccion()->getidproyeccion()}\",
	    \"valorEscenario\":\"{$Escenario->getvalorEscenario()}\"
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