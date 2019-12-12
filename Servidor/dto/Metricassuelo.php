<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Ya están los patrones implementados, ahora sí viene lo chido...  \\


class Metricassuelo {

  private $idmetricasSuelo;
  private $descripcioMetricasSuelo;
  private $fisicaSuelo_idfisicaSuelo;

    /**
     * Constructor de Metricassuelo
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a idmetricasSuelo
     * @return idmetricasSuelo
     */
  public function getIdmetricasSuelo(){
      return $this->idmetricasSuelo;
  }

    /**
     * Modifica el valor correspondiente a idmetricasSuelo
     * @param idmetricasSuelo
     */
  public function setIdmetricasSuelo($idmetricasSuelo){
      $this->idmetricasSuelo = $idmetricasSuelo;
  }
    /**
     * Devuelve el valor correspondiente a descripcioMetricasSuelo
     * @return descripcioMetricasSuelo
     */
  public function getDescripcioMetricasSuelo(){
      return $this->descripcioMetricasSuelo;
  }

    /**
     * Modifica el valor correspondiente a descripcioMetricasSuelo
     * @param descripcioMetricasSuelo
     */
  public function setDescripcioMetricasSuelo($descripcioMetricasSuelo){
      $this->descripcioMetricasSuelo = $descripcioMetricasSuelo;
  }
    /**
     * Devuelve el valor correspondiente a fisicaSuelo_idfisicaSuelo
     * @return fisicaSuelo_idfisicaSuelo
     */
  public function getFisicaSuelo_idfisicaSuelo(){
      return $this->fisicaSuelo_idfisicaSuelo;
  }

    /**
     * Modifica el valor correspondiente a fisicaSuelo_idfisicaSuelo
     * @param fisicaSuelo_idfisicaSuelo
     */
  public function setFisicaSuelo_idfisicaSuelo($fisicaSuelo_idfisicaSuelo){
      $this->fisicaSuelo_idfisicaSuelo = $fisicaSuelo_idfisicaSuelo;
  }


}
//That`s all folks!