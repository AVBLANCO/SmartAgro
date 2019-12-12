<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Únicamente cuando se pierde todo somos libres para actuar.  \\

include_once realpath('../dao/interfaz/ICostoDao.php');
include_once realpath('../dto/Costo.php');
include_once realpath('../dto/Miagroempresa.php');

class CostoDao implements ICostoDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Costo en la base de datos.
     * @param costo objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($costo){
      $idcosto=$costo->getIdcosto();
$descripcionCosto=$costo->getDescripcionCosto();
$valorCosto=$costo->getValorCosto();
$miAgroempresa_idmiAgroempresa=$costo->getMiAgroempresa_idmiAgroempresa()->getIdmiAgroempresa();

      try {
          $sql= "INSERT INTO `costo`( `idcosto`, `descripcionCosto`, `valorCosto`, `miAgroempresa_idmiAgroempresa`)"
          ."VALUES ('$idcosto','$descripcionCosto','$valorCosto','$miAgroempresa_idmiAgroempresa')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Costo en la base de datos.
     * @param costo objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($costo){
      $idcosto=$costo->getIdcosto();

      try {
          $sql= "SELECT `idcosto`, `descripcionCosto`, `valorCosto`, `miAgroempresa_idmiAgroempresa`"
          ."FROM `costo`"
          ."WHERE `idcosto`='$idcosto'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $costo->setIdcosto($data[$i]['idcosto']);
          $costo->setDescripcionCosto($data[$i]['descripcionCosto']);
          $costo->setValorCosto($data[$i]['valorCosto']);
           $miagroempresa = new Miagroempresa();
           $miagroempresa->setIdmiAgroempresa($data[$i]['miAgroempresa_idmiAgroempresa']);
           $costo->setMiAgroempresa_idmiAgroempresa($miagroempresa);

          }
      return $costo;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Costo en la base de datos.
     * @param costo objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($costo){
      $idcosto=$costo->getIdcosto();
$descripcionCosto=$costo->getDescripcionCosto();
$valorCosto=$costo->getValorCosto();
$miAgroempresa_idmiAgroempresa=$costo->getMiAgroempresa_idmiAgroempresa()->getIdmiAgroempresa();

      try {
          $sql= "UPDATE `costo` SET`idcosto`='$idcosto' ,`descripcionCosto`='$descripcionCosto' ,`valorCosto`='$valorCosto' ,`miAgroempresa_idmiAgroempresa`='$miAgroempresa_idmiAgroempresa' WHERE `idcosto`='$idcosto' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Costo en la base de datos.
     * @param costo objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($costo){
      $idcosto=$costo->getIdcosto();

      try {
          $sql ="DELETE FROM `costo` WHERE `idcosto`='$idcosto'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Costo en la base de datos.
     * @return ArrayList<Costo> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `idcosto`, `descripcionCosto`, `valorCosto`, `miAgroempresa_idmiAgroempresa`"
          ."FROM `costo`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $costo= new Costo();
          $costo->setIdcosto($data[$i]['idcosto']);
          $costo->setDescripcionCosto($data[$i]['descripcionCosto']);
          $costo->setValorCosto($data[$i]['valorCosto']);
           $miagroempresa = new Miagroempresa();
           $miagroempresa->setIdmiAgroempresa($data[$i]['miAgroempresa_idmiAgroempresa']);
           $costo->setMiAgroempresa_idmiAgroempresa($miagroempresa);

          array_push($lista,$costo);
          }
      return $lista;
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

      public function insertarConsulta($sql){
          $this->cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sentencia=$this->cn->prepare($sql);
          $sentencia->execute(); 
          $sentencia = null;
          return $this->cn->lastInsertId();
    }
      public function ejecutarConsulta($sql){
          $this->cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sentencia=$this->cn->prepare($sql);
          $sentencia->execute(); 
          $data = $sentencia->fetchAll();
          $sentencia = null;
          return $data;
    }
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close(){
      $cn=null;
  }
}
//That`s all folks!