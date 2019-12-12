<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Cuando Gregorio Samsa se despertó una mañana después de un sueño intranquilo, se encontró sobre su cama convertido en un monstruoso insecto.  \\
include_once realpath('../facade/LaborFacade.php');


class LaborController {

    public static function insert(){
        $idlabor = strip_tags($_POST['idlabor']);
        $descripcionLabor = strip_tags($_POST['descripcionLabor']);
        $duracionLabor = strip_tags($_POST['duracionLabor']);
        $Miagroempresa_idmiAgroempresa = strip_tags($_POST['miAgroempresa_idmiAgroempresa']);
        $miagroempresa= new Miagroempresa();
        $miagroempresa->setIdmiAgroempresa($Miagroempresa_idmiAgroempresa);
        LaborFacade::insert($idlabor, $descripcionLabor, $duracionLabor, $miagroempresa);
return true;
    }

    public static function listAll(){
        $list=LaborFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Labor) {	
	       $rta.="{
	    \"idlabor\":\"{$Labor->getidlabor()}\",
	    \"descripcionLabor\":\"{$Labor->getdescripcionLabor()}\",
	    \"duracionLabor\":\"{$Labor->getduracionLabor()}\",
	    \"miAgroempresa_idmiAgroempresa_idmiAgroempresa\":\"{$Labor->getmiAgroempresa_idmiAgroempresa()->getidmiAgroempresa()}\"
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