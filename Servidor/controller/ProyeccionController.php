<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Cuantas frases como esta crees que puedo escribir?  \\
include_once realpath('../facade/ProyeccionFacade.php');


class ProyeccionController {

    public static function insert(){
        $idproyeccion = strip_tags($_POST['idproyeccion']);
        $descripcionProyeccion = strip_tags($_POST['descripcionProyeccion']);
        $fechaProyeccion = strip_tags($_POST['fechaProyeccion']);
        $Lote_idlote = strip_tags($_POST['lote_idlote']);
        $lote= new Lote();
        $lote->setIdlote($Lote_idlote);
        ProyeccionFacade::insert($idproyeccion, $descripcionProyeccion, $fechaProyeccion, $lote);
return true;
    }

    public static function listAll(){
        $list=ProyeccionFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Proyeccion) {	
	       $rta.="{
	    \"idproyeccion\":\"{$Proyeccion->getidproyeccion()}\",
	    \"descripcionProyeccion\":\"{$Proyeccion->getdescripcionProyeccion()}\",
	    \"fechaProyeccion\":\"{$Proyeccion->getfechaProyeccion()}\",
	    \"lote_idlote_idlote\":\"{$Proyeccion->getlote_idlote()->getidlote()}\"
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