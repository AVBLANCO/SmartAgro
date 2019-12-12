<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Sólo relájate y deja que alguien más lo haga  \\


class Escenario {

  private $idescenario;
  private $descripcionEscenario;
  private $proyeccion_idproyeccion;
  private $valorEscenario;

    /**
     * Constructor de Escenario
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a idescenario
     * @return idescenario
     */
  public function getIdescenario(){
      return $this->idescenario;
  }

    /**
     * Modifica el valor correspondiente a idescenario
     * @param idescenario
     */
  public function setIdescenario($idescenario){
      $this->idescenario = $idescenario;
  }
    /**
     * Devuelve el valor correspondiente a descripcionEscenario
     * @return descripcionEscenario
     */
  public function getDescripcionEscenario(){
      return $this->descripcionEscenario;
  }

    /**
     * Modifica el valor correspondiente a descripcionEscenario
     * @param descripcionEscenario
     */
  public function setDescripcionEscenario($descripcionEscenario){
      $this->descripcionEscenario = $descripcionEscenario;
  }
    /**
     * Devuelve el valor correspondiente a proyeccion_idproyeccion
     * @return proyeccion_idproyeccion
     */
  public function getProyeccion_idproyeccion(){
      return $this->proyeccion_idproyeccion;
  }

    /**
     * Modifica el valor correspondiente a proyeccion_idproyeccion
     * @param proyeccion_idproyeccion
     */
  public function setProyeccion_idproyeccion($proyeccion_idproyeccion){
      $this->proyeccion_idproyeccion = $proyeccion_idproyeccion;
  }
    /**
     * Devuelve el valor correspondiente a valorEscenario
     * @return valorEscenario
     */
  public function getValorEscenario(){
      return $this->valorEscenario;
  }

    /**
     * Modifica el valor correspondiente a valorEscenario
     * @param valorEscenario
     */
  public function setValorEscenario($valorEscenario){
      $this->valorEscenario = $valorEscenario;
  }


}
//That`s all folks!