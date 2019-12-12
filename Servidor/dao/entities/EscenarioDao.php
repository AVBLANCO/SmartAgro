<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Querido programador: Al escribir esto estoy triste. Nuestro presidente ha sido derrocado Y REEMPLAZADO POR EL BENÉVOLO SEÑOR ARCINIEGAS. TODOS AMAMOS A ARCINIEGAS Y A SU GLORIOSO RÉGIMEN. CON AMOR, EL EQUIPO DE ANARCHY  \(x.x)/  \\

include_once realpath('../dao/interfaz/IEscenarioDao.php');
include_once realpath('../dto/Escenario.php');
include_once realpath('../dto/Proyeccion.php');

class EscenarioDao implements IEscenarioDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Escenario en la base de datos.
     * @param escenario objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($escenario){
      $idescenario=$escenario->getIdescenario();
$descripcionEscenario=$escenario->getDescripcionEscenario();
$proyeccion_idproyeccion=$escenario->getProyeccion_idproyeccion()->getIdproyeccion();
$valorEscenario=$escenario->getValorEscenario();

      try {
          $sql= "INSERT INTO `escenario`( `idescenario`, `descripcionEscenario`, `proyeccion_idproyeccion`, `valorEscenario`)"
          ."VALUES ('$idescenario','$descripcionEscenario','$proyeccion_idproyeccion','$valorEscenario')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Escenario en la base de datos.
     * @param escenario objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($escenario){
      $idescenario=$escenario->getIdescenario();

      try {
          $sql= "SELECT `idescenario`, `descripcionEscenario`, `proyeccion_idproyeccion`, `valorEscenario`"
          ."FROM `escenario`"
          ."WHERE `idescenario`='$idescenario'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $escenario->setIdescenario($data[$i]['idescenario']);
          $escenario->setDescripcionEscenario($data[$i]['descripcionEscenario']);
           $proyeccion = new Proyeccion();
           $proyeccion->setIdproyeccion($data[$i]['proyeccion_idproyeccion']);
           $escenario->setProyeccion_idproyeccion($proyeccion);
          $escenario->setValorEscenario($data[$i]['valorEscenario']);

          }
      return $escenario;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Escenario en la base de datos.
     * @param escenario objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($escenario){
      $idescenario=$escenario->getIdescenario();
$descripcionEscenario=$escenario->getDescripcionEscenario();
$proyeccion_idproyeccion=$escenario->getProyeccion_idproyeccion()->getIdproyeccion();
$valorEscenario=$escenario->getValorEscenario();

      try {
          $sql= "UPDATE `escenario` SET`idescenario`='$idescenario' ,`descripcionEscenario`='$descripcionEscenario' ,`proyeccion_idproyeccion`='$proyeccion_idproyeccion' ,`valorEscenario`='$valorEscenario' WHERE `idescenario`='$idescenario' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Escenario en la base de datos.
     * @param escenario objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($escenario){
      $idescenario=$escenario->getIdescenario();

      try {
          $sql ="DELETE FROM `escenario` WHERE `idescenario`='$idescenario'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Escenario en la base de datos.
     * @return ArrayList<Escenario> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `idescenario`, `descripcionEscenario`, `proyeccion_idproyeccion`, `valorEscenario`"
          ."FROM `escenario`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $escenario= new Escenario();
          $escenario->setIdescenario($data[$i]['idescenario']);
          $escenario->setDescripcionEscenario($data[$i]['descripcionEscenario']);
           $proyeccion = new Proyeccion();
           $proyeccion->setIdproyeccion($data[$i]['proyeccion_idproyeccion']);
           $escenario->setProyeccion_idproyeccion($proyeccion);
          $escenario->setValorEscenario($data[$i]['valorEscenario']);

          array_push($lista,$escenario);
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