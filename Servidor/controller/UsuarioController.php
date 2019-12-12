<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Pero el ruiseñor no respondió; yacía muerto sobre las altas hierbas, con el corazón traspasado de espinas.  \\
include_once realpath('../facade/UsuarioFacade.php');


class UsuarioController {

    public static function insert(){
        $idusuario = strip_tags($_POST['idusuario']);
        $nombreUsuario = strip_tags($_POST['nombreUsuario']);
        $passwordUsuario = strip_tags($_POST['passwordUsuario']);
        $Persona_idpersona = strip_tags($_POST['persona_idpersona']);
        $persona= new Persona();
        $persona->setIdpersona($Persona_idpersona);
        $Finca_idfinca = strip_tags($_POST['finca_idfinca']);
        $finca= new Finca();
        $finca->setIdfinca($Finca_idfinca);
        UsuarioFacade::insert($idusuario, $nombreUsuario, $passwordUsuario, $persona, $finca);
return true;
    }

    public static function listAll(){
        $list=UsuarioFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Usuario) {	
	       $rta.="{
	    \"idusuario\":\"{$Usuario->getidusuario()}\",
	    \"nombreUsuario\":\"{$Usuario->getnombreUsuario()}\",
	    \"passwordUsuario\":\"{$Usuario->getpasswordUsuario()}\",
	    \"persona_idpersona_idpersona\":\"{$Usuario->getpersona_idpersona()->getidpersona()}\",
	    \"finca_idfinca_idfinca\":\"{$Usuario->getfinca_idfinca()->getidfinca()}\"
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