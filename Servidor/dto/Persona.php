<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Nada mejor que el código hecho a mano.  \\


class Persona {

  private $idpersona;
  private $nombrePersona;
  private $cedulaPersona;
  private $correoPersona;
  private $fechaNacimientoPersona;
  private $genero;

    /**
     * Constructor de Persona
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a idpersona
     * @return idpersona
     */
  public function getIdpersona(){
      return $this->idpersona;
  }

    /**
     * Modifica el valor correspondiente a idpersona
     * @param idpersona
     */
  public function setIdpersona($idpersona){
      $this->idpersona = $idpersona;
  }
    /**
     * Devuelve el valor correspondiente a nombrePersona
     * @return nombrePersona
     */
  public function getNombrePersona(){
      return $this->nombrePersona;
  }

    /**
     * Modifica el valor correspondiente a nombrePersona
     * @param nombrePersona
     */
  public function setNombrePersona($nombrePersona){
      $this->nombrePersona = $nombrePersona;
  }
    /**
     * Devuelve el valor correspondiente a cedulaPersona
     * @return cedulaPersona
     */
  public function getCedulaPersona(){
      return $this->cedulaPersona;
  }

    /**
     * Modifica el valor correspondiente a cedulaPersona
     * @param cedulaPersona
     */
  public function setCedulaPersona($cedulaPersona){
      $this->cedulaPersona = $cedulaPersona;
  }
    /**
     * Devuelve el valor correspondiente a correoPersona
     * @return correoPersona
     */
  public function getCorreoPersona(){
      return $this->correoPersona;
  }

    /**
     * Modifica el valor correspondiente a correoPersona
     * @param correoPersona
     */
  public function setCorreoPersona($correoPersona){
      $this->correoPersona = $correoPersona;
  }
    /**
     * Devuelve el valor correspondiente a fechaNacimientoPersona
     * @return fechaNacimientoPersona
     */
  public function getFechaNacimientoPersona(){
      return $this->fechaNacimientoPersona;
  }

    /**
     * Modifica el valor correspondiente a fechaNacimientoPersona
     * @param fechaNacimientoPersona
     */
  public function setFechaNacimientoPersona($fechaNacimientoPersona){
      $this->fechaNacimientoPersona = $fechaNacimientoPersona;
  }
    /**
     * Devuelve el valor correspondiente a genero
     * @return genero
     */
  public function getGenero(){
      return $this->genero;
  }

    /**
     * Modifica el valor correspondiente a genero
     * @param genero
     */
  public function setGenero($genero){
      $this->genero = $genero;
  }


}
//That`s all folks!