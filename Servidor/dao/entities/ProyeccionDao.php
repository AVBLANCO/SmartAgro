<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Te veeeeeooooo  \\

include_once realpath('../dao/interfaz/IProyeccionDao.php');
include_once realpath('../dto/Proyeccion.php');
include_once realpath('../dto/Lote.php');

class ProyeccionDao implements IProyeccionDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Proyeccion en la base de datos.
     * @param proyeccion objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($proyeccion){
      $idproyeccion=$proyeccion->getIdproyeccion();
$descripcionProyeccion=$proyeccion->getDescripcionProyeccion();
$fechaProyeccion=$proyeccion->getFechaProyeccion();
$lote_idlote=$proyeccion->getLote_idlote()->getIdlote();

      try {
          $sql= "INSERT INTO `proyeccion`( `idproyeccion`, `descripcionProyeccion`, `fechaProyeccion`, `lote_idlote`)"
          ."VALUES ('$idproyeccion','$descripcionProyeccion','$fechaProyeccion','$lote_idlote')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Proyeccion en la base de datos.
     * @param proyeccion objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($proyeccion){
      $idproyeccion=$proyeccion->getIdproyeccion();

      try {
          $sql= "SELECT `idproyeccion`, `descripcionProyeccion`, `fechaProyeccion`, `lote_idlote`"
          ."FROM `proyeccion`"
          ."WHERE `idproyeccion`='$idproyeccion'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $proyeccion->setIdproyeccion($data[$i]['idproyeccion']);
          $proyeccion->setDescripcionProyeccion($data[$i]['descripcionProyeccion']);
          $proyeccion->setFechaProyeccion($data[$i]['fechaProyeccion']);
           $lote = new Lote();
           $lote->setIdlote($data[$i]['lote_idlote']);
           $proyeccion->setLote_idlote($lote);

          }
      return $proyeccion;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Proyeccion en la base de datos.
     * @param proyeccion objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($proyeccion){
      $idproyeccion=$proyeccion->getIdproyeccion();
$descripcionProyeccion=$proyeccion->getDescripcionProyeccion();
$fechaProyeccion=$proyeccion->getFechaProyeccion();
$lote_idlote=$proyeccion->getLote_idlote()->getIdlote();

      try {
          $sql= "UPDATE `proyeccion` SET`idproyeccion`='$idproyeccion' ,`descripcionProyeccion`='$descripcionProyeccion' ,`fechaProyeccion`='$fechaProyeccion' ,`lote_idlote`='$lote_idlote' WHERE `idproyeccion`='$idproyeccion' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Proyeccion en la base de datos.
     * @param proyeccion objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($proyeccion){
      $idproyeccion=$proyeccion->getIdproyeccion();

      try {
          $sql ="DELETE FROM `proyeccion` WHERE `idproyeccion`='$idproyeccion'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Proyeccion en la base de datos.
     * @return ArrayList<Proyeccion> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `idproyeccion`, `descripcionProyeccion`, `fechaProyeccion`, `lote_idlote`"
          ."FROM `proyeccion`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $proyeccion= new Proyeccion();
          $proyeccion->setIdproyeccion($data[$i]['idproyeccion']);
          $proyeccion->setDescripcionProyeccion($data[$i]['descripcionProyeccion']);
          $proyeccion->setFechaProyeccion($data[$i]['fechaProyeccion']);
           $lote = new Lote();
           $lote->setIdlote($data[$i]['lote_idlote']);
           $proyeccion->setLote_idlote($lote);

          array_push($lista,$proyeccion);
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