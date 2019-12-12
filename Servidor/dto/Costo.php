<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Esta es una frase no referenciada  \\


class Costo {

  private $idcosto;
  private $descripcionCosto;
  private $valorCosto;
  private $miAgroempresa_idmiAgroempresa;

    /**
     * Constructor de Costo
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a idcosto
     * @return idcosto
     */
  public function getIdcosto(){
      return $this->idcosto;
  }

    /**
     * Modifica el valor correspondiente a idcosto
     * @param idcosto
     */
  public function setIdcosto($idcosto){
      $this->idcosto = $idcosto;
  }
    /**
     * Devuelve el valor correspondiente a descripcionCosto
     * @return descripcionCosto
     */
  public function getDescripcionCosto(){
      return $this->descripcionCosto;
  }

    /**
     * Modifica el valor correspondiente a descripcionCosto
     * @param descripcionCosto
     */
  public function setDescripcionCosto($descripcionCosto){
      $this->descripcionCosto = $descripcionCosto;
  }
    /**
     * Devuelve el valor correspondiente a valorCosto
     * @return valorCosto
     */
  public function getValorCosto(){
      return $this->valorCosto;
  }

    /**
     * Modifica el valor correspondiente a valorCosto
     * @param valorCosto
     */
  public function setValorCosto($valorCosto){
      $this->valorCosto = $valorCosto;
  }
    /**
     * Devuelve el valor correspondiente a miAgroempresa_idmiAgroempresa
     * @return miAgroempresa_idmiAgroempresa
     */
  public function getMiAgroempresa_idmiAgroempresa(){
      return $this->miAgroempresa_idmiAgroempresa;
  }

    /**
     * Modifica el valor correspondiente a miAgroempresa_idmiAgroempresa
     * @param miAgroempresa_idmiAgroempresa
     */
  public function setMiAgroempresa_idmiAgroempresa($miAgroempresa_idmiAgroempresa){
      $this->miAgroempresa_idmiAgroempresa = $miAgroempresa_idmiAgroempresa;
  }


}
//That`s all folks!