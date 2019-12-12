<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Cuando la gente cree que está muriendo, te escucha en lugar de esperar su turno para hablar.  \\

include_once realpath('../dao/interfaz/IMetricamanejointegradoenfermedadesDao.php');
include_once realpath('../dto/Metricamanejointegradoenfermedades.php');
include_once realpath('../dto/Manejointegradoenfermedades.php');

class MetricamanejointegradoenfermedadesDao implements IMetricamanejointegradoenfermedadesDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Metricamanejointegradoenfermedades en la base de datos.
     * @param metricamanejointegradoenfermedades objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($metricamanejointegradoenfermedades){
      $idmetricaManejoIntegradoEnfermedades=$metricamanejointegradoenfermedades->getIdmetricaManejoIntegradoEnfermedades();
$descricionMetricaManejoIntegradoEnfermedades=$metricamanejointegradoenfermedades->getDescricionMetricaManejoIntegradoEnfermedades();
$manejoIntegradoEnfermedades_idmanejoIntegradoEnfermedades=$metricamanejointegradoenfermedades->getManejoIntegradoEnfermedades_idmanejoIntegradoEnfermedades()->getIdmanejoIntegradoEnfermedades();

      try {
          $sql= "INSERT INTO `metricamanejointegradoenfermedades`( `idmetricaManejoIntegradoEnfermedades`, `descricionMetricaManejoIntegradoEnfermedades`, `manejoIntegradoEnfermedades_idmanejoIntegradoEnfermedades`)"
          ."VALUES ('$idmetricaManejoIntegradoEnfermedades','$descricionMetricaManejoIntegradoEnfermedades','$manejoIntegradoEnfermedades_idmanejoIntegradoEnfermedades')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Metricamanejointegradoenfermedades en la base de datos.
     * @param metricamanejointegradoenfermedades objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($metricamanejointegradoenfermedades){
      $idmetricaManejoIntegradoEnfermedades=$metricamanejointegradoenfermedades->getIdmetricaManejoIntegradoEnfermedades();

      try {
          $sql= "SELECT `idmetricaManejoIntegradoEnfermedades`, `descricionMetricaManejoIntegradoEnfermedades`, `manejoIntegradoEnfermedades_idmanejoIntegradoEnfermedades`"
          ."FROM `metricamanejointegradoenfermedades`"
          ."WHERE `idmetricaManejoIntegradoEnfermedades`='$idmetricaManejoIntegradoEnfermedades'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $metricamanejointegradoenfermedades->setIdmetricaManejoIntegradoEnfermedades($data[$i]['idmetricaManejoIntegradoEnfermedades']);
          $metricamanejointegradoenfermedades->setDescricionMetricaManejoIntegradoEnfermedades($data[$i]['descricionMetricaManejoIntegradoEnfermedades']);
           $manejointegradoenfermedades = new Manejointegradoenfermedades();
           $manejointegradoenfermedades->setIdmanejoIntegradoEnfermedades($data[$i]['manejoIntegradoEnfermedades_idmanejoIntegradoEnfermedades']);
           $metricamanejointegradoenfermedades->setManejoIntegradoEnfermedades_idmanejoIntegradoEnfermedades($manejointegradoenfermedades);

          }
      return $metricamanejointegradoenfermedades;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Metricamanejointegradoenfermedades en la base de datos.
     * @param metricamanejointegradoenfermedades objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($metricamanejointegradoenfermedades){
      $idmetricaManejoIntegradoEnfermedades=$metricamanejointegradoenfermedades->getIdmetricaManejoIntegradoEnfermedades();
$descricionMetricaManejoIntegradoEnfermedades=$metricamanejointegradoenfermedades->getDescricionMetricaManejoIntegradoEnfermedades();
$manejoIntegradoEnfermedades_idmanejoIntegradoEnfermedades=$metricamanejointegradoenfermedades->getManejoIntegradoEnfermedades_idmanejoIntegradoEnfermedades()->getIdmanejoIntegradoEnfermedades();

      try {
          $sql= "UPDATE `metricamanejointegradoenfermedades` SET`idmetricaManejoIntegradoEnfermedades`='$idmetricaManejoIntegradoEnfermedades' ,`descricionMetricaManejoIntegradoEnfermedades`='$descricionMetricaManejoIntegradoEnfermedades' ,`manejoIntegradoEnfermedades_idmanejoIntegradoEnfermedades`='$manejoIntegradoEnfermedades_idmanejoIntegradoEnfermedades' WHERE `idmetricaManejoIntegradoEnfermedades`='$idmetricaManejoIntegradoEnfermedades' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Metricamanejointegradoenfermedades en la base de datos.
     * @param metricamanejointegradoenfermedades objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($metricamanejointegradoenfermedades){
      $idmetricaManejoIntegradoEnfermedades=$metricamanejointegradoenfermedades->getIdmetricaManejoIntegradoEnfermedades();

      try {
          $sql ="DELETE FROM `metricamanejointegradoenfermedades` WHERE `idmetricaManejoIntegradoEnfermedades`='$idmetricaManejoIntegradoEnfermedades'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Metricamanejointegradoenfermedades en la base de datos.
     * @return ArrayList<Metricamanejointegradoenfermedades> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `idmetricaManejoIntegradoEnfermedades`, `descricionMetricaManejoIntegradoEnfermedades`, `manejoIntegradoEnfermedades_idmanejoIntegradoEnfermedades`"
          ."FROM `metricamanejointegradoenfermedades`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $metricamanejointegradoenfermedades= new Metricamanejointegradoenfermedades();
          $metricamanejointegradoenfermedades->setIdmetricaManejoIntegradoEnfermedades($data[$i]['idmetricaManejoIntegradoEnfermedades']);
          $metricamanejointegradoenfermedades->setDescricionMetricaManejoIntegradoEnfermedades($data[$i]['descricionMetricaManejoIntegradoEnfermedades']);
           $manejointegradoenfermedades = new Manejointegradoenfermedades();
           $manejointegradoenfermedades->setIdmanejoIntegradoEnfermedades($data[$i]['manejoIntegradoEnfermedades_idmanejoIntegradoEnfermedades']);
           $metricamanejointegradoenfermedades->setManejoIntegradoEnfermedades_idmanejoIntegradoEnfermedades($manejointegradoenfermedades);

          array_push($lista,$metricamanejointegradoenfermedades);
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