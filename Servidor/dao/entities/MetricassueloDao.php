<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Si he visto más lejos es porque estoy sentado sobre los hombros de gigantes.  \\

include_once realpath('../dao/interfaz/IMetricassueloDao.php');
include_once realpath('../dto/Metricassuelo.php');
include_once realpath('../dto/Fisicasuelo.php');

class MetricassueloDao implements IMetricassueloDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Metricassuelo en la base de datos.
     * @param metricassuelo objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($metricassuelo){
      $idmetricasSuelo=$metricassuelo->getIdmetricasSuelo();
$descripcioMetricasSuelo=$metricassuelo->getDescripcioMetricasSuelo();
$fisicaSuelo_idfisicaSuelo=$metricassuelo->getFisicaSuelo_idfisicaSuelo()->getIdfisicaSuelo();

      try {
          $sql= "INSERT INTO `metricassuelo`( `idmetricasSuelo`, `descripcioMetricasSuelo`, `fisicaSuelo_idfisicaSuelo`)"
          ."VALUES ('$idmetricasSuelo','$descripcioMetricasSuelo','$fisicaSuelo_idfisicaSuelo')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Metricassuelo en la base de datos.
     * @param metricassuelo objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($metricassuelo){
      $idmetricasSuelo=$metricassuelo->getIdmetricasSuelo();

      try {
          $sql= "SELECT `idmetricasSuelo`, `descripcioMetricasSuelo`, `fisicaSuelo_idfisicaSuelo`"
          ."FROM `metricassuelo`"
          ."WHERE `idmetricasSuelo`='$idmetricasSuelo'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $metricassuelo->setIdmetricasSuelo($data[$i]['idmetricasSuelo']);
          $metricassuelo->setDescripcioMetricasSuelo($data[$i]['descripcioMetricasSuelo']);
           $fisicasuelo = new Fisicasuelo();
           $fisicasuelo->setIdfisicaSuelo($data[$i]['fisicaSuelo_idfisicaSuelo']);
           $metricassuelo->setFisicaSuelo_idfisicaSuelo($fisicasuelo);

          }
      return $metricassuelo;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Metricassuelo en la base de datos.
     * @param metricassuelo objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($metricassuelo){
      $idmetricasSuelo=$metricassuelo->getIdmetricasSuelo();
$descripcioMetricasSuelo=$metricassuelo->getDescripcioMetricasSuelo();
$fisicaSuelo_idfisicaSuelo=$metricassuelo->getFisicaSuelo_idfisicaSuelo()->getIdfisicaSuelo();

      try {
          $sql= "UPDATE `metricassuelo` SET`idmetricasSuelo`='$idmetricasSuelo' ,`descripcioMetricasSuelo`='$descripcioMetricasSuelo' ,`fisicaSuelo_idfisicaSuelo`='$fisicaSuelo_idfisicaSuelo' WHERE `idmetricasSuelo`='$idmetricasSuelo' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Metricassuelo en la base de datos.
     * @param metricassuelo objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($metricassuelo){
      $idmetricasSuelo=$metricassuelo->getIdmetricasSuelo();

      try {
          $sql ="DELETE FROM `metricassuelo` WHERE `idmetricasSuelo`='$idmetricasSuelo'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Metricassuelo en la base de datos.
     * @return ArrayList<Metricassuelo> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `idmetricasSuelo`, `descripcioMetricasSuelo`, `fisicaSuelo_idfisicaSuelo`"
          ."FROM `metricassuelo`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $metricassuelo= new Metricassuelo();
          $metricassuelo->setIdmetricasSuelo($data[$i]['idmetricasSuelo']);
          $metricassuelo->setDescripcioMetricasSuelo($data[$i]['descripcioMetricasSuelo']);
           $fisicasuelo = new Fisicasuelo();
           $fisicasuelo->setIdfisicaSuelo($data[$i]['fisicaSuelo_idfisicaSuelo']);
           $metricassuelo->setFisicaSuelo_idfisicaSuelo($fisicasuelo);

          array_push($lista,$metricassuelo);
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