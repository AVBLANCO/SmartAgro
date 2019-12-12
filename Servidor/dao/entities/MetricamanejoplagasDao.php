<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Me arreglas mi impresora?  \\

include_once realpath('../dao/interfaz/IMetricamanejoplagasDao.php');
include_once realpath('../dto/Metricamanejoplagas.php');
include_once realpath('../dto/Manejointegradoplagas.php');

class MetricamanejoplagasDao implements IMetricamanejoplagasDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Metricamanejoplagas en la base de datos.
     * @param metricamanejoplagas objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($metricamanejoplagas){
      $idmetricaManejoPlagas=$metricamanejoplagas->getIdmetricaManejoPlagas();
$descripcionMetricaManejoPlagas=$metricamanejoplagas->getDescripcionMetricaManejoPlagas();
$manejoIntegradoPlagas_idmanejoIntegradoPlagas=$metricamanejoplagas->getManejoIntegradoPlagas_idmanejoIntegradoPlagas()->getIdmanejoIntegradoPlagas();

      try {
          $sql= "INSERT INTO `metricamanejoplagas`( `idmetricaManejoPlagas`, `descripcionMetricaManejoPlagas`, `manejoIntegradoPlagas_idmanejoIntegradoPlagas`)"
          ."VALUES ('$idmetricaManejoPlagas','$descripcionMetricaManejoPlagas','$manejoIntegradoPlagas_idmanejoIntegradoPlagas')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Metricamanejoplagas en la base de datos.
     * @param metricamanejoplagas objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($metricamanejoplagas){
      $idmetricaManejoPlagas=$metricamanejoplagas->getIdmetricaManejoPlagas();

      try {
          $sql= "SELECT `idmetricaManejoPlagas`, `descripcionMetricaManejoPlagas`, `manejoIntegradoPlagas_idmanejoIntegradoPlagas`"
          ."FROM `metricamanejoplagas`"
          ."WHERE `idmetricaManejoPlagas`='$idmetricaManejoPlagas'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $metricamanejoplagas->setIdmetricaManejoPlagas($data[$i]['idmetricaManejoPlagas']);
          $metricamanejoplagas->setDescripcionMetricaManejoPlagas($data[$i]['descripcionMetricaManejoPlagas']);
           $manejointegradoplagas = new Manejointegradoplagas();
           $manejointegradoplagas->setIdmanejoIntegradoPlagas($data[$i]['manejoIntegradoPlagas_idmanejoIntegradoPlagas']);
           $metricamanejoplagas->setManejoIntegradoPlagas_idmanejoIntegradoPlagas($manejointegradoplagas);

          }
      return $metricamanejoplagas;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Metricamanejoplagas en la base de datos.
     * @param metricamanejoplagas objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($metricamanejoplagas){
      $idmetricaManejoPlagas=$metricamanejoplagas->getIdmetricaManejoPlagas();
$descripcionMetricaManejoPlagas=$metricamanejoplagas->getDescripcionMetricaManejoPlagas();
$manejoIntegradoPlagas_idmanejoIntegradoPlagas=$metricamanejoplagas->getManejoIntegradoPlagas_idmanejoIntegradoPlagas()->getIdmanejoIntegradoPlagas();

      try {
          $sql= "UPDATE `metricamanejoplagas` SET`idmetricaManejoPlagas`='$idmetricaManejoPlagas' ,`descripcionMetricaManejoPlagas`='$descripcionMetricaManejoPlagas' ,`manejoIntegradoPlagas_idmanejoIntegradoPlagas`='$manejoIntegradoPlagas_idmanejoIntegradoPlagas' WHERE `idmetricaManejoPlagas`='$idmetricaManejoPlagas' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Metricamanejoplagas en la base de datos.
     * @param metricamanejoplagas objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($metricamanejoplagas){
      $idmetricaManejoPlagas=$metricamanejoplagas->getIdmetricaManejoPlagas();

      try {
          $sql ="DELETE FROM `metricamanejoplagas` WHERE `idmetricaManejoPlagas`='$idmetricaManejoPlagas'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Metricamanejoplagas en la base de datos.
     * @return ArrayList<Metricamanejoplagas> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `idmetricaManejoPlagas`, `descripcionMetricaManejoPlagas`, `manejoIntegradoPlagas_idmanejoIntegradoPlagas`"
          ."FROM `metricamanejoplagas`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $metricamanejoplagas= new Metricamanejoplagas();
          $metricamanejoplagas->setIdmetricaManejoPlagas($data[$i]['idmetricaManejoPlagas']);
          $metricamanejoplagas->setDescripcionMetricaManejoPlagas($data[$i]['descripcionMetricaManejoPlagas']);
           $manejointegradoplagas = new Manejointegradoplagas();
           $manejointegradoplagas->setIdmanejoIntegradoPlagas($data[$i]['manejoIntegradoPlagas_idmanejoIntegradoPlagas']);
           $metricamanejoplagas->setManejoIntegradoPlagas_idmanejoIntegradoPlagas($manejointegradoplagas);

          array_push($lista,$metricamanejoplagas);
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