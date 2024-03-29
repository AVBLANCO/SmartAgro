<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¡¡Bienvenido al mundo del mañana!!  \\

include_once realpath('../dao/interfaz/IFincaDao.php');
include_once realpath('../dto/Finca.php');

class FincaDao implements IFincaDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Finca en la base de datos.
     * @param finca objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($finca){
      $idfinca=$finca->getIdfinca();
$descripcionFinca=$finca->getDescripcionFinca();

      try {
          $sql= "INSERT INTO `finca`( `idfinca`, `descripcionFinca`)"
          ."VALUES ('$idfinca','$descripcionFinca')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Finca en la base de datos.
     * @param finca objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($finca){
      $idfinca=$finca->getIdfinca();

      try {
          $sql= "SELECT `idfinca`, `descripcionFinca`"
          ."FROM `finca`"
          ."WHERE `idfinca`='$idfinca'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $finca->setIdfinca($data[$i]['idfinca']);
          $finca->setDescripcionFinca($data[$i]['descripcionFinca']);

          }
      return $finca;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Finca en la base de datos.
     * @param finca objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($finca){
      $idfinca=$finca->getIdfinca();
$descripcionFinca=$finca->getDescripcionFinca();

      try {
          $sql= "UPDATE `finca` SET`idfinca`='$idfinca' ,`descripcionFinca`='$descripcionFinca' WHERE `idfinca`='$idfinca' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Finca en la base de datos.
     * @param finca objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($finca){
      $idfinca=$finca->getIdfinca();

      try {
          $sql ="DELETE FROM `finca` WHERE `idfinca`='$idfinca'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Finca en la base de datos.
     * @return ArrayList<Finca> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `idfinca`, `descripcionFinca`"
          ."FROM `finca`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $finca= new Finca();
          $finca->setIdfinca($data[$i]['idfinca']);
          $finca->setDescripcionFinca($data[$i]['descripcionFinca']);

          array_push($lista,$finca);
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