<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Caminante no hay camino, se hace camino al andar  \\


class Historico {

  private $idhistorico;
  private $descripcionHistorico;
  private $miAgroempresa_idmiAgroempresa;
  private $valorHistorico;

    /**
     * Constructor de Historico
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a idhistorico
     * @return idhistorico
     */
  public function getIdhistorico(){
      return $this->idhistorico;
  }

    /**
     * Modifica el valor correspondiente a idhistorico
     * @param idhistorico
     */
  public function setIdhistorico($idhistorico){
      $this->idhistorico = $idhistorico;
  }
    /**
     * Devuelve el valor correspondiente a descripcionHistorico
     * @return descripcionHistorico
     */
  public function getDescripcionHistorico(){
      return $this->descripcionHistorico;
  }

    /**
     * Modifica el valor correspondiente a descripcionHistorico
     * @param descripcionHistorico
     */
  public function setDescripcionHistorico($descripcionHistorico){
      $this->descripcionHistorico = $descripcionHistorico;
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
    /**
     * Devuelve el valor correspondiente a valorHistorico
     * @return valorHistorico
     */
  public function getValorHistorico(){
      return $this->valorHistorico;
  }

    /**
     * Modifica el valor correspondiente a valorHistorico
     * @param valorHistorico
     */
  public function setValorHistorico($valorHistorico){
      $this->valorHistorico = $valorHistorico;
  }


}
//That`s all folks!