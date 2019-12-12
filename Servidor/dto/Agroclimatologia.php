<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Cuantas frases como esta crees que puedo escribir?  \\


class Agroclimatologia {

  private $idagroclimatologia;
  private $descripcionAgroclimatologia;
  private $fechaAgroclimatologia;
  private $lote_idlote;

    /**
     * Constructor de Agroclimatologia
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a idagroclimatologia
     * @return idagroclimatologia
     */
  public function getIdagroclimatologia(){
      return $this->idagroclimatologia;
  }

    /**
     * Modifica el valor correspondiente a idagroclimatologia
     * @param idagroclimatologia
     */
  public function setIdagroclimatologia($idagroclimatologia){
      $this->idagroclimatologia = $idagroclimatologia;
  }
    /**
     * Devuelve el valor correspondiente a descripcionAgroclimatologia
     * @return descripcionAgroclimatologia
     */
  public function getDescripcionAgroclimatologia(){
      return $this->descripcionAgroclimatologia;
  }

    /**
     * Modifica el valor correspondiente a descripcionAgroclimatologia
     * @param descripcionAgroclimatologia
     */
  public function setDescripcionAgroclimatologia($descripcionAgroclimatologia){
      $this->descripcionAgroclimatologia = $descripcionAgroclimatologia;
  }
    /**
     * Devuelve el valor correspondiente a fechaAgroclimatologia
     * @return fechaAgroclimatologia
     */
  public function getFechaAgroclimatologia(){
      return $this->fechaAgroclimatologia;
  }

    /**
     * Modifica el valor correspondiente a fechaAgroclimatologia
     * @param fechaAgroclimatologia
     */
  public function setFechaAgroclimatologia($fechaAgroclimatologia){
      $this->fechaAgroclimatologia = $fechaAgroclimatologia;
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