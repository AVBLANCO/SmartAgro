<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    El código es tuyo, modifícalo como quieras  \\
include_once realpath('../facade/AgroclimatologiaFacade.php');


class AgroclimatologiaController {

    public static function insert(){
        $idagroclimatologia = strip_tags($_POST['idagroclimatologia']);
        $descripcionAgroclimatologia = strip_tags($_POST['descripcionAgroclimatologia']);
        $fechaAgroclimatologia = strip_tags($_POST['fechaAgroclimatologia']);
        $Lote_idlote = strip_tags($_POST['lote_idlote']);
        $lote= new Lote();
        $lote->setIdlote($Lote_idlote);
        AgroclimatologiaFacade::insert($idagroclimatologia, $descripcionAgroclimatologia, $fechaAgroclimatologia, $lote);
return true;
    }

    public static function listAll(){
        $list=AgroclimatologiaFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Agroclimatologia) {	
	       $rta.="{
	    \"idagroclimatologia\":\"{$Agroclimatologia->getidagroclimatologia()}\",
	    \"descripcionAgroclimatologia\":\"{$Agroclimatologia->getdescripcionAgroclimatologia()}\",
	    \"fechaAgroclimatologia\":\"{$Agroclimatologia->getfechaAgroclimatologia()}\",
	    \"lote_idlote_idlote\":\"{$Agroclimatologia->getlote_idlote()->getidlote()}\"
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