<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Me arreglas mi impresora?  \\

include_once realpath('../dao/interfaz/IMetricabiologiasueloDao.php');
include_once realpath('../dto/Metricabiologiasuelo.php');
include_once realpath('../dto/Biologiasuelo.php');

class MetricabiologiasueloDao implements IMetricabiologiasueloDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Metricabiologiasuelo en la base de datos.
     * @param metricabiologiasuelo objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($metricabiologiasuelo){
      $idmetricaBiologiaSuelo=$metricabiologiasuelo->getIdmetricaBiologiaSuelo();
$descripcionMetricaBiologiaSuelo=$metricabiologiasuelo->getDescripcionMetricaBiologiaSuelo();
$biologiaSuelo_idbiologiaSuelo=$metricabiologiasuelo->getBiologiaSuelo_idbiologiaSuelo()->getIdbiologiaSuelo();

      try {
          $sql= "INSERT INTO `metricabiologiasuelo`( `idmetricaBiologiaSuelo`, `descripcionMetricaBiologiaSuelo`, `biologiaSuelo_idbiologiaSuelo`)"
          ."VALUES ('$idmetricaBiologiaSuelo','$descripcionMetricaBiologiaSuelo','$biologiaSuelo_idbiologiaSuelo')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Metricabiologiasuelo en la base de datos.
     * @param metricabiologiasuelo objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($metricabiologiasuelo){
      $idmetricaBiologiaSuelo=$metricabiologiasuelo->getIdmetricaBiologiaSuelo();

      try {
          $sql= "SELECT `idmetricaBiologiaSuelo`, `descripcionMetricaBiologiaSuelo`, `biologiaSuelo_idbiologiaSuelo`"
          ."FROM `metricabiologiasuelo`"
          ."WHERE `idmetricaBiologiaSuelo`='$idmetricaBiologiaSuelo'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $metricabiologiasuelo->setIdmetricaBiologiaSuelo($data[$i]['idmetricaBiologiaSuelo']);
          $metricabiologiasuelo->setDescripcionMetricaBiologiaSuelo($data[$i]['descripcionMetricaBiologiaSuelo']);
           $biologiasuelo = new Biologiasuelo();
           $biologiasuelo->setIdbiologiaSuelo($data[$i]['biologiaSuelo_idbiologiaSuelo']);
           $metricabiologiasuelo->setBiologiaSuelo_idbiologiaSuelo($biologiasuelo);

          }
      return $metricabiologiasuelo;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Metricabiologiasuelo en la base de datos.
     * @param metricabiologiasuelo objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($metricabiologiasuelo){
      $idmetricaBiologiaSuelo=$metricabiologiasuelo->getIdmetricaBiologiaSuelo();
$descripcionMetricaBiologiaSuelo=$metricabiologiasuelo->getDescripcionMetricaBiologiaSuelo();
$biologiaSuelo_idbiologiaSuelo=$metricabiologiasuelo->getBiologiaSuelo_idbiologiaSuelo()->getIdbiologiaSuelo();

      try {
          $sql= "UPDATE `metricabiologiasuelo` SET`idmetricaBiologiaSuelo`='$idmetricaBiologiaSuelo' ,`descripcionMetricaBiologiaSuelo`='$descripcionMetricaBiologiaSuelo' ,`biologiaSuelo_idbiologiaSuelo`='$biologiaSuelo_idbiologiaSuelo' WHERE `idmetricaBiologiaSuelo`='$idmetricaBiologiaSuelo' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Metricabiologiasuelo en la base de datos.
     * @param metricabiologiasuelo objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($metricabiologiasuelo){
      $idmetricaBiologiaSuelo=$metricabiologiasuelo->getIdmetricaBiologiaSuelo();

      try {
          $sql ="DELETE FROM `metricabiologiasuelo` WHERE `idmetricaBiologiaSuelo`='$idmetricaBiologiaSuelo'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Metricabiologiasuelo en la base de datos.
     * @return ArrayList<Metricabiologiasuelo> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `idmetricaBiologiaSuelo`, `descripcionMetricaBiologiaSuelo`, `biologiaSuelo_idbiologiaSuelo`"
          ."FROM `metricabiologiasuelo`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $metricabiologiasuelo= new Metricabiologiasuelo();
          $metricabiologiasuelo->setIdmetricaBiologiaSuelo($data[$i]['idmetricaBiologiaSuelo']);
          $metricabiologiasuelo->setDescripcionMetricaBiologiaSuelo($data[$i]['descripcionMetricaBiologiaSuelo']);
           $biologiasuelo = new Biologiasuelo();
           $biologiasuelo->setIdbiologiaSuelo($data[$i]['biologiaSuelo_idbiologiaSuelo']);
           $metricabiologiasuelo->setBiologiaSuelo_idbiologiaSuelo($biologiasuelo);

          array_push($lista,$metricabiologiasuelo);
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