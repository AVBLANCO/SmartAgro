<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Ella existió sólo en un sueño. Él es un poema que el poeta nunca escribió.  \\


class Hojaruta {

  private $idhojaRuta;
  private $fechaHojaRuta;
  private $costo_idcosto;

    /**
     * Constructor de Hojaruta
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a idhojaRuta
     * @return idhojaRuta
     */
  public function getIdhojaRuta(){
      return $this->idhojaRuta;
  }

    /**
     * Modifica el valor correspondiente a idhojaRuta
     * @param idhojaRuta
     */
  public function setIdhojaRuta($idhojaRuta){
      $this->idhojaRuta = $idhojaRuta;
  }
    /**
     * Devuelve el valor correspondiente a fechaHojaRuta
     * @return fechaHojaRuta
     */
  public function getFechaHojaRuta(){
      return $this->fechaHojaRuta;
  }

    /**
     * Modifica el valor correspondiente a fechaHojaRuta
     * @param fechaHojaRuta
     */
  public function setFechaHojaRuta($fechaHojaRuta){
      $this->fechaHojaRuta = $fechaHojaRuta;
  }
    /**
     * Devuelve el valor correspondiente a costo_idcosto
     * @return costo_idcosto
     */
  public function getCosto_idcosto(){
      return $this->costo_idcosto;
  }

    /**
     * Modifica el valor correspondiente a costo_idcosto
     * @param costo_idcosto
     */
  public function setCosto_idcosto($costo_idcosto){
      $this->costo_idcosto = $costo_idcosto;
  }


}
//That`s all folks!