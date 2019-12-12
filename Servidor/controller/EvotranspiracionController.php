<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Yo <3 Cúcuta  \\
include_once realpath('../facade/EvotranspiracionFacade.php');


class EvotranspiracionController {

    public static function insert(){
        $idevotranspiracion = strip_tags($_POST['idevotranspiracion']);
        $descripcionEvotranspiracion = strip_tags($_POST['descripcionEvotranspiracion']);
        $fechaEvotranspiracion = strip_tags($_POST['fechaEvotranspiracion']);
        $Agroclimatologia_idagroclimatologia = strip_tags($_POST['agroclimatologia_idagroclimatologia']);
        $agroclimatologia= new Agroclimatologia();
        $agroclimatologia->setIdagroclimatologia($Agroclimatologia_idagroclimatologia);
        EvotranspiracionFacade::insert($idevotranspiracion, $descripcionEvotranspiracion, $fechaEvotranspiracion, $agroclimatologia);
return true;
    }

    public static function listAll(){
        $list=EvotranspiracionFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Evotranspiracion) {	
	       $rta.="{
	    \"idevotranspiracion\":\"{$Evotranspiracion->getidevotranspiracion()}\",
	    \"descripcionEvotranspiracion\":\"{$Evotranspiracion->getdescripcionEvotranspiracion()}\",
	    \"fechaEvotranspiracion\":\"{$Evotranspiracion->getfechaEvotranspiracion()}\",
	    \"agroclimatologia_idagroclimatologia_idagroclimatologia\":\"{$Evotranspiracion->getagroclimatologia_idagroclimatologia()->getidagroclimatologia()}\"
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