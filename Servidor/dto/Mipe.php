<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Todo lo que alguna vez amaste te rechazará o morirá.  \\


class Mipe {

  private $idmipe;
  private $decripcionMipe;
  private $fechaMipe;
  private $lote_idlote;

    /**
     * Constructor de Mipe
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a idmipe
     * @return idmipe
     */
  public function getIdmipe(){
      return $this->idmipe;
  }

    /**
     * Modifica el valor correspondiente a idmipe
     * @param idmipe
     */
  public function setIdmipe($idmipe){
      $this->idmipe = $idmipe;
  }
    /**
     * Devuelve el valor correspondiente a decripcionMipe
     * @return decripcionMipe
     */
  public function getDecripcionMipe(){
      return $this->decripcionMipe;
  }

    /**
     * Modifica el valor correspondiente a decripcionMipe
     * @param decripcionMipe
     */
  public function setDecripcionMipe($decripcionMipe){
      $this->decripcionMipe = $decripcionMipe;
  }
    /**
     * Devuelve el valor correspondiente a fechaMipe
     * @return fechaMipe
     */
  public function getFechaMipe(){
      return $this->fechaMipe;
  }

    /**
     * Modifica el valor correspondiente a fechaMipe
     * @param fechaMipe
     */
  public function setFechaMipe($fechaMipe){
      $this->fechaMipe = $fechaMipe;
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