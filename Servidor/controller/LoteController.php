<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Ya están los patrones implementados, ahora sí viene lo chido...  \\
include_once realpath('../facade/LoteFacade.php');


class LoteController {

    public static function insert(){
        $idlote = strip_tags($_POST['idlote']);
        $descripcionLote = strip_tags($_POST['descripcionLote']);
        $longitud = strip_tags($_POST['longitud']);
        $latitud = strip_tags($_POST['latitud']);
        $Finca_idfinca = strip_tags($_POST['finca_idfinca']);
        $finca= new Finca();
        $finca->setIdfinca($Finca_idfinca);
        LoteFacade::insert($idlote, $descripcionLote, $longitud, $latitud, $finca);
return true;
    }

    public static function listAll(){
        $list=LoteFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Lote) {	
	       $rta.="{
	    \"idlote\":\"{$Lote->getidlote()}\",
	    \"descripcionLote\":\"{$Lote->getdescripcionLote()}\",
	    \"longitud\":\"{$Lote->getlongitud()}\",
	    \"latitud\":\"{$Lote->getlatitud()}\",
	    \"finca_idfinca_idfinca\":\"{$Lote->getfinca_idfinca()->getidfinca()}\"
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