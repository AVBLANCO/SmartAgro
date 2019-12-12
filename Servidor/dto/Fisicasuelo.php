<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Hecho en sólo 6 días  \\


class Fisicasuelo {

  private $idfisicaSuelo;
  private $decscricionfisicaSuelo;
  private $suelo_idsuelo;

    /**
     * Constructor de Fisicasuelo
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a idfisicaSuelo
     * @return idfisicaSuelo
     */
  public function getIdfisicaSuelo(){
      return $this->idfisicaSuelo;
  }

    /**
     * Modifica el valor correspondiente a idfisicaSuelo
     * @param idfisicaSuelo
     */
  public function setIdfisicaSuelo($idfisicaSuelo){
      $this->idfisicaSuelo = $idfisicaSuelo;
  }
    /**
     * Devuelve el valor correspondiente a decscricionfisicaSuelo
     * @return decscricionfisicaSuelo
     */
  public function getDecscricionfisicaSuelo(){
      return $this->decscricionfisicaSuelo;
  }

    /**
     * Modifica el valor correspondiente a decscricionfisicaSuelo
     * @param decscricionfisicaSuelo
     */
  public function setDecscricionfisicaSuelo($decscricionfisicaSuelo){
      $this->decscricionfisicaSuelo = $decscricionfisicaSuelo;
  }
    /**
     * Devuelve el valor correspondiente a suelo_idsuelo
     * @return suelo_idsuelo
     */
  public function getSuelo_idsuelo(){
      return $this->suelo_idsuelo;
  }

    /**
     * Modifica el valor correspondiente a suelo_idsuelo
     * @param suelo_idsuelo
     */
  public function setSuelo_idsuelo($suelo_idsuelo){
      $this->suelo_idsuelo = $suelo_idsuelo;
  }


}
//That`s all folks!