<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ...y esta no es la única frase que encontrarás...  \\


class Metricabiologiasuelo {

  private $idmetricaBiologiaSuelo;
  private $descripcionMetricaBiologiaSuelo;
  private $biologiaSuelo_idbiologiaSuelo;

    /**
     * Constructor de Metricabiologiasuelo
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a idmetricaBiologiaSuelo
     * @return idmetricaBiologiaSuelo
     */
  public function getIdmetricaBiologiaSuelo(){
      return $this->idmetricaBiologiaSuelo;
  }

    /**
     * Modifica el valor correspondiente a idmetricaBiologiaSuelo
     * @param idmetricaBiologiaSuelo
     */
  public function setIdmetricaBiologiaSuelo($idmetricaBiologiaSuelo){
      $this->idmetricaBiologiaSuelo = $idmetricaBiologiaSuelo;
  }
    /**
     * Devuelve el valor correspondiente a descripcionMetricaBiologiaSuelo
     * @return descripcionMetricaBiologiaSuelo
     */
  public function getDescripcionMetricaBiologiaSuelo(){
      return $this->descripcionMetricaBiologiaSuelo;
  }

    /**
     * Modifica el valor correspondiente a descripcionMetricaBiologiaSuelo
     * @param descripcionMetricaBiologiaSuelo
     */
  public function setDescripcionMetricaBiologiaSuelo($descripcionMetricaBiologiaSuelo){
      $this->descripcionMetricaBiologiaSuelo = $descripcionMetricaBiologiaSuelo;
  }
    /**
     * Devuelve el valor correspondiente a biologiaSuelo_idbiologiaSuelo
     * @return biologiaSuelo_idbiologiaSuelo
     */
  public function getBiologiaSuelo_idbiologiaSuelo(){
      return $this->biologiaSuelo_idbiologiaSuelo;
  }

    /**
     * Modifica el valor correspondiente a biologiaSuelo_idbiologiaSuelo
     * @param biologiaSuelo_idbiologiaSuelo
     */
  public function setBiologiaSuelo_idbiologiaSuelo($biologiaSuelo_idbiologiaSuelo){
      $this->biologiaSuelo_idbiologiaSuelo = $biologiaSuelo_idbiologiaSuelo;
  }


}
//That`s all folks!