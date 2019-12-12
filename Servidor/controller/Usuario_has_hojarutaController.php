<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Puedes sugerirnos frases nuevas, se nos están acabando ( u.u)  \\
include_once realpath('../facade/Usuario_has_hojarutaFacade.php');


class Usuario_has_hojarutaController {

    public static function insert(){
        $Usuario_idusuario = strip_tags($_POST['usuario_idusuario']);
        $usuario= new Usuario();
        $usuario->setIdusuario($Usuario_idusuario);
        $Hojaruta_idhojaRuta = strip_tags($_POST['hojaRuta_idhojaRuta']);
        $hojaruta= new Hojaruta();
        $hojaruta->setIdhojaRuta($Hojaruta_idhojaRuta);
        Usuario_has_hojarutaFacade::insert($usuario, $hojaruta);
return true;
    }

    public static function listAll(){
        $list=Usuario_has_hojarutaFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Usuario_has_hojaruta) {	
	       $rta.="{
	    \"usuario_idusuario_idusuario\":\"{$Usuario_has_hojaruta->getusuario_idusuario()->getidusuario()}\",
	    \"hojaRuta_idhojaRuta_idhojaRuta\":\"{$Usuario_has_hojaruta->gethojaRuta_idhojaRuta()->getidhojaRuta()}\"
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