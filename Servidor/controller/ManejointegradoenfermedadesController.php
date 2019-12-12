<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Ahora con 25% menos groserías  \\
include_once realpath('../facade/ManejointegradoenfermedadesFacade.php');


class ManejointegradoenfermedadesController {

    public static function insert(){
        $idmanejoIntegradoEnfermedades = strip_tags($_POST['idmanejoIntegradoEnfermedades']);
        $descripcioManejoIntegradoEnfermedades = strip_tags($_POST['descripcioManejoIntegradoEnfermedades']);
        $Mipe_idmipe = strip_tags($_POST['mipe_idmipe']);
        $mipe= new Mipe();
        $mipe->setIdmipe($Mipe_idmipe);
        ManejointegradoenfermedadesFacade::insert($idmanejoIntegradoEnfermedades, $descripcioManejoIntegradoEnfermedades, $mipe);
return true;
    }

    public static function listAll(){
        $list=ManejointegradoenfermedadesFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Manejointegradoenfermedades) {	
	       $rta.="{
	    \"idmanejoIntegradoEnfermedades\":\"{$Manejointegradoenfermedades->getidmanejoIntegradoEnfermedades()}\",
	    \"descripcioManejoIntegradoEnfermedades\":\"{$Manejointegradoenfermedades->getdescripcioManejoIntegradoEnfermedades()}\",
	    \"mipe_idmipe_idmipe\":\"{$Manejointegradoenfermedades->getmipe_idmipe()->getidmipe()}\"
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