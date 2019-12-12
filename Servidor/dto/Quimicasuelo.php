<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Yo a tu edad hacía calculadoras en visualBasic  \\


class Quimicasuelo {

  private $idQuimicaSuelo;
  private $descripcionQuimica;
  private $suelo_idsuelo;

    /**
     * Constructor de Quimicasuelo
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a idQuimicaSuelo
     * @return idQuimicaSuelo
     */
  public function getIdQuimicaSuelo(){
      return $this->idQuimicaSuelo;
  }

    /**
     * Modifica el valor correspondiente a idQuimicaSuelo
     * @param idQuimicaSuelo
     */
  public function setIdQuimicaSuelo($idQuimicaSuelo){
      $this->idQuimicaSuelo = $idQuimicaSuelo;
  }
    /**
     * Devuelve el valor correspondiente a descripcionQuimica
     * @return descripcionQuimica
     */
  public function getDescripcionQuimica(){
      return $this->descripcionQuimica;
  }

    /**
     * Modifica el valor correspondiente a descripcionQuimica
     * @param descripcionQuimica
     */
  public function setDescripcionQuimica($descripcionQuimica){
      $this->descripcionQuimica = $descripcionQuimica;
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