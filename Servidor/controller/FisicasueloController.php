<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    El código es tuyo, modifícalo como quieras  \\
include_once realpath('../facade/FisicasueloFacade.php');


class FisicasueloController {

    public static function insert(){
        $idfisicaSuelo = strip_tags($_POST['idfisicaSuelo']);
        $decscricionfisicaSuelo = strip_tags($_POST['decscricionfisicaSuelo']);
        $Suelo_idsuelo = strip_tags($_POST['suelo_idsuelo']);
        $suelo= new Suelo();
        $suelo->setIdsuelo($Suelo_idsuelo);
        FisicasueloFacade::insert($idfisicaSuelo, $decscricionfisicaSuelo, $suelo);
return true;
    }

    public static function listAll(){
        $list=FisicasueloFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Fisicasuelo) {	
	       $rta.="{
	    \"idfisicaSuelo\":\"{$Fisicasuelo->getidfisicaSuelo()}\",
	    \"decscricionfisicaSuelo\":\"{$Fisicasuelo->getdecscricionfisicaSuelo()}\",
	    \"suelo_idsuelo_idsuelo\":\"{$Fisicasuelo->getsuelo_idsuelo()->getidsuelo()}\"
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