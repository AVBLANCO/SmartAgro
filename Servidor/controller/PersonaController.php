<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Lolita, luz de mi vida, fuego de mis entrañas. Pecado mío, alma mía.  \\
include_once realpath('../facade/PersonaFacade.php');


class PersonaController {

    public static function insert(){
        $idpersona = strip_tags($_POST['idpersona']);
        $nombrePersona = strip_tags($_POST['nombrePersona']);
        $cedulaPersona = strip_tags($_POST['cedulaPersona']);
        $correoPersona = strip_tags($_POST['correoPersona']);
        $fechaNacimientoPersona = strip_tags($_POST['fechaNacimientoPersona']);
        $genero = strip_tags($_POST['genero']);
        PersonaFacade::insert($idpersona, $nombrePersona, $cedulaPersona, $correoPersona, $fechaNacimientoPersona, $genero);
return true;
    }

    public static function listAll(){
        $list=PersonaFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Persona) {	
	       $rta.="{
	    \"idpersona\":\"{$Persona->getidpersona()}\",
	    \"nombrePersona\":\"{$Persona->getnombrePersona()}\",
	    \"cedulaPersona\":\"{$Persona->getcedulaPersona()}\",
	    \"correoPersona\":\"{$Persona->getcorreoPersona()}\",
	    \"fechaNacimientoPersona\":\"{$Persona->getfechaNacimientoPersona()}\",
	    \"genero\":\"{$Persona->getgenero()}\"
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