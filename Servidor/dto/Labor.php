<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¡Santos frameworks Batman!  \\


class Labor {

  private $idlabor;
  private $descripcionLabor;
  private $duracionLabor;
  private $miAgroempresa_idmiAgroempresa;

    /**
     * Constructor de Labor
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a idlabor
     * @return idlabor
     */
  public function getIdlabor(){
      return $this->idlabor;
  }

    /**
     * Modifica el valor correspondiente a idlabor
     * @param idlabor
     */
  public function setIdlabor($idlabor){
      $this->idlabor = $idlabor;
  }
    /**
     * Devuelve el valor correspondiente a descripcionLabor
     * @return descripcionLabor
     */
  public function getDescripcionLabor(){
      return $this->descripcionLabor;
  }

    /**
     * Modifica el valor correspondiente a descripcionLabor
     * @param descripcionLabor
     */
  public function setDescripcionLabor($descripcionLabor){
      $this->descripcionLabor = $descripcionLabor;
  }
    /**
     * Devuelve el valor correspondiente a duracionLabor
     * @return duracionLabor
     */
  public function getDuracionLabor(){
      return $this->duracionLabor;
  }

    /**
     * Modifica el valor correspondiente a duracionLabor
     * @param duracionLabor
     */
  public function setDuracionLabor($duracionLabor){
      $this->duracionLabor = $duracionLabor;
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