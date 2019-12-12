<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Sólo relájate y deja que alguien más lo haga  \\
include_once realpath('../facade/MetaFacade.php');


class MetaController {

    public static function insert(){
        $idmeta = strip_tags($_POST['idmeta']);
        $descripcionMeta = strip_tags($_POST['descripcionMeta']);
        $valorMeta = strip_tags($_POST['valorMeta']);
        $Proyeccion_idproyeccion = strip_tags($_POST['proyeccion_idproyeccion']);
        $proyeccion= new Proyeccion();
        $proyeccion->setIdproyeccion($Proyeccion_idproyeccion);
        MetaFacade::insert($idmeta, $descripcionMeta, $valorMeta, $proyeccion);
return true;
    }

    public static function listAll(){
        $list=MetaFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Meta) {	
	       $rta.="{
	    \"idmeta\":\"{$Meta->getidmeta()}\",
	    \"descripcionMeta\":\"{$Meta->getdescripcionMeta()}\",
	    \"valorMeta\":\"{$Meta->getvalorMeta()}\",
	    \"proyeccion_idproyeccion_idproyeccion\":\"{$Meta->getproyeccion_idproyeccion()->getidproyeccion()}\"
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