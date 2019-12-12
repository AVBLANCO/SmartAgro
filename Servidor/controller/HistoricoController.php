<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Pero el ruiseñor no respondió; yacía muerto sobre las altas hierbas, con el corazón traspasado de espinas.  \\
include_once realpath('../facade/HistoricoFacade.php');


class HistoricoController {

    public static function insert(){
        $idhistorico = strip_tags($_POST['idhistorico']);
        $descripcionHistorico = strip_tags($_POST['descripcionHistorico']);
        $Miagroempresa_idmiAgroempresa = strip_tags($_POST['miAgroempresa_idmiAgroempresa']);
        $miagroempresa= new Miagroempresa();
        $miagroempresa->setIdmiAgroempresa($Miagroempresa_idmiAgroempresa);
        $valorHistorico = strip_tags($_POST['valorHistorico']);
        HistoricoFacade::insert($idhistorico, $descripcionHistorico, $miagroempresa, $valorHistorico);
return true;
    }

    public static function listAll(){
        $list=HistoricoFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Historico) {	
	       $rta.="{
	    \"idhistorico\":\"{$Historico->getidhistorico()}\",
	    \"descripcionHistorico\":\"{$Historico->getdescripcionHistorico()}\",
	    \"miAgroempresa_idmiAgroempresa_idmiAgroempresa\":\"{$Historico->getmiAgroempresa_idmiAgroempresa()->getidmiAgroempresa()}\",
	    \"valorHistorico\":\"{$Historico->getvalorHistorico()}\"
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