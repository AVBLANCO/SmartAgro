<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Sabías que Anarchy se generó a sí mismo?  \\
include_once realpath('../facade/FincaFacade.php');


class FincaController {

    public static function insert(){
        $idfinca = strip_tags($_POST['idfinca']);
        $descripcionFinca = strip_tags($_POST['descripcionFinca']);
        FincaFacade::insert($idfinca, $descripcionFinca);
return true;
    }

    public static function listAll(){
        $list=FincaFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Finca) {	
	       $rta.="{
	    \"idfinca\":\"{$Finca->getidfinca()}\",
	    \"descripcionFinca\":\"{$Finca->getdescripcionFinca()}\"
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