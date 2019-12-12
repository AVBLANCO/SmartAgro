<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Dispongo de doce horas de adelanto, puedo de decárselas a ella  \\
include_once realpath('../facade/MiagroempresaFacade.php');


class MiagroempresaController {

    public static function insert(){
        $idmiAgroempresa = strip_tags($_POST['idmiAgroempresa']);
        $descipcionMiAgroempresa = strip_tags($_POST['descipcionMiAgroempresa']);
        $Lote_idlote = strip_tags($_POST['lote_idlote']);
        $lote= new Lote();
        $lote->setIdlote($Lote_idlote);
        MiagroempresaFacade::insert($idmiAgroempresa, $descipcionMiAgroempresa, $lote);
return true;
    }

    public static function listAll(){
        $list=MiagroempresaFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Miagroempresa) {	
	       $rta.="{
	    \"idmiAgroempresa\":\"{$Miagroempresa->getidmiAgroempresa()}\",
	    \"descipcionMiAgroempresa\":\"{$Miagroempresa->getdescipcionMiAgroempresa()}\",
	    \"lote_idlote_idlote\":\"{$Miagroempresa->getlote_idlote()->getidlote()}\"
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