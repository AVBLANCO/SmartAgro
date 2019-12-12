<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Era más fácil crear un framework que aprender a usar uno existente  \\


class Meta {

  private $idmeta;
  private $descripcionMeta;
  private $valorMeta;
  private $proyeccion_idproyeccion;

    /**
     * Constructor de Meta
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a idmeta
     * @return idmeta
     */
  public function getIdmeta(){
      return $this->idmeta;
  }

    /**
     * Modifica el valor correspondiente a idmeta
     * @param idmeta
     */
  public function setIdmeta($idmeta){
      $this->idmeta = $idmeta;
  }
    /**
     * Devuelve el valor correspondiente a descripcionMeta
     * @return descripcionMeta
     */
  public function getDescripcionMeta(){
      return $this->descripcionMeta;
  }

    /**
     * Modifica el valor correspondiente a descripcionMeta
     * @param descripcionMeta
     */
  public function setDescripcionMeta($descripcionMeta){
      $this->descripcionMeta = $descripcionMeta;
  }
    /**
     * Devuelve el valor correspondiente a valorMeta
     * @return valorMeta
     */
  public function getValorMeta(){
      return $this->valorMeta;
  }

    /**
     * Modifica el valor correspondiente a valorMeta
     * @param valorMeta
     */
  public function setValorMeta($valorMeta){
      $this->valorMeta = $valorMeta;
  }
    /**
     * Devuelve el valor correspondiente a proyeccion_idproyeccion
     * @return proyeccion_idproyeccion
     */
  public function getProyeccion_idproyeccion(){
      return $this->proyeccion_idproyeccion;
  }

    /**
     * Modifica el valor correspondiente a proyeccion_idproyeccion
     * @param proyeccion_idproyeccion
     */
  public function setProyeccion_idproyeccion($proyeccion_idproyeccion){
      $this->proyeccion_idproyeccion = $proyeccion_idproyeccion;
  }


}
//That`s all folks!