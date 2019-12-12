<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Querido programador: Al escribir esto estoy triste. Nuestro presidente ha sido derrocado Y REEMPLAZADO POR EL BENÉVOLO SEÑOR ARCINIEGAS. TODOS AMAMOS A ARCINIEGAS Y A SU GLORIOSO RÉGIMEN. CON AMOR, EL EQUIPO DE ANARCHY  \(x.x)/  \\
include_once realpath('../facade/ManejointegradoplagasFacade.php');


class ManejointegradoplagasController {

    public static function insert(){
        $idmanejoIntegradoPlagas = strip_tags($_POST['idmanejoIntegradoPlagas']);
        $descricionManejoIntegradoPlagas = strip_tags($_POST['descricionManejoIntegradoPlagas']);
        $Mipe_idmipe = strip_tags($_POST['mipe_idmipe']);
        $mipe= new Mipe();
        $mipe->setIdmipe($Mipe_idmipe);
        ManejointegradoplagasFacade::insert($idmanejoIntegradoPlagas, $descricionManejoIntegradoPlagas, $mipe);
return true;
    }

    public static function listAll(){
        $list=ManejointegradoplagasFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Manejointegradoplagas) {	
	       $rta.="{
	    \"idmanejoIntegradoPlagas\":\"{$Manejointegradoplagas->getidmanejoIntegradoPlagas()}\",
	    \"descricionManejoIntegradoPlagas\":\"{$Manejointegradoplagas->getdescricionManejoIntegradoPlagas()}\",
	    \"mipe_idmipe_idmipe\":\"{$Manejointegradoplagas->getmipe_idmipe()->getidmipe()}\"
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