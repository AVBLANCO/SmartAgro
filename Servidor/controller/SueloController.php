<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    -¡UNO! -¡¡ +4 !!  \\
include_once realpath('../facade/SueloFacade.php');


class SueloController {

    public static function insert(){
        $idsuelo = strip_tags($_POST['idsuelo']);
        $decripcionSuelo = strip_tags($_POST['decripcionSuelo']);
        $fechaSuelo = strip_tags($_POST['fechaSuelo']);
        $Lote_idlote = strip_tags($_POST['lote_idlote']);
        $lote= new Lote();
        $lote->setIdlote($Lote_idlote);
        SueloFacade::insert($idsuelo, $decripcionSuelo, $fechaSuelo, $lote);
return true;
    }

    public static function listAll(){
        $list=SueloFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Suelo) {	
	       $rta.="{
	    \"idsuelo\":\"{$Suelo->getidsuelo()}\",
	    \"decripcionSuelo\":\"{$Suelo->getdecripcionSuelo()}\",
	    \"fechaSuelo\":\"{$Suelo->getfechaSuelo()}\",
	    \"lote_idlote_idlote\":\"{$Suelo->getlote_idlote()->getidlote()}\"
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