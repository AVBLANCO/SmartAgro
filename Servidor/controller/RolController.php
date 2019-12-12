<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Trabajo individual singifica ganancia individual  \\
include_once realpath('../facade/RolFacade.php');


class RolController {

    public static function insert(){
        $idrol = strip_tags($_POST['idrol']);
        $descripcion = strip_tags($_POST['descripcion']);
        $Usuario_idusuario = strip_tags($_POST['usuario_idusuario']);
        $usuario= new Usuario();
        $usuario->setIdusuario($Usuario_idusuario);
        RolFacade::insert($idrol, $descripcion, $usuario);
return true;
    }

    public static function listAll(){
        $list=RolFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Rol) {	
	       $rta.="{
	    \"idrol\":\"{$Rol->getidrol()}\",
	    \"descripcion\":\"{$Rol->getdescripcion()}\",
	    \"usuario_idusuario_idusuario\":\"{$Rol->getusuario_idusuario()->getidusuario()}\"
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