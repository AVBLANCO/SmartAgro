<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Si mi madre entendiera mi código, estaría orgullosa  \\

include_once realpath('../dao/interfaz/IMetricaevotranspiracionDao.php');
include_once realpath('../dto/Metricaevotranspiracion.php');
include_once realpath('../dto/Evotranspiracion.php');

class MetricaevotranspiracionDao implements IMetricaevotranspiracionDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Metricaevotranspiracion en la base de datos.
     * @param metricaevotranspiracion objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($metricaevotranspiracion){
      $idmetricaEvotranspiracion=$metricaevotranspiracion->getIdmetricaEvotranspiracion();
$descripcionMetricaEvotranspiracion=$metricaevotranspiracion->getDescripcionMetricaEvotranspiracion();
$evotranspiracion_idevotranspiracion=$metricaevotranspiracion->getEvotranspiracion_idevotranspiracion()->getIdevotranspiracion();

      try {
          $sql= "INSERT INTO `metricaevotranspiracion`( `idmetricaEvotranspiracion`, `descripcionMetricaEvotranspiracion`, `evotranspiracion_idevotranspiracion`)"
          ."VALUES ('$idmetricaEvotranspiracion','$descripcionMetricaEvotranspiracion','$evotranspiracion_idevotranspiracion')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Metricaevotranspiracion en la base de datos.
     * @param metricaevotranspiracion objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($metricaevotranspiracion){
      $idmetricaEvotranspiracion=$metricaevotranspiracion->getIdmetricaEvotranspiracion();

      try {
          $sql= "SELECT `idmetricaEvotranspiracion`, `descripcionMetricaEvotranspiracion`, `evotranspiracion_idevotranspiracion`"
          ."FROM `metricaevotranspiracion`"
          ."WHERE `idmetricaEvotranspiracion`='$idmetricaEvotranspiracion'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $metricaevotranspiracion->setIdmetricaEvotranspiracion($data[$i]['idmetricaEvotranspiracion']);
          $metricaevotranspiracion->setDescripcionMetricaEvotranspiracion($data[$i]['descripcionMetricaEvotranspiracion']);
           $evotranspiracion = new Evotranspiracion();
           $evotranspiracion->setIdevotranspiracion($data[$i]['evotranspiracion_idevotranspiracion']);
           $metricaevotranspiracion->setEvotranspiracion_idevotranspiracion($evotranspiracion);

          }
      return $metricaevotranspiracion;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Metricaevotranspiracion en la base de datos.
     * @param metricaevotranspiracion objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($metricaevotranspiracion){
      $idmetricaEvotranspiracion=$metricaevotranspiracion->getIdmetricaEvotranspiracion();
$descripcionMetricaEvotranspiracion=$metricaevotranspiracion->getDescripcionMetricaEvotranspiracion();
$evotranspiracion_idevotranspiracion=$metricaevotranspiracion->getEvotranspiracion_idevotranspiracion()->getIdevotranspiracion();

      try {
          $sql= "UPDATE `metricaevotranspiracion` SET`idmetricaEvotranspiracion`='$idmetricaEvotranspiracion' ,`descripcionMetricaEvotranspiracion`='$descripcionMetricaEvotranspiracion' ,`evotranspiracion_idevotranspiracion`='$evotranspiracion_idevotranspiracion' WHERE `idmetricaEvotranspiracion`='$idmetricaEvotranspiracion' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Metricaevotranspiracion en la base de datos.
     * @param metricaevotranspiracion objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($metricaevotranspiracion){
      $idmetricaEvotranspiracion=$metricaevotranspiracion->getIdmetricaEvotranspiracion();

      try {
          $sql ="DELETE FROM `metricaevotranspiracion` WHERE `idmetricaEvotranspiracion`='$idmetricaEvotranspiracion'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Metricaevotranspiracion en la base de datos.
     * @return ArrayList<Metricaevotranspiracion> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `idmetricaEvotranspiracion`, `descripcionMetricaEvotranspiracion`, `evotranspiracion_idevotranspiracion`"
          ."FROM `metricaevotranspiracion`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $metricaevotranspiracion= new Metricaevotranspiracion();
          $metricaevotranspiracion->setIdmetricaEvotranspiracion($data[$i]['idmetricaEvotranspiracion']);
          $metricaevotranspiracion->setDescripcionMetricaEvotranspiracion($data[$i]['descripcionMetricaEvotranspiracion']);
           $evotranspiracion = new Evotranspiracion();
           $evotranspiracion->setIdevotranspiracion($data[$i]['evotranspiracion_idevotranspiracion']);
           $metricaevotranspiracion->setEvotranspiracion_idevotranspiracion($evotranspiracion);

          array_push($lista,$metricaevotranspiracion);
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