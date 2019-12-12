<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ...y esta no es la única frase que encontrarás...  \\
include_once realpath('../facade/LecturabalancehidricoFacade.php');


class LecturabalancehidricoController {

    public static function insert(){
        $idlecturaBalanceHidrico = strip_tags($_POST['idlecturaBalanceHidrico']);
        $fechaLecturaBalanceHidrico = strip_tags($_POST['fechaLecturaBalanceHidrico']);
        $valorLecturaBalanceHidrico = strip_tags($_POST['valorLecturaBalanceHidrico']);
        $Metricabalancehidrico_idmetricaBalanceHidrico = strip_tags($_POST['metricaBalanceHidrico_idmetricaBalanceHidrico']);
        $metricabalancehidrico= new Metricabalancehidrico();
        $metricabalancehidrico->setIdmetricaBalanceHidrico($Metricabalancehidrico_idmetricaBalanceHidrico);
        LecturabalancehidricoFacade::insert($idlecturaBalanceHidrico, $fechaLecturaBalanceHidrico, $valorLecturaBalanceHidrico, $metricabalancehidrico);
return true;
    }

    public static function listAll(){
        $list=LecturabalancehidricoFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Lecturabalancehidrico) {	
	       $rta.="{
	    \"idlecturaBalanceHidrico\":\"{$Lecturabalancehidrico->getidlecturaBalanceHidrico()}\",
	    \"fechaLecturaBalanceHidrico\":\"{$Lecturabalancehidrico->getfechaLecturaBalanceHidrico()}\",
	    \"valorLecturaBalanceHidrico\":\"{$Lecturabalancehidrico->getvalorLecturaBalanceHidrico()}\",
	    \"metricaBalanceHidrico_idmetricaBalanceHidrico_idmetricaBalanceHidrico\":\"{$Lecturabalancehidrico->getmetricaBalanceHidrico_idmetricaBalanceHidrico()->getidmetricaBalanceHidrico()}\"
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