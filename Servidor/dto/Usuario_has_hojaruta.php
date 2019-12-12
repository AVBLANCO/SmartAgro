<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿No es más sencillo hacer todo en el Main?  \\


class Usuario_has_hojaruta {

  private $usuario_idusuario;
  private $hojaRuta_idhojaRuta;

    /**
     * Constructor de Usuario_has_hojaruta
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a usuario_idusuario
     * @return usuario_idusuario
     */
  public function getUsuario_idusuario(){
      return $this->usuario_idusuario;
  }

    /**
     * Modifica el valor correspondiente a usuario_idusuario
     * @param usuario_idusuario
     */
  public function setUsuario_idusuario($usuario_idusuario){
      $this->usuario_idusuario = $usuario_idusuario;
  }
    /**
     * Devuelve el valor correspondiente a hojaRuta_idhojaRuta
     * @return hojaRuta_idhojaRuta
     */
  public function getHojaRuta_idhojaRuta(){
      return $this->hojaRuta_idhojaRuta;
  }

    /**
     * Modifica el valor correspondiente a hojaRuta_idhojaRuta
     * @param hojaRuta_idhojaRuta
     */
  public function setHojaRuta_idhojaRuta($hojaRuta_idhojaRuta){
      $this->hojaRuta_idhojaRuta = $hojaRuta_idhojaRuta;
  }


}
//That`s all folks!