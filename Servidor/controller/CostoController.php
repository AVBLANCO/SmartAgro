<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Lolita, luz de mi vida, fuego de mis entrañas. Pecado mío, alma mía.  \\
include_once realpath('../facade/CostoFacade.php');


class CostoController {

    public static function insert(){
        $idcosto = strip_tags($_POST['idcosto']);
        $descripcionCosto = strip_tags($_POST['descripcionCosto']);
        $valorCosto = strip_tags($_POST['valorCosto']);
        $Miagroempresa_idmiAgroempresa = strip_tags($_POST['miAgroempresa_idmiAgroempresa']);
        $miagroempresa= new Miagroempresa();
        $miagroempresa->setIdmiAgroempresa($Miagroempresa_idmiAgroempresa);
        CostoFacade::insert($idcosto, $descripcionCosto, $valorCosto, $miagroempresa);
return true;
    }

    public static function listAll(){
        $list=CostoFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Costo) {	
	       $rta.="{
	    \"idcosto\":\"{$Costo->getidcosto()}\",
	    \"descripcionCosto\":\"{$Costo->getdescripcionCosto()}\",
	    \"valorCosto\":\"{$Costo->getvalorCosto()}\",
	    \"miAgroempresa_idmiAgroempresa_idmiAgroempresa\":\"{$Costo->getmiAgroempresa_idmiAgroempresa()->getidmiAgroempresa()}\"
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