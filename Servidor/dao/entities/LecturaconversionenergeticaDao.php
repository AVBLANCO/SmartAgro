<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Lo sé porque lo sabe Fredy  \\

include_once realpath('../dao/interfaz/ILecturaconversionenergeticaDao.php');
include_once realpath('../dto/Lecturaconversionenergetica.php');
include_once realpath('../dto/Metricaconversionenergetica.php');

class LecturaconversionenergeticaDao implements ILecturaconversionenergeticaDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Lecturaconversionenergetica en la base de datos.
     * @param lecturaconversionenergetica objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($lecturaconversionenergetica){
      $idlecturaConversionEnergetica=$lecturaconversionenergetica->getIdlecturaConversionEnergetica();
$fechaLecturaConversionEnergetica=$lecturaconversionenergetica->getFechaLecturaConversionEnergetica();
$valorLecturaConversionEnergeticacol=$lecturaconversionenergetica->getValorLecturaConversionEnergeticacol();
$metricaConversionEnergetica_idmetricaConversionEnergetica=$lecturaconversionenergetica->getMetricaConversionEnergetica_idmetricaConversionEnergetica()->getIdmetricaConversionEnergetica();

      try {
          $sql= "INSERT INTO `lecturaconversionenergetica`( `idlecturaConversionEnergetica`, `fechaLecturaConversionEnergetica`, `valorLecturaConversionEnergeticacol`, `metricaConversionEnergetica_idmetricaConversionEnergetica`)"
          ."VALUES ('$idlecturaConversionEnergetica','$fechaLecturaConversionEnergetica','$valorLecturaConversionEnergeticacol','$metricaConversionEnergetica_idmetricaConversionEnergetica')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Lecturaconversionenergetica en la base de datos.
     * @param lecturaconversionenergetica objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($lecturaconversionenergetica){
      $idlecturaConversionEnergetica=$lecturaconversionenergetica->getIdlecturaConversionEnergetica();

      try {
          $sql= "SELECT `idlecturaConversionEnergetica`, `fechaLecturaConversionEnergetica`, `valorLecturaConversionEnergeticacol`, `metricaConversionEnergetica_idmetricaConversionEnergetica`"
          ."FROM `lecturaconversionenergetica`"
          ."WHERE `idlecturaConversionEnergetica`='$idlecturaConversionEnergetica'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $lecturaconversionenergetica->setIdlecturaConversionEnergetica($data[$i]['idlecturaConversionEnergetica']);
          $lecturaconversionenergetica->setFechaLecturaConversionEnergetica($data[$i]['fechaLecturaConversionEnergetica']);
          $lecturaconversionenergetica->setValorLecturaConversionEnergeticacol($data[$i]['valorLecturaConversionEnergeticacol']);
           $metricaconversionenergetica = new Metricaconversionenergetica();
           $metricaconversionenergetica->setIdmetricaConversionEnergetica($data[$i]['metricaConversionEnergetica_idmetricaConversionEnergetica']);
           $lecturaconversionenergetica->setMetricaConversionEnergetica_idmetricaConversionEnergetica($metricaconversionenergetica);

          }
      return $lecturaconversionenergetica;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Lecturaconversionenergetica en la base de datos.
     * @param lecturaconversionenergetica objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($lecturaconversionenergetica){
      $idlecturaConversionEnergetica=$lecturaconversionenergetica->getIdlecturaConversionEnergetica();
$fechaLecturaConversionEnergetica=$lecturaconversionenergetica->getFechaLecturaConversionEnergetica();
$valorLecturaConversionEnergeticacol=$lecturaconversionenergetica->getValorLecturaConversionEnergeticacol();
$metricaConversionEnergetica_idmetricaConversionEnergetica=$lecturaconversionenergetica->getMetricaConversionEnergetica_idmetricaConversionEnergetica()->getIdmetricaConversionEnergetica();

      try {
          $sql= "UPDATE `lecturaconversionenergetica` SET`idlecturaConversionEnergetica`='$idlecturaConversionEnergetica' ,`fechaLecturaConversionEnergetica`='$fechaLecturaConversionEnergetica' ,`valorLecturaConversionEnergeticacol`='$valorLecturaConversionEnergeticacol' ,`metricaConversionEnergetica_idmetricaConversionEnergetica`='$metricaConversionEnergetica_idmetricaConversionEnergetica' WHERE `idlecturaConversionEnergetica`='$idlecturaConversionEnergetica' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Lecturaconversionenergetica en la base de datos.
     * @param lecturaconversionenergetica objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($lecturaconversionenergetica){
      $idlecturaConversionEnergetica=$lecturaconversionenergetica->getIdlecturaConversionEnergetica();

      try {
          $sql ="DELETE FROM `lecturaconversionenergetica` WHERE `idlecturaConversionEnergetica`='$idlecturaConversionEnergetica'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Lecturaconversionenergetica en la base de datos.
     * @return ArrayList<Lecturaconversionenergetica> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `idlecturaConversionEnergetica`, `fechaLecturaConversionEnergetica`, `valorLecturaConversionEnergeticacol`, `metricaConversionEnergetica_idmetricaConversionEnergetica`"
          ."FROM `lecturaconversionenergetica`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $lecturaconversionenergetica= new Lecturaconversionenergetica();
          $lecturaconversionenergetica->setIdlecturaConversionEnergetica($data[$i]['idlecturaConversionEnergetica']);
          $lecturaconversionenergetica->setFechaLecturaConversionEnergetica($data[$i]['fechaLecturaConversionEnergetica']);
          $lecturaconversionenergetica->setValorLecturaConversionEnergeticacol($data[$i]['valorLecturaConversionEnergeticacol']);
           $metricaconversionenergetica = new Metricaconversionenergetica();
           $metricaconversionenergetica->setIdmetricaConversionEnergetica($data[$i]['metricaConversionEnergetica_idmetricaConversionEnergetica']);
           $lecturaconversionenergetica->setMetricaConversionEnergetica_idmetricaConversionEnergetica($metricaconversionenergetica);

          array_push($lista,$lecturaconversionenergetica);
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