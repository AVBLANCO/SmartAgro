<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    La segunda regla de Anarchy es no hablar de Anarchy  \\


class Usuario {

  private $idusuario;
  private $nombreUsuario;
  private $passwordUsuario;
  private $persona_idpersona;
  private $finca_idfinca;

    /**
     * Constructor de Usuario
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a idusuario
     * @return idusuario
     */
  public function getIdusuario(){
      return $this->idusuario;
  }

    /**
     * Modifica el valor correspondiente a idusuario
     * @param idusuario
     */
  public function setIdusuario($idusuario){
      $this->idusuario = $idusuario;
  }
    /**
     * Devuelve el valor correspondiente a nombreUsuario
     * @return nombreUsuario
     */
  public function getNombreUsuario(){
      return $this->nombreUsuario;
  }

    /**
     * Modifica el valor correspondiente a nombreUsuario
     * @param nombreUsuario
     */
  public function setNombreUsuario($nombreUsuario){
      $this->nombreUsuario = $nombreUsuario;
  }
    /**
     * Devuelve el valor correspondiente a passwordUsuario
     * @return passwordUsuario
     */
  public function getPasswordUsuario(){
      return $this->passwordUsuario;
  }

    /**
     * Modifica el valor correspondiente a passwordUsuario
     * @param passwordUsuario
     */
  public function setPasswordUsuario($passwordUsuario){
      $this->passwordUsuario = $passwordUsuario;
  }
    /**
     * Devuelve el valor correspondiente a persona_idpersona
     * @return persona_idpersona
     */
  public function getPersona_idpersona(){
      return $this->persona_idpersona;
  }

    /**
     * Modifica el valor correspondiente a persona_idpersona
     * @param persona_idpersona
     */
  public function setPersona_idpersona($persona_idpersona){
      $this->persona_idpersona = $persona_idpersona;
  }
    /**
     * Devuelve el valor correspondiente a finca_idfinca
     * @return finca_idfinca
     */
  public function getFinca_idfinca(){
      return $this->finca_idfinca;
  }

    /**
     * Modifica el valor correspondiente a finca_idfinca
     * @param finca_idfinca
     */
  public function setFinca_idfinca($finca_idfinca){
      $this->finca_idfinca = $finca_idfinca;
  }


}
//That`s all folks!