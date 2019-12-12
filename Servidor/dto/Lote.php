<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Cuenta la leyenda que si gritas 'Soy programador' las nenas caerán a tus pies  \\


class Lote {

  private $idlote;
  private $descripcionLote;
  private $longitud;
  private $latitud;
  private $finca_idfinca;

    /**
     * Constructor de Lote
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a idlote
     * @return idlote
     */
  public function getIdlote(){
      return $this->idlote;
  }

    /**
     * Modifica el valor correspondiente a idlote
     * @param idlote
     */
  public function setIdlote($idlote){
      $this->idlote = $idlote;
  }
    /**
     * Devuelve el valor correspondiente a descripcionLote
     * @return descripcionLote
     */
  public function getDescripcionLote(){
      return $this->descripcionLote;
  }

    /**
     * Modifica el valor correspondiente a descripcionLote
     * @param descripcionLote
     */
  public function setDescripcionLote($descripcionLote){
      $this->descripcionLote = $descripcionLote;
  }
    /**
     * Devuelve el valor correspondiente a longitud
     * @return longitud
     */
  public function getLongitud(){
      return $this->longitud;
  }

    /**
     * Modifica el valor correspondiente a longitud
     * @param longitud
     */
  public function setLongitud($longitud){
      $this->longitud = $longitud;
  }
    /**
     * Devuelve el valor correspondiente a latitud
     * @return latitud
     */
  public function getLatitud(){
      return $this->latitud;
  }

    /**
     * Modifica el valor correspondiente a latitud
     * @param latitud
     */
  public function setLatitud($latitud){
      $this->latitud = $latitud;
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