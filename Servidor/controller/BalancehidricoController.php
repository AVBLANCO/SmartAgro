<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    NEVERMORE  \\
include_once realpath('../facade/BalancehidricoFacade.php');


class BalancehidricoController {

    public static function insert(){
        $idbalanceHidrico = strip_tags($_POST['idbalanceHidrico']);
        $descripcioBalanceHidricocol = strip_tags($_POST['descripcioBalanceHidricocol']);
        $fechabalanceHidrico = strip_tags($_POST['fechabalanceHidrico']);
        $Agroclimatologia_idagroclimatologia = strip_tags($_POST['agroclimatologia_idagroclimatologia']);
        $agroclimatologia= new Agroclimatologia();
        $agroclimatologia->setIdagroclimatologia($Agroclimatologia_idagroclimatologia);
        BalancehidricoFacade::insert($idbalanceHidrico, $descripcioBalanceHidricocol, $fechabalanceHidrico, $agroclimatologia);
return true;
    }

    public static function listAll(){
        $list=BalancehidricoFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Balancehidrico) {	
	       $rta.="{
	    \"idbalanceHidrico\":\"{$Balancehidrico->getidbalanceHidrico()}\",
	    \"descripcioBalanceHidricocol\":\"{$Balancehidrico->getdescripcioBalanceHidricocol()}\",
	    \"fechabalanceHidrico\":\"{$Balancehidrico->getfechabalanceHidrico()}\",
	    \"agroclimatologia_idagroclimatologia_idagroclimatologia\":\"{$Balancehidrico->getagroclimatologia_idagroclimatologia()->getidagroclimatologia()}\"
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