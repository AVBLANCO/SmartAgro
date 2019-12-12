<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Tienes que considerar la posibilidad de que a Dios no le caes bien.  \\
include_once realpath('../facade/BiologiasueloFacade.php');


class BiologiasueloController {

    public static function insert(){
        $idbiologiaSuelo = strip_tags($_POST['idbiologiaSuelo']);
        $biologiaSuelo = strip_tags($_POST['biologiaSuelo']);
        $Suelo_idsuelo = strip_tags($_POST['suelo_idsuelo']);
        $suelo= new Suelo();
        $suelo->setIdsuelo($Suelo_idsuelo);
        BiologiasueloFacade::insert($idbiologiaSuelo, $biologiaSuelo, $suelo);
return true;
    }

    public static function listAll(){
        $list=BiologiasueloFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Biologiasuelo) {	
	       $rta.="{
	    \"idbiologiaSuelo\":\"{$Biologiasuelo->getidbiologiaSuelo()}\",
	    \"biologiaSuelo\":\"{$Biologiasuelo->getbiologiaSuelo()}\",
	    \"suelo_idsuelo_idsuelo\":\"{$Biologiasuelo->getsuelo_idsuelo()->getidsuelo()}\"
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