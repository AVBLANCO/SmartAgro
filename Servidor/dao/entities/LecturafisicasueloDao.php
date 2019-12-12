<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Recuerda, cuando enciendas la molotov, debes arrojarla  \\

include_once realpath('../dao/interfaz/ILecturafisicasueloDao.php');
include_once realpath('../dto/Lecturafisicasuelo.php');
include_once realpath('../dto/Metricassuelo.php');

class LecturafisicasueloDao implements ILecturafisicasueloDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Lecturafisicasuelo en la base de datos.
     * @param lecturafisicasuelo objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($lecturafisicasuelo){
      $idlecturaFisicaSuelo=$lecturafisicasuelo->getIdlecturaFisicaSuelo();
$fechaLecturaFisicaSuelo=$lecturafisicasuelo->getFechaLecturaFisicaSuelo();
$valorLecturaFisicaSuelo=$lecturafisicasuelo->getValorLecturaFisicaSuelo();
$metricasSuelo_idmetricasSuelo=$lecturafisicasuelo->getMetricasSuelo_idmetricasSuelo()->getIdmetricasSuelo();

      try {
          $sql= "INSERT INTO `lecturafisicasuelo`( `idlecturaFisicaSuelo`, `fechaLecturaFisicaSuelo`, `valorLecturaFisicaSuelo`, `metricasSuelo_idmetricasSuelo`)"
          ."VALUES ('$idlecturaFisicaSuelo','$fechaLecturaFisicaSuelo','$valorLecturaFisicaSuelo','$metricasSuelo_idmetricasSuelo')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Lecturafisicasuelo en la base de datos.
     * @param lecturafisicasuelo objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($lecturafisicasuelo){
      $idlecturaFisicaSuelo=$lecturafisicasuelo->getIdlecturaFisicaSuelo();

      try {
          $sql= "SELECT `idlecturaFisicaSuelo`, `fechaLecturaFisicaSuelo`, `valorLecturaFisicaSuelo`, `metricasSuelo_idmetricasSuelo`"
          ."FROM `lecturafisicasuelo`"
          ."WHERE `idlecturaFisicaSuelo`='$idlecturaFisicaSuelo'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $lecturafisicasuelo->setIdlecturaFisicaSuelo($data[$i]['idlecturaFisicaSuelo']);
          $lecturafisicasuelo->setFechaLecturaFisicaSuelo($data[$i]['fechaLecturaFisicaSuelo']);
          $lecturafisicasuelo->setValorLecturaFisicaSuelo($data[$i]['valorLecturaFisicaSuelo']);
           $metricassuelo = new Metricassuelo();
           $metricassuelo->setIdmetricasSuelo($data[$i]['metricasSuelo_idmetricasSuelo']);
           $lecturafisicasuelo->setMetricasSuelo_idmetricasSuelo($metricassuelo);

          }
      return $lecturafisicasuelo;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Lecturafisicasuelo en la base de datos.
     * @param lecturafisicasuelo objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($lecturafisicasuelo){
      $idlecturaFisicaSuelo=$lecturafisicasuelo->getIdlecturaFisicaSuelo();
$fechaLecturaFisicaSuelo=$lecturafisicasuelo->getFechaLecturaFisicaSuelo();
$valorLecturaFisicaSuelo=$lecturafisicasuelo->getValorLecturaFisicaSuelo();
$metricasSuelo_idmetricasSuelo=$lecturafisicasuelo->getMetricasSuelo_idmetricasSuelo()->getIdmetricasSuelo();

      try {
          $sql= "UPDATE `lecturafisicasuelo` SET`idlecturaFisicaSuelo`='$idlecturaFisicaSuelo' ,`fechaLecturaFisicaSuelo`='$fechaLecturaFisicaSuelo' ,`valorLecturaFisicaSuelo`='$valorLecturaFisicaSuelo' ,`metricasSuelo_idmetricasSuelo`='$metricasSuelo_idmetricasSuelo' WHERE `idlecturaFisicaSuelo`='$idlecturaFisicaSuelo' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Lecturafisicasuelo en la base de datos.
     * @param lecturafisicasuelo objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($lecturafisicasuelo){
      $idlecturaFisicaSuelo=$lecturafisicasuelo->getIdlecturaFisicaSuelo();

      try {
          $sql ="DELETE FROM `lecturafisicasuelo` WHERE `idlecturaFisicaSuelo`='$idlecturaFisicaSuelo'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Lecturafisicasuelo en la base de datos.
     * @return ArrayList<Lecturafisicasuelo> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `idlecturaFisicaSuelo`, `fechaLecturaFisicaSuelo`, `valorLecturaFisicaSuelo`, `metricasSuelo_idmetricasSuelo`"
          ."FROM `lecturafisicasuelo`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $lecturafisicasuelo= new Lecturafisicasuelo();
          $lecturafisicasuelo->setIdlecturaFisicaSuelo($data[$i]['idlecturaFisicaSuelo']);
          $lecturafisicasuelo->setFechaLecturaFisicaSuelo($data[$i]['fechaLecturaFisicaSuelo']);
          $lecturafisicasuelo->setValorLecturaFisicaSuelo($data[$i]['valorLecturaFisicaSuelo']);
           $metricassuelo = new Metricassuelo();
           $metricassuelo->setIdmetricasSuelo($data[$i]['metricasSuelo_idmetricasSuelo']);
           $lecturafisicasuelo->setMetricasSuelo_idmetricasSuelo($metricassuelo);

          array_push($lista,$lecturafisicasuelo);
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