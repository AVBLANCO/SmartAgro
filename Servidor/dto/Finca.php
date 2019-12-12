<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Lolita, luz de mi vida, fuego de mis entrañas. Pecado mío, alma mía.  \\


class Finca {

  private $idfinca;
  private $descripcionFinca;

    /**
     * Constructor de Finca
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a idfinca
     * @return idfinca
     */
  public function getIdfinca(){
      return $this->idfinca;
  }

    /**
     * Modifica el valor correspondiente a idfinca
     * @param idfinca
     */
  public function setIdfinca($idfinca){
      $this->idfinca = $idfinca;
  }
    /**
     * Devuelve el valor correspondiente a descripcionFinca
     * @return descripcionFinca
     */
  public function getDescripcionFinca(){
      return $this->descripcionFinca;
  }

    /**
     * Modifica el valor correspondiente a descripcionFinca
     * @param descripcionFinca
     */
  public function setDescripcionFinca($descripcionFinca){
      $this->descripcionFinca = $descripcionFinca;
  }


}
//That`s all folks!