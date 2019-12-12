<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    -¡UNO! -¡¡ +4 !!  \\


class Balancehidrico {

  private $idbalanceHidrico;
  private $descripcioBalanceHidricocol;
  private $fechabalanceHidrico;
  private $agroclimatologia_idagroclimatologia;

    /**
     * Constructor de Balancehidrico
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a idbalanceHidrico
     * @return idbalanceHidrico
     */
  public function getIdbalanceHidrico(){
      return $this->idbalanceHidrico;
  }

    /**
     * Modifica el valor correspondiente a idbalanceHidrico
     * @param idbalanceHidrico
     */
  public function setIdbalanceHidrico($idbalanceHidrico){
      $this->idbalanceHidrico = $idbalanceHidrico;
  }
    /**
     * Devuelve el valor correspondiente a descripcioBalanceHidricocol
     * @return descripcioBalanceHidricocol
     */
  public function getDescripcioBalanceHidricocol(){
      return $this->descripcioBalanceHidricocol;
  }

    /**
     * Modifica el valor correspondiente a descripcioBalanceHidricocol
     * @param descripcioBalanceHidricocol
     */
  public function setDescripcioBalanceHidricocol($descripcioBalanceHidricocol){
      $this->descripcioBalanceHidricocol = $descripcioBalanceHidricocol;
  }
    /**
     * Devuelve el valor correspondiente a fechabalanceHidrico
     * @return fechabalanceHidrico
     */
  public function getFechabalanceHidrico(){
      return $this->fechabalanceHidrico;
  }

    /**
     * Modifica el valor correspondiente a fechabalanceHidrico
     * @param fechabalanceHidrico
     */
  public function setFechabalanceHidrico($fechabalanceHidrico){
      $this->fechabalanceHidrico = $fechabalanceHidrico;
  }
    /**
     * Devuelve el valor correspondiente a agroclimatologia_idagroclimatologia
     * @return agroclimatologia_idagroclimatologia
     */
  public function getAgroclimatologia_idagroclimatologia(){
      return $this->agroclimatologia_idagroclimatologia;
  }

    /**
     * Modifica el valor correspondiente a agroclimatologia_idagroclimatologia
     * @param agroclimatologia_idagroclimatologia
     */
  public function setAgroclimatologia_idagroclimatologia($agroclimatologia_idagroclimatologia){
      $this->agroclimatologia_idagroclimatologia = $agroclimatologia_idagroclimatologia;
  }


}
//That`s all folks!