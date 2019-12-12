<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Ahora con 25% menos groserías  \\

include_once realpath('../dao/interfaz/ILecturaevotranspiracionDao.php');
include_once realpath('../dto/Lecturaevotranspiracion.php');
include_once realpath('../dto/Metricaevotranspiracion.php');

class LecturaevotranspiracionDao implements ILecturaevotranspiracionDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Lecturaevotranspiracion en la base de datos.
     * @param lecturaevotranspiracion objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($lecturaevotranspiracion){
      $idlecturaEvotranspiracion=$lecturaevotranspiracion->getIdlecturaEvotranspiracion();
$fechaLecturaEvotranspiracion=$lecturaevotranspiracion->getFechaLecturaEvotranspiracion();
$valorLecturaEvotranspiracion=$lecturaevotranspiracion->getValorLecturaEvotranspiracion();
$metricaEvotranspiracion_idmetricaEvotranspiracion=$lecturaevotranspiracion->getMetricaEvotranspiracion_idmetricaEvotranspiracion()->getIdmetricaEvotranspiracion();

      try {
          $sql= "INSERT INTO `lecturaevotranspiracion`( `idlecturaEvotranspiracion`, `fechaLecturaEvotranspiracion`, `valorLecturaEvotranspiracion`, `metricaEvotranspiracion_idmetricaEvotranspiracion`)"
          ."VALUES ('$idlecturaEvotranspiracion','$fechaLecturaEvotranspiracion','$valorLecturaEvotranspiracion','$metricaEvotranspiracion_idmetricaEvotranspiracion')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Lecturaevotranspiracion en la base de datos.
     * @param lecturaevotranspiracion objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($lecturaevotranspiracion){
      $idlecturaEvotranspiracion=$lecturaevotranspiracion->getIdlecturaEvotranspiracion();

      try {
          $sql= "SELECT `idlecturaEvotranspiracion`, `fechaLecturaEvotranspiracion`, `valorLecturaEvotranspiracion`, `metricaEvotranspiracion_idmetricaEvotranspiracion`"
          ."FROM `lecturaevotranspiracion`"
          ."WHERE `idlecturaEvotranspiracion`='$idlecturaEvotranspiracion'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $lecturaevotranspiracion->setIdlecturaEvotranspiracion($data[$i]['idlecturaEvotranspiracion']);
          $lecturaevotranspiracion->setFechaLecturaEvotranspiracion($data[$i]['fechaLecturaEvotranspiracion']);
          $lecturaevotranspiracion->setValorLecturaEvotranspiracion($data[$i]['valorLecturaEvotranspiracion']);
           $metricaevotranspiracion = new Metricaevotranspiracion();
           $metricaevotranspiracion->setIdmetricaEvotranspiracion($data[$i]['metricaEvotranspiracion_idmetricaEvotranspiracion']);
           $lecturaevotranspiracion->setMetricaEvotranspiracion_idmetricaEvotranspiracion($metricaevotranspiracion);

          }
      return $lecturaevotranspiracion;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Lecturaevotranspiracion en la base de datos.
     * @param lecturaevotranspiracion objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($lecturaevotranspiracion){
      $idlecturaEvotranspiracion=$lecturaevotranspiracion->getIdlecturaEvotranspiracion();
$fechaLecturaEvotranspiracion=$lecturaevotranspiracion->getFechaLecturaEvotranspiracion();
$valorLecturaEvotranspiracion=$lecturaevotranspiracion->getValorLecturaEvotranspiracion();
$metricaEvotranspiracion_idmetricaEvotranspiracion=$lecturaevotranspiracion->getMetricaEvotranspiracion_idmetricaEvotranspiracion()->getIdmetricaEvotranspiracion();

      try {
          $sql= "UPDATE `lecturaevotranspiracion` SET`idlecturaEvotranspiracion`='$idlecturaEvotranspiracion' ,`fechaLecturaEvotranspiracion`='$fechaLecturaEvotranspiracion' ,`valorLecturaEvotranspiracion`='$valorLecturaEvotranspiracion' ,`metricaEvotranspiracion_idmetricaEvotranspiracion`='$metricaEvotranspiracion_idmetricaEvotranspiracion' WHERE `idlecturaEvotranspiracion`='$idlecturaEvotranspiracion' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Lecturaevotranspiracion en la base de datos.
     * @param lecturaevotranspiracion objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($lecturaevotranspiracion){
      $idlecturaEvotranspiracion=$lecturaevotranspiracion->getIdlecturaEvotranspiracion();

      try {
          $sql ="DELETE FROM `lecturaevotranspiracion` WHERE `idlecturaEvotranspiracion`='$idlecturaEvotranspiracion'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Lecturaevotranspiracion en la base de datos.
     * @return ArrayList<Lecturaevotranspiracion> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `idlecturaEvotranspiracion`, `fechaLecturaEvotranspiracion`, `valorLecturaEvotranspiracion`, `metricaEvotranspiracion_idmetricaEvotranspiracion`"
          ."FROM `lecturaevotranspiracion`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $lecturaevotranspiracion= new Lecturaevotranspiracion();
          $lecturaevotranspiracion->setIdlecturaEvotranspiracion($data[$i]['idlecturaEvotranspiracion']);
          $lecturaevotranspiracion->setFechaLecturaEvotranspiracion($data[$i]['fechaLecturaEvotranspiracion']);
          $lecturaevotranspiracion->setValorLecturaEvotranspiracion($data[$i]['valorLecturaEvotranspiracion']);
           $metricaevotranspiracion = new Metricaevotranspiracion();
           $metricaevotranspiracion->setIdmetricaEvotranspiracion($data[$i]['metricaEvotranspiracion_idmetricaEvotranspiracion']);
           $lecturaevotranspiracion->setMetricaEvotranspiracion_idmetricaEvotranspiracion($metricaevotranspiracion);

          array_push($lista,$lecturaevotranspiracion);
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