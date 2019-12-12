<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Ella no te quiere </3 mejor ponte a programar  \\
include_once realpath('../facade/QuimicasueloFacade.php');


class QuimicasueloController {

    public static function insert(){
        $idQuimicaSuelo = strip_tags($_POST['idQuimicaSuelo']);
        $descripcionQuimica = strip_tags($_POST['descripcionQuimica']);
        $Suelo_idsuelo = strip_tags($_POST['suelo_idsuelo']);
        $suelo= new Suelo();
        $suelo->setIdsuelo($Suelo_idsuelo);
        QuimicasueloFacade::insert($idQuimicaSuelo, $descripcionQuimica, $suelo);
return true;
    }

    public static function listAll(){
        $list=QuimicasueloFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Quimicasuelo) {	
	       $rta.="{
	    \"idQuimicaSuelo\":\"{$Quimicasuelo->getidQuimicaSuelo()}\",
	    \"descripcionQuimica\":\"{$Quimicasuelo->getdescripcionQuimica()}\",
	    \"suelo_idsuelo_idsuelo\":\"{$Quimicasuelo->getsuelo_idsuelo()->getidsuelo()}\"
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