<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Antes que me hubiera apasionado por mujer alguna, jugué mi corazón al azar y me lo ganó la Violencia.  \\

include_once realpath('../dao/interfaz/ILecturaquimicasueloDao.php');
include_once realpath('../dto/Lecturaquimicasuelo.php');
include_once realpath('../dto/Metricaquimicasuelo.php');

class LecturaquimicasueloDao implements ILecturaquimicasueloDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Lecturaquimicasuelo en la base de datos.
     * @param lecturaquimicasuelo objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($lecturaquimicasuelo){
      $idlecturaQuimicaSuelo=$lecturaquimicasuelo->getIdlecturaQuimicaSuelo();
$fechaLecturaQuimicaSuelo=$lecturaquimicasuelo->getFechaLecturaQuimicaSuelo();
$valorLecturaQuimicaSuelo=$lecturaquimicasuelo->getValorLecturaQuimicaSuelo();
$metricaQuimicaSuelo_idmetricaQuimicaSuelo=$lecturaquimicasuelo->getMetricaQuimicaSuelo_idmetricaQuimicaSuelo()->getIdmetricaQuimicaSuelo();

      try {
          $sql= "INSERT INTO `lecturaquimicasuelo`( `idlecturaQuimicaSuelo`, `fechaLecturaQuimicaSuelo`, `valorLecturaQuimicaSuelo`, `metricaQuimicaSuelo_idmetricaQuimicaSuelo`)"
          ."VALUES ('$idlecturaQuimicaSuelo','$fechaLecturaQuimicaSuelo','$valorLecturaQuimicaSuelo','$metricaQuimicaSuelo_idmetricaQuimicaSuelo')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Lecturaquimicasuelo en la base de datos.
     * @param lecturaquimicasuelo objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($lecturaquimicasuelo){
      $idlecturaQuimicaSuelo=$lecturaquimicasuelo->getIdlecturaQuimicaSuelo();

      try {
          $sql= "SELECT `idlecturaQuimicaSuelo`, `fechaLecturaQuimicaSuelo`, `valorLecturaQuimicaSuelo`, `metricaQuimicaSuelo_idmetricaQuimicaSuelo`"
          ."FROM `lecturaquimicasuelo`"
          ."WHERE `idlecturaQuimicaSuelo`='$idlecturaQuimicaSuelo'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $lecturaquimicasuelo->setIdlecturaQuimicaSuelo($data[$i]['idlecturaQuimicaSuelo']);
          $lecturaquimicasuelo->setFechaLecturaQuimicaSuelo($data[$i]['fechaLecturaQuimicaSuelo']);
          $lecturaquimicasuelo->setValorLecturaQuimicaSuelo($data[$i]['valorLecturaQuimicaSuelo']);
           $metricaquimicasuelo = new Metricaquimicasuelo();
           $metricaquimicasuelo->setIdmetricaQuimicaSuelo($data[$i]['metricaQuimicaSuelo_idmetricaQuimicaSuelo']);
           $lecturaquimicasuelo->setMetricaQuimicaSuelo_idmetricaQuimicaSuelo($metricaquimicasuelo);

          }
      return $lecturaquimicasuelo;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Lecturaquimicasuelo en la base de datos.
     * @param lecturaquimicasuelo objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($lecturaquimicasuelo){
      $idlecturaQuimicaSuelo=$lecturaquimicasuelo->getIdlecturaQuimicaSuelo();
$fechaLecturaQuimicaSuelo=$lecturaquimicasuelo->getFechaLecturaQuimicaSuelo();
$valorLecturaQuimicaSuelo=$lecturaquimicasuelo->getValorLecturaQuimicaSuelo();
$metricaQuimicaSuelo_idmetricaQuimicaSuelo=$lecturaquimicasuelo->getMetricaQuimicaSuelo_idmetricaQuimicaSuelo()->getIdmetricaQuimicaSuelo();

      try {
          $sql= "UPDATE `lecturaquimicasuelo` SET`idlecturaQuimicaSuelo`='$idlecturaQuimicaSuelo' ,`fechaLecturaQuimicaSuelo`='$fechaLecturaQuimicaSuelo' ,`valorLecturaQuimicaSuelo`='$valorLecturaQuimicaSuelo' ,`metricaQuimicaSuelo_idmetricaQuimicaSuelo`='$metricaQuimicaSuelo_idmetricaQuimicaSuelo' WHERE `idlecturaQuimicaSuelo`='$idlecturaQuimicaSuelo' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Lecturaquimicasuelo en la base de datos.
     * @param lecturaquimicasuelo objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($lecturaquimicasuelo){
      $idlecturaQuimicaSuelo=$lecturaquimicasuelo->getIdlecturaQuimicaSuelo();

      try {
          $sql ="DELETE FROM `lecturaquimicasuelo` WHERE `idlecturaQuimicaSuelo`='$idlecturaQuimicaSuelo'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Lecturaquimicasuelo en la base de datos.
     * @return ArrayList<Lecturaquimicasuelo> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `idlecturaQuimicaSuelo`, `fechaLecturaQuimicaSuelo`, `valorLecturaQuimicaSuelo`, `metricaQuimicaSuelo_idmetricaQuimicaSuelo`"
          ."FROM `lecturaquimicasuelo`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $lecturaquimicasuelo= new Lecturaquimicasuelo();
          $lecturaquimicasuelo->setIdlecturaQuimicaSuelo($data[$i]['idlecturaQuimicaSuelo']);
          $lecturaquimicasuelo->setFechaLecturaQuimicaSuelo($data[$i]['fechaLecturaQuimicaSuelo']);
          $lecturaquimicasuelo->setValorLecturaQuimicaSuelo($data[$i]['valorLecturaQuimicaSuelo']);
           $metricaquimicasuelo = new Metricaquimicasuelo();
           $metricaquimicasuelo->setIdmetricaQuimicaSuelo($data[$i]['metricaQuimicaSuelo_idmetricaQuimicaSuelo']);
           $lecturaquimicasuelo->setMetricaQuimicaSuelo_idmetricaQuimicaSuelo($metricaquimicasuelo);

          array_push($lista,$lecturaquimicasuelo);
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