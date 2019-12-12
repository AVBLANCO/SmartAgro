<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Dispongo de doce horas de adelanto, puedo de decárselas a ella  \\

include_once realpath('../dao/interfaz/IMetricaquimicasueloDao.php');
include_once realpath('../dto/Metricaquimicasuelo.php');
include_once realpath('../dto/Quimicasuelo.php');

class MetricaquimicasueloDao implements IMetricaquimicasueloDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Metricaquimicasuelo en la base de datos.
     * @param metricaquimicasuelo objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($metricaquimicasuelo){
      $idmetricaQuimicaSuelo=$metricaquimicasuelo->getIdmetricaQuimicaSuelo();
$descripcionMetricaQuimicaSuelocol=$metricaquimicasuelo->getDescripcionMetricaQuimicaSuelocol();
$quimicaSuelo_idQuimicaSuelo=$metricaquimicasuelo->getQuimicaSuelo_idQuimicaSuelo()->getIdQuimicaSuelo();

      try {
          $sql= "INSERT INTO `metricaquimicasuelo`( `idmetricaQuimicaSuelo`, `descripcionMetricaQuimicaSuelocol`, `quimicaSuelo_idQuimicaSuelo`)"
          ."VALUES ('$idmetricaQuimicaSuelo','$descripcionMetricaQuimicaSuelocol','$quimicaSuelo_idQuimicaSuelo')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Metricaquimicasuelo en la base de datos.
     * @param metricaquimicasuelo objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($metricaquimicasuelo){
      $idmetricaQuimicaSuelo=$metricaquimicasuelo->getIdmetricaQuimicaSuelo();

      try {
          $sql= "SELECT `idmetricaQuimicaSuelo`, `descripcionMetricaQuimicaSuelocol`, `quimicaSuelo_idQuimicaSuelo`"
          ."FROM `metricaquimicasuelo`"
          ."WHERE `idmetricaQuimicaSuelo`='$idmetricaQuimicaSuelo'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $metricaquimicasuelo->setIdmetricaQuimicaSuelo($data[$i]['idmetricaQuimicaSuelo']);
          $metricaquimicasuelo->setDescripcionMetricaQuimicaSuelocol($data[$i]['descripcionMetricaQuimicaSuelocol']);
           $quimicasuelo = new Quimicasuelo();
           $quimicasuelo->setIdQuimicaSuelo($data[$i]['quimicaSuelo_idQuimicaSuelo']);
           $metricaquimicasuelo->setQuimicaSuelo_idQuimicaSuelo($quimicasuelo);

          }
      return $metricaquimicasuelo;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Metricaquimicasuelo en la base de datos.
     * @param metricaquimicasuelo objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($metricaquimicasuelo){
      $idmetricaQuimicaSuelo=$metricaquimicasuelo->getIdmetricaQuimicaSuelo();
$descripcionMetricaQuimicaSuelocol=$metricaquimicasuelo->getDescripcionMetricaQuimicaSuelocol();
$quimicaSuelo_idQuimicaSuelo=$metricaquimicasuelo->getQuimicaSuelo_idQuimicaSuelo()->getIdQuimicaSuelo();

      try {
          $sql= "UPDATE `metricaquimicasuelo` SET`idmetricaQuimicaSuelo`='$idmetricaQuimicaSuelo' ,`descripcionMetricaQuimicaSuelocol`='$descripcionMetricaQuimicaSuelocol' ,`quimicaSuelo_idQuimicaSuelo`='$quimicaSuelo_idQuimicaSuelo' WHERE `idmetricaQuimicaSuelo`='$idmetricaQuimicaSuelo' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Metricaquimicasuelo en la base de datos.
     * @param metricaquimicasuelo objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($metricaquimicasuelo){
      $idmetricaQuimicaSuelo=$metricaquimicasuelo->getIdmetricaQuimicaSuelo();

      try {
          $sql ="DELETE FROM `metricaquimicasuelo` WHERE `idmetricaQuimicaSuelo`='$idmetricaQuimicaSuelo'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Metricaquimicasuelo en la base de datos.
     * @return ArrayList<Metricaquimicasuelo> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `idmetricaQuimicaSuelo`, `descripcionMetricaQuimicaSuelocol`, `quimicaSuelo_idQuimicaSuelo`"
          ."FROM `metricaquimicasuelo`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $metricaquimicasuelo= new Metricaquimicasuelo();
          $metricaquimicasuelo->setIdmetricaQuimicaSuelo($data[$i]['idmetricaQuimicaSuelo']);
          $metricaquimicasuelo->setDescripcionMetricaQuimicaSuelocol($data[$i]['descripcionMetricaQuimicaSuelocol']);
           $quimicasuelo = new Quimicasuelo();
           $quimicasuelo->setIdQuimicaSuelo($data[$i]['quimicaSuelo_idQuimicaSuelo']);
           $metricaquimicasuelo->setQuimicaSuelo_idQuimicaSuelo($quimicasuelo);

          array_push($lista,$metricaquimicasuelo);
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