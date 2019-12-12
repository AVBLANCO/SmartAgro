<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Tranquilo, yo tampoco entiendo cómo funciona mi código  \\

include_once realpath('../dao/interfaz/ISistemaDao.php');
include_once realpath('../dto/Sistema.php');

class SistemaDao implements ISistemaDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Sistema en la base de datos.
     * @param sistema objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($sistema){
      $idsistema=$sistema->getIdsistema();
$descripcion=$sistema->getDescripcion();

      try {
          $sql= "INSERT INTO `sistema`( `idsistema`, `descripcion`)"
          ."VALUES ('$idsistema','$descripcion')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Sistema en la base de datos.
     * @param sistema objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($sistema){
      $idsistema=$sistema->getIdsistema();

      try {
          $sql= "SELECT `idsistema`, `descripcion`"
          ."FROM `sistema`"
          ."WHERE `idsistema`='$idsistema'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $sistema->setIdsistema($data[$i]['idsistema']);
          $sistema->setDescripcion($data[$i]['descripcion']);

          }
      return $sistema;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Sistema en la base de datos.
     * @param sistema objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($sistema){
      $idsistema=$sistema->getIdsistema();
$descripcion=$sistema->getDescripcion();

      try {
          $sql= "UPDATE `sistema` SET`idsistema`='$idsistema' ,`descripcion`='$descripcion' WHERE `idsistema`='$idsistema' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Sistema en la base de datos.
     * @param sistema objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($sistema){
      $idsistema=$sistema->getIdsistema();

      try {
          $sql ="DELETE FROM `sistema` WHERE `idsistema`='$idsistema'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Sistema en la base de datos.
     * @return ArrayList<Sistema> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `idsistema`, `descripcion`"
          ."FROM `sistema`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $sistema= new Sistema();
          $sistema->setIdsistema($data[$i]['idsistema']);
          $sistema->setDescripcion($data[$i]['descripcion']);

          array_push($lista,$sistema);
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