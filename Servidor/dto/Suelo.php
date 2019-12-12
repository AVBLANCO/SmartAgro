<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Yo <3 Cúcuta  \\


class Suelo {

  private $idsuelo;
  private $decripcionSuelo;
  private $fechaSuelo;
  private $lote_idlote;

    /**
     * Constructor de Suelo
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a idsuelo
     * @return idsuelo
     */
  public function getIdsuelo(){
      return $this->idsuelo;
  }

    /**
     * Modifica el valor correspondiente a idsuelo
     * @param idsuelo
     */
  public function setIdsuelo($idsuelo){
      $this->idsuelo = $idsuelo;
  }
    /**
     * Devuelve el valor correspondiente a decripcionSuelo
     * @return decripcionSuelo
     */
  public function getDecripcionSuelo(){
      return $this->decripcionSuelo;
  }

    /**
     * Modifica el valor correspondiente a decripcionSuelo
     * @param decripcionSuelo
     */
  public function setDecripcionSuelo($decripcionSuelo){
      $this->decripcionSuelo = $decripcionSuelo;
  }
    /**
     * Devuelve el valor correspondiente a fechaSuelo
     * @return fechaSuelo
     */
  public function getFechaSuelo(){
      return $this->fechaSuelo;
  }

    /**
     * Modifica el valor correspondiente a fechaSuelo
     * @param fechaSuelo
     */
  public function setFechaSuelo($fechaSuelo){
      $this->fechaSuelo = $fechaSuelo;
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