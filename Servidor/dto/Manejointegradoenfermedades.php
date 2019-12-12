<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ...y esta no es la única frase que encontrarás...  \\


class Manejointegradoenfermedades {

  private $idmanejoIntegradoEnfermedades;
  private $descripcioManejoIntegradoEnfermedades;
  private $mipe_idmipe;

    /**
     * Constructor de Manejointegradoenfermedades
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a idmanejoIntegradoEnfermedades
     * @return idmanejoIntegradoEnfermedades
     */
  public function getIdmanejoIntegradoEnfermedades(){
      return $this->idmanejoIntegradoEnfermedades;
  }

    /**
     * Modifica el valor correspondiente a idmanejoIntegradoEnfermedades
     * @param idmanejoIntegradoEnfermedades
     */
  public function setIdmanejoIntegradoEnfermedades($idmanejoIntegradoEnfermedades){
      $this->idmanejoIntegradoEnfermedades = $idmanejoIntegradoEnfermedades;
  }
    /**
     * Devuelve el valor correspondiente a descripcioManejoIntegradoEnfermedades
     * @return descripcioManejoIntegradoEnfermedades
     */
  public function getDescripcioManejoIntegradoEnfermedades(){
      return $this->descripcioManejoIntegradoEnfermedades;
  }

    /**
     * Modifica el valor correspondiente a descripcioManejoIntegradoEnfermedades
     * @param descripcioManejoIntegradoEnfermedades
     */
  public function setDescripcioManejoIntegradoEnfermedades($descripcioManejoIntegradoEnfermedades){
      $this->descripcioManejoIntegradoEnfermedades = $descripcioManejoIntegradoEnfermedades;
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