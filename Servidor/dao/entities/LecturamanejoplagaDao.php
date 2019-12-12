<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    La vie est composé de combien de fois nous rions avant de mourir  \\

include_once realpath('../dao/interfaz/ILecturamanejoplagaDao.php');
include_once realpath('../dto/Lecturamanejoplaga.php');
include_once realpath('../dto/Metricamanejoplagas.php');

class LecturamanejoplagaDao implements ILecturamanejoplagaDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Lecturamanejoplaga en la base de datos.
     * @param lecturamanejoplaga objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($lecturamanejoplaga){
      $idlecturaManejoPlaga=$lecturamanejoplaga->getIdlecturaManejoPlaga();
$valorLecturaManejoPlagacol=$lecturamanejoplaga->getValorLecturaManejoPlagacol();
$fechaLecturaManejoPlaga=$lecturamanejoplaga->getFechaLecturaManejoPlaga();
$metricaManejoPlagas_idmetricaManejoPlagas=$lecturamanejoplaga->getMetricaManejoPlagas_idmetricaManejoPlagas()->getIdmetricaManejoPlagas();

      try {
          $sql= "INSERT INTO `lecturamanejoplaga`( `idlecturaManejoPlaga`, `valorLecturaManejoPlagacol`, `fechaLecturaManejoPlaga`, `metricaManejoPlagas_idmetricaManejoPlagas`)"
          ."VALUES ('$idlecturaManejoPlaga','$valorLecturaManejoPlagacol','$fechaLecturaManejoPlaga','$metricaManejoPlagas_idmetricaManejoPlagas')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Lecturamanejoplaga en la base de datos.
     * @param lecturamanejoplaga objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($lecturamanejoplaga){
      $idlecturaManejoPlaga=$lecturamanejoplaga->getIdlecturaManejoPlaga();

      try {
          $sql= "SELECT `idlecturaManejoPlaga`, `valorLecturaManejoPlagacol`, `fechaLecturaManejoPlaga`, `metricaManejoPlagas_idmetricaManejoPlagas`"
          ."FROM `lecturamanejoplaga`"
          ."WHERE `idlecturaManejoPlaga`='$idlecturaManejoPlaga'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $lecturamanejoplaga->setIdlecturaManejoPlaga($data[$i]['idlecturaManejoPlaga']);
          $lecturamanejoplaga->setValorLecturaManejoPlagacol($data[$i]['valorLecturaManejoPlagacol']);
          $lecturamanejoplaga->setFechaLecturaManejoPlaga($data[$i]['fechaLecturaManejoPlaga']);
           $metricamanejoplagas = new Metricamanejoplagas();
           $metricamanejoplagas->setIdmetricaManejoPlagas($data[$i]['metricaManejoPlagas_idmetricaManejoPlagas']);
           $lecturamanejoplaga->setMetricaManejoPlagas_idmetricaManejoPlagas($metricamanejoplagas);

          }
      return $lecturamanejoplaga;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Lecturamanejoplaga en la base de datos.
     * @param lecturamanejoplaga objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($lecturamanejoplaga){
      $idlecturaManejoPlaga=$lecturamanejoplaga->getIdlecturaManejoPlaga();
$valorLecturaManejoPlagacol=$lecturamanejoplaga->getValorLecturaManejoPlagacol();
$fechaLecturaManejoPlaga=$lecturamanejoplaga->getFechaLecturaManejoPlaga();
$metricaManejoPlagas_idmetricaManejoPlagas=$lecturamanejoplaga->getMetricaManejoPlagas_idmetricaManejoPlagas()->getIdmetricaManejoPlagas();

      try {
          $sql= "UPDATE `lecturamanejoplaga` SET`idlecturaManejoPlaga`='$idlecturaManejoPlaga' ,`valorLecturaManejoPlagacol`='$valorLecturaManejoPlagacol' ,`fechaLecturaManejoPlaga`='$fechaLecturaManejoPlaga' ,`metricaManejoPlagas_idmetricaManejoPlagas`='$metricaManejoPlagas_idmetricaManejoPlagas' WHERE `idlecturaManejoPlaga`='$idlecturaManejoPlaga' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Lecturamanejoplaga en la base de datos.
     * @param lecturamanejoplaga objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($lecturamanejoplaga){
      $idlecturaManejoPlaga=$lecturamanejoplaga->getIdlecturaManejoPlaga();

      try {
          $sql ="DELETE FROM `lecturamanejoplaga` WHERE `idlecturaManejoPlaga`='$idlecturaManejoPlaga'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Lecturamanejoplaga en la base de datos.
     * @return ArrayList<Lecturamanejoplaga> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `idlecturaManejoPlaga`, `valorLecturaManejoPlagacol`, `fechaLecturaManejoPlaga`, `metricaManejoPlagas_idmetricaManejoPlagas`"
          ."FROM `lecturamanejoplaga`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $lecturamanejoplaga= new Lecturamanejoplaga();
          $lecturamanejoplaga->setIdlecturaManejoPlaga($data[$i]['idlecturaManejoPlaga']);
          $lecturamanejoplaga->setValorLecturaManejoPlagacol($data[$i]['valorLecturaManejoPlagacol']);
          $lecturamanejoplaga->setFechaLecturaManejoPlaga($data[$i]['fechaLecturaManejoPlaga']);
           $metricamanejoplagas = new Metricamanejoplagas();
           $metricamanejoplagas->setIdmetricaManejoPlagas($data[$i]['metricaManejoPlagas_idmetricaManejoPlagas']);
           $lecturamanejoplaga->setMetricaManejoPlagas_idmetricaManejoPlagas($metricamanejoplagas);

          array_push($lista,$lecturamanejoplaga);
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