<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Te veeeeeooooo  \\
include_once realpath('../facade/MipeFacade.php');


class MipeController {

    public static function insert(){
        $idmipe = strip_tags($_POST['idmipe']);
        $decripcionMipe = strip_tags($_POST['decripcionMipe']);
        $fechaMipe = strip_tags($_POST['fechaMipe']);
        $Lote_idlote = strip_tags($_POST['lote_idlote']);
        $lote= new Lote();
        $lote->setIdlote($Lote_idlote);
        MipeFacade::insert($idmipe, $decripcionMipe, $fechaMipe, $lote);
return true;
    }

    public static function listAll(){
        $list=MipeFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Mipe) {	
	       $rta.="{
	    \"idmipe\":\"{$Mipe->getidmipe()}\",
	    \"decripcionMipe\":\"{$Mipe->getdecripcionMipe()}\",
	    \"fechaMipe\":\"{$Mipe->getfechaMipe()}\",
	    \"lote_idlote_idlote\":\"{$Mipe->getlote_idlote()->getidlote()}\"
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