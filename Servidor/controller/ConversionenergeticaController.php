<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    En esto paso mis sábados en la noche ( ¬.¬)  \\
include_once realpath('../facade/ConversionenergeticaFacade.php');


class ConversionenergeticaController {

    public static function insert(){
        $idconversionEnergetica = strip_tags($_POST['idconversionEnergetica']);
        $descripcionConversionEnergetica = strip_tags($_POST['descripcionConversionEnergetica']);
        $fechaConversionEnergetica = strip_tags($_POST['fechaConversionEnergetica']);
        $Agroclimatologia_idagroclimatologia = strip_tags($_POST['agroclimatologia_idagroclimatologia']);
        $agroclimatologia= new Agroclimatologia();
        $agroclimatologia->setIdagroclimatologia($Agroclimatologia_idagroclimatologia);
        ConversionenergeticaFacade::insert($idconversionEnergetica, $descripcionConversionEnergetica, $fechaConversionEnergetica, $agroclimatologia);
return true;
    }

    public static function listAll(){
        $list=ConversionenergeticaFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Conversionenergetica) {	
	       $rta.="{
	    \"idconversionEnergetica\":\"{$Conversionenergetica->getidconversionEnergetica()}\",
	    \"descripcionConversionEnergetica\":\"{$Conversionenergetica->getdescripcionConversionEnergetica()}\",
	    \"fechaConversionEnergetica\":\"{$Conversionenergetica->getfechaConversionEnergetica()}\",
	    \"agroclimatologia_idagroclimatologia_idagroclimatologia\":\"{$Conversionenergetica->getagroclimatologia_idagroclimatologia()->getidagroclimatologia()}\"
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