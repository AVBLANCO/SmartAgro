<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Tienes que considerar la posibilidad de que a Dios no le caes bien.  \\
include_once realpath('../facade/MetricabalancehidricoFacade.php');


class MetricabalancehidricoController {

    public static function insert(){
        $idmetricaBalanceHidrico = strip_tags($_POST['idmetricaBalanceHidrico']);
        $descripcionMetricaBalanceHidrico = strip_tags($_POST['descripcionMetricaBalanceHidrico']);
        $Balancehidrico_idbalanceHidrico = strip_tags($_POST['balanceHidrico_idbalanceHidrico']);
        $balancehidrico= new Balancehidrico();
        $balancehidrico->setIdbalanceHidrico($Balancehidrico_idbalanceHidrico);
        MetricabalancehidricoFacade::insert($idmetricaBalanceHidrico, $descripcionMetricaBalanceHidrico, $balancehidrico);
return true;
    }

    public static function listAll(){
        $list=MetricabalancehidricoFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Metricabalancehidrico) {	
	       $rta.="{
	    \"idmetricaBalanceHidrico\":\"{$Metricabalancehidrico->getidmetricaBalanceHidrico()}\",
	    \"descripcionMetricaBalanceHidrico\":\"{$Metricabalancehidrico->getdescripcionMetricaBalanceHidrico()}\",
	    \"balanceHidrico_idbalanceHidrico_idbalanceHidrico\":\"{$Metricabalancehidrico->getbalanceHidrico_idbalanceHidrico()->getidbalanceHidrico()}\"
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