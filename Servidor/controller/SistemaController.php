<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¡Alza el puño y ven! ¡En la hoguera hay de beber!  \\
include_once realpath('../facade/SistemaFacade.php');


class SistemaController {

    public static function insert(){
        $idsistema = strip_tags($_POST['idsistema']);
        $descripcion = strip_tags($_POST['descripcion']);
        SistemaFacade::insert($idsistema, $descripcion);
return true;
    }

    public static function listAll(){
        $list=SistemaFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Sistema) {	
	       $rta.="{
	    \"idsistema\":\"{$Sistema->getidsistema()}\",
	    \"descripcion\":\"{$Sistema->getdescripcion()}\"
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