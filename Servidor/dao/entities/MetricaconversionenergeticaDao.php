<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    En esto paso mis sábados en la noche ( ¬.¬)  \\

include_once realpath('../dao/interfaz/IMetricaconversionenergeticaDao.php');
include_once realpath('../dto/Metricaconversionenergetica.php');
include_once realpath('../dto/Conversionenergetica.php');

class MetricaconversionenergeticaDao implements IMetricaconversionenergeticaDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Metricaconversionenergetica en la base de datos.
     * @param metricaconversionenergetica objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($metricaconversionenergetica){
      $idmetricaConversionEnergetica=$metricaconversionenergetica->getIdmetricaConversionEnergetica();
$desripcionMetricaConversionEnergetica=$metricaconversionenergetica->getDesripcionMetricaConversionEnergetica();
$conversionEnergetica_idconversionEnergetica=$metricaconversionenergetica->getConversionEnergetica_idconversionEnergetica()->getIdconversionEnergetica();

      try {
          $sql= "INSERT INTO `metricaconversionenergetica`( `idmetricaConversionEnergetica`, `desripcionMetricaConversionEnergetica`, `conversionEnergetica_idconversionEnergetica`)"
          ."VALUES ('$idmetricaConversionEnergetica','$desripcionMetricaConversionEnergetica','$conversionEnergetica_idconversionEnergetica')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Metricaconversionenergetica en la base de datos.
     * @param metricaconversionenergetica objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($metricaconversionenergetica){
      $idmetricaConversionEnergetica=$metricaconversionenergetica->getIdmetricaConversionEnergetica();

      try {
          $sql= "SELECT `idmetricaConversionEnergetica`, `desripcionMetricaConversionEnergetica`, `conversionEnergetica_idconversionEnergetica`"
          ."FROM `metricaconversionenergetica`"
          ."WHERE `idmetricaConversionEnergetica`='$idmetricaConversionEnergetica'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $metricaconversionenergetica->setIdmetricaConversionEnergetica($data[$i]['idmetricaConversionEnergetica']);
          $metricaconversionenergetica->setDesripcionMetricaConversionEnergetica($data[$i]['desripcionMetricaConversionEnergetica']);
           $conversionenergetica = new Conversionenergetica();
           $conversionenergetica->setIdconversionEnergetica($data[$i]['conversionEnergetica_idconversionEnergetica']);
           $metricaconversionenergetica->setConversionEnergetica_idconversionEnergetica($conversionenergetica);

          }
      return $metricaconversionenergetica;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Metricaconversionenergetica en la base de datos.
     * @param metricaconversionenergetica objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($metricaconversionenergetica){
      $idmetricaConversionEnergetica=$metricaconversionenergetica->getIdmetricaConversionEnergetica();
$desripcionMetricaConversionEnergetica=$metricaconversionenergetica->getDesripcionMetricaConversionEnergetica();
$conversionEnergetica_idconversionEnergetica=$metricaconversionenergetica->getConversionEnergetica_idconversionEnergetica()->getIdconversionEnergetica();

      try {
          $sql= "UPDATE `metricaconversionenergetica` SET`idmetricaConversionEnergetica`='$idmetricaConversionEnergetica' ,`desripcionMetricaConversionEnergetica`='$desripcionMetricaConversionEnergetica' ,`conversionEnergetica_idconversionEnergetica`='$conversionEnergetica_idconversionEnergetica' WHERE `idmetricaConversionEnergetica`='$idmetricaConversionEnergetica' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Metricaconversionenergetica en la base de datos.
     * @param metricaconversionenergetica objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($metricaconversionenergetica){
      $idmetricaConversionEnergetica=$metricaconversionenergetica->getIdmetricaConversionEnergetica();

      try {
          $sql ="DELETE FROM `metricaconversionenergetica` WHERE `idmetricaConversionEnergetica`='$idmetricaConversionEnergetica'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Metricaconversionenergetica en la base de datos.
     * @return ArrayList<Metricaconversionenergetica> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `idmetricaConversionEnergetica`, `desripcionMetricaConversionEnergetica`, `conversionEnergetica_idconversionEnergetica`"
          ."FROM `metricaconversionenergetica`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $metricaconversionenergetica= new Metricaconversionenergetica();
          $metricaconversionenergetica->setIdmetricaConversionEnergetica($data[$i]['idmetricaConversionEnergetica']);
          $metricaconversionenergetica->setDesripcionMetricaConversionEnergetica($data[$i]['desripcionMetricaConversionEnergetica']);
           $conversionenergetica = new Conversionenergetica();
           $conversionenergetica->setIdconversionEnergetica($data[$i]['conversionEnergetica_idconversionEnergetica']);
           $metricaconversionenergetica->setConversionEnergetica_idconversionEnergetica($conversionenergetica);

          array_push($lista,$metricaconversionenergetica);
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