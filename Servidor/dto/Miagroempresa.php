<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Traigo una pizza para ¿y se la creyó?  \\


class Miagroempresa {

  private $idmiAgroempresa;
  private $descipcionMiAgroempresa;
  private $lote_idlote;

    /**
     * Constructor de Miagroempresa
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a idmiAgroempresa
     * @return idmiAgroempresa
     */
  public function getIdmiAgroempresa(){
      return $this->idmiAgroempresa;
  }

    /**
     * Modifica el valor correspondiente a idmiAgroempresa
     * @param idmiAgroempresa
     */
  public function setIdmiAgroempresa($idmiAgroempresa){
      $this->idmiAgroempresa = $idmiAgroempresa;
  }
    /**
     * Devuelve el valor correspondiente a descipcionMiAgroempresa
     * @return descipcionMiAgroempresa
     */
  public function getDescipcionMiAgroempresa(){
      return $this->descipcionMiAgroempresa;
  }

    /**
     * Modifica el valor correspondiente a descipcionMiAgroempresa
     * @param descipcionMiAgroempresa
     */
  public function setDescipcionMiAgroempresa($descipcionMiAgroempresa){
      $this->descipcionMiAgroempresa = $descipcionMiAgroempresa;
  }
    /**
     * Devuelve el valor correspondiente a lote_idlote
     * @return lote_idlote
     */
  public function getLote_idlote(){
      return $this->lote_idlote;
  }

    /**
     * Modifica el valor correspondiente a lote_idlote
     * @param lote_idlote
     */
  public function setLote_idlote($lote_idlote){
      $this->lote_idlote = $lote_idlote;
  }


}
//That`s all folks!