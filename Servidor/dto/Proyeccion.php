<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Podrías agradecernos con unos cuantos billetes _/(n.n)\_  \\


class Proyeccion {

  private $idproyeccion;
  private $descripcionProyeccion;
  private $fechaProyeccion;
  private $lote_idlote;

    /**
     * Constructor de Proyeccion
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a idproyeccion
     * @return idproyeccion
     */
  public function getIdproyeccion(){
      return $this->idproyeccion;
  }

    /**
     * Modifica el valor correspondiente a idproyeccion
     * @param idproyeccion
     */
  public function setIdproyeccion($idproyeccion){
      $this->idproyeccion = $idproyeccion;
  }
    /**
     * Devuelve el valor correspondiente a descripcionProyeccion
     * @return descripcionProyeccion
     */
  public function getDescripcionProyeccion(){
      return $this->descripcionProyeccion;
  }

    /**
     * Modifica el valor correspondiente a descripcionProyeccion
     * @param descripcionProyeccion
     */
  public function setDescripcionProyeccion($descripcionProyeccion){
      $this->descripcionProyeccion = $descripcionProyeccion;
  }
    /**
     * Devuelve el valor correspondiente a fechaProyeccion
     * @return fechaProyeccion
     */
  public function getFechaProyeccion(){
      return $this->fechaProyeccion;
  }

    /**
     * Modifica el valor correspondiente a fechaProyeccion
     * @param fechaProyeccion
     */
  public function setFechaProyeccion($fechaProyeccion){
      $this->fechaProyeccion = $fechaProyeccion;
  }
    /**
     * Devuelve el valor correspondiente a lote_idlote
     * @return lote_idlote
     */
  public function getLote_idlote(){
      return $this->lote_idlote;
  }

    /**
     * Modifica el valor correspondiente a lote_idlote
     * @param lote_idlote
     */
  public function setLote_idlote($lote_idlote){
      $this->lote_idlote = $lote_idlote;
  }


}
//That`s all folks!