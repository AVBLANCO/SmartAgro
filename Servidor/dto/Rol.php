<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Damos paso a la anarquía...  \\


class Rol {

  private $idrol;
  private $descripcion;
  private $usuario_idusuario;

    /**
     * Constructor de Rol
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a idrol
     * @return idrol
     */
  public function getIdrol(){
      return $this->idrol;
  }

    /**
     * Modifica el valor correspondiente a idrol
     * @param idrol
     */
  public function setIdrol($idrol){
      $this->idrol = $idrol;
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
    /**
     * Devuelve el valor correspondiente a usuario_idusuario
     * @return usuario_idusuario
     */
  public function getUsuario_idusuario(){
      return $this->usuario_idusuario;
  }

    /**
     * Modifica el valor correspondiente a usuario_idusuario
     * @param usuario_idusuario
     */
  public function setUsuario_idusuario($usuario_idusuario){
      $this->usuario_idusuario = $usuario_idusuario;
  }


}
//That`s all folks!