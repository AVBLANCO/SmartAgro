<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    La noche está estrellada, y tiritan, azules, los astros, a lo lejos  \\


class Conversionenergetica {

  private $idconversionEnergetica;
  private $descripcionConversionEnergetica;
  private $fechaConversionEnergetica;
  private $agroclimatologia_idagroclimatologia;

    /**
     * Constructor de Conversionenergetica
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a idconversionEnergetica
     * @return idconversionEnergetica
     */
  public function getIdconversionEnergetica(){
      return $this->idconversionEnergetica;
  }

    /**
     * Modifica el valor correspondiente a idconversionEnergetica
     * @param idconversionEnergetica
     */
  public function setIdconversionEnergetica($idconversionEnergetica){
      $this->idconversionEnergetica = $idconversionEnergetica;
  }
    /**
     * Devuelve el valor correspondiente a descripcionConversionEnergetica
     * @return descripcionConversionEnergetica
     */
  public function getDescripcionConversionEnergetica(){
      return $this->descripcionConversionEnergetica;
  }

    /**
     * Modifica el valor correspondiente a descripcionConversionEnergetica
     * @param descripcionConversionEnergetica
     */
  public function setDescripcionConversionEnergetica($descripcionConversionEnergetica){
      $this->descripcionConversionEnergetica = $descripcionConversionEnergetica;
  }
    /**
     * Devuelve el valor correspondiente a fechaConversionEnergetica
     * @return fechaConversionEnergetica
     */
  public function getFechaConversionEnergetica(){
      return $this->fechaConversionEnergetica;
  }

    /**
     * Modifica el valor correspondiente a fechaConversionEnergetica
     * @param fechaConversionEnergetica
     */
  public function setFechaConversionEnergetica($fechaConversionEnergetica){
      $this->fechaConversionEnergetica = $fechaConversionEnergetica;
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