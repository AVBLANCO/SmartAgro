<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ...Y como plato principal: ¡Código espagueti!  \\


class Manejointegradoplagas {

  private $idmanejoIntegradoPlagas;
  private $descricionManejoIntegradoPlagas;
  private $mipe_idmipe;

    /**
     * Constructor de Manejointegradoplagas
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a idmanejoIntegradoPlagas
     * @return idmanejoIntegradoPlagas
     */
  public function getIdmanejoIntegradoPlagas(){
      return $this->idmanejoIntegradoPlagas;
  }

    /**
     * Modifica el valor correspondiente a idmanejoIntegradoPlagas
     * @param idmanejoIntegradoPlagas
     */
  public function setIdmanejoIntegradoPlagas($idmanejoIntegradoPlagas){
      $this->idmanejoIntegradoPlagas = $idmanejoIntegradoPlagas;
  }
    /**
     * Devuelve el valor correspondiente a descricionManejoIntegradoPlagas
     * @return descricionManejoIntegradoPlagas
     */
  public function getDescricionManejoIntegradoPlagas(){
      return $this->descricionManejoIntegradoPlagas;
  }

    /**
     * Modifica el valor correspondiente a descricionManejoIntegradoPlagas
     * @param descricionManejoIntegradoPlagas
     */
  public function setDescricionManejoIntegradoPlagas($descricionManejoIntegradoPlagas){
      $this->descricionManejoIntegradoPlagas = $descricionManejoIntegradoPlagas;
  }
    /**
     * Devuelve el valor correspondiente a mipe_idmipe
     * @return mipe_idmipe
     */
  public function getMipe_idmipe(){
      return $this->mipe_idmipe;
  }

    /**
     * Modifica el valor correspondiente a mipe_idmipe
     * @param mipe_idmipe
     */
  public function setMipe_idmipe($mipe_idmipe){
      $this->mipe_idmipe = $mipe_idmipe;
  }


}
//That`s all folks!