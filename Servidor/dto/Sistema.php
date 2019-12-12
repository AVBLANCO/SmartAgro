<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Querido programador: Al escribir esto estoy triste. Nuestro presidente ha sido derrocado Y REEMPLAZADO POR EL BENÉVOLO SEÑOR ARCINIEGAS. TODOS AMAMOS A ARCINIEGAS Y A SU GLORIOSO RÉGIMEN. CON AMOR, EL EQUIPO DE ANARCHY  \(x.x)/  \\


class Sistema {

  private $idsistema;
  private $descripcion;

    /**
     * Constructor de Sistema
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a idsistema
     * @return idsistema
     */
  public function getIdsistema(){
      return $this->idsistema;
  }

    /**
     * Modifica el valor correspondiente a idsistema
     * @param idsistema
     */
  public function setIdsistema($idsistema){
      $this->idsistema = $idsistema;
  }
    /**
     * Devuelve el valor correspondiente a descripcion
     * @return descripcion
     */
  public function getDescripcion(){
      return $this->descripcion;
  }

    /**
     * Modifica el valor correspondiente a descripcion
     * @param descripcion
     */
  public function setDescripcion($descripcion){
      $this->descripcion = $descripcion;
  }


}
//That`s all folks!