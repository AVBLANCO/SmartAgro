<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Ya están los patrones implementados, ahora sí viene lo chido...  \\
include_once realpath('../facade/HojarutaFacade.php');


class HojarutaController {

    public static function insert(){
        $idhojaRuta = strip_tags($_POST['idhojaRuta']);
        $fechaHojaRuta = strip_tags($_POST['fechaHojaRuta']);
        $Costo_idcosto = strip_tags($_POST['costo_idcosto']);
        $costo= new Costo();
        $costo->setIdcosto($Costo_idcosto);
        HojarutaFacade::insert($idhojaRuta, $fechaHojaRuta, $costo);
return true;
    }

    public static function listAll(){
        $list=HojarutaFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Hojaruta) {	
	       $rta.="{
	    \"idhojaRuta\":\"{$Hojaruta->getidhojaRuta()}\",
	    \"fechaHojaRuta\":\"{$Hojaruta->getfechaHojaRuta()}\",
	    \"costo_idcosto_idcosto\":\"{$Hojaruta->getcosto_idcosto()->getidcosto()}\"
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