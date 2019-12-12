<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Sabías que hay una vida afuera de tu cuarto?  \\

include_once realpath('../dao/interfaz/ILecturabalancehidricoDao.php');
include_once realpath('../dto/Lecturabalancehidrico.php');
include_once realpath('../dto/Metricabalancehidrico.php');

class LecturabalancehidricoDao implements ILecturabalancehidricoDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Lecturabalancehidrico en la base de datos.
     * @param lecturabalancehidrico objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($lecturabalancehidrico){
      $idlecturaBalanceHidrico=$lecturabalancehidrico->getIdlecturaBalanceHidrico();
$fechaLecturaBalanceHidrico=$lecturabalancehidrico->getFechaLecturaBalanceHidrico();
$valorLecturaBalanceHidrico=$lecturabalancehidrico->getValorLecturaBalanceHidrico();
$metricaBalanceHidrico_idmetricaBalanceHidrico=$lecturabalancehidrico->getMetricaBalanceHidrico_idmetricaBalanceHidrico()->getIdmetricaBalanceHidrico();

      try {
          $sql= "INSERT INTO `lecturabalancehidrico`( `idlecturaBalanceHidrico`, `fechaLecturaBalanceHidrico`, `valorLecturaBalanceHidrico`, `metricaBalanceHidrico_idmetricaBalanceHidrico`)"
          ."VALUES ('$idlecturaBalanceHidrico','$fechaLecturaBalanceHidrico','$valorLecturaBalanceHidrico','$metricaBalanceHidrico_idmetricaBalanceHidrico')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Lecturabalancehidrico en la base de datos.
     * @param lecturabalancehidrico objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($lecturabalancehidrico){
      $idlecturaBalanceHidrico=$lecturabalancehidrico->getIdlecturaBalanceHidrico();

      try {
          $sql= "SELECT `idlecturaBalanceHidrico`, `fechaLecturaBalanceHidrico`, `valorLecturaBalanceHidrico`, `metricaBalanceHidrico_idmetricaBalanceHidrico`"
          ."FROM `lecturabalancehidrico`"
          ."WHERE `idlecturaBalanceHidrico`='$idlecturaBalanceHidrico'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $lecturabalancehidrico->setIdlecturaBalanceHidrico($data[$i]['idlecturaBalanceHidrico']);
          $lecturabalancehidrico->setFechaLecturaBalanceHidrico($data[$i]['fechaLecturaBalanceHidrico']);
          $lecturabalancehidrico->setValorLecturaBalanceHidrico($data[$i]['valorLecturaBalanceHidrico']);
           $metricabalancehidrico = new Metricabalancehidrico();
           $metricabalancehidrico->setIdmetricaBalanceHidrico($data[$i]['metricaBalanceHidrico_idmetricaBalanceHidrico']);
           $lecturabalancehidrico->setMetricaBalanceHidrico_idmetricaBalanceHidrico($metricabalancehidrico);

          }
      return $lecturabalancehidrico;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Lecturabalancehidrico en la base de datos.
     * @param lecturabalancehidrico objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($lecturabalancehidrico){
      $idlecturaBalanceHidrico=$lecturabalancehidrico->getIdlecturaBalanceHidrico();
$fechaLecturaBalanceHidrico=$lecturabalancehidrico->getFechaLecturaBalanceHidrico();
$valorLecturaBalanceHidrico=$lecturabalancehidrico->getValorLecturaBalanceHidrico();
$metricaBalanceHidrico_idmetricaBalanceHidrico=$lecturabalancehidrico->getMetricaBalanceHidrico_idmetricaBalanceHidrico()->getIdmetricaBalanceHidrico();

      try {
          $sql= "UPDATE `lecturabalancehidrico` SET`idlecturaBalanceHidrico`='$idlecturaBalanceHidrico' ,`fechaLecturaBalanceHidrico`='$fechaLecturaBalanceHidrico' ,`valorLecturaBalanceHidrico`='$valorLecturaBalanceHidrico' ,`metricaBalanceHidrico_idmetricaBalanceHidrico`='$metricaBalanceHidrico_idmetricaBalanceHidrico' WHERE `idlecturaBalanceHidrico`='$idlecturaBalanceHidrico' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Lecturabalancehidrico en la base de datos.
     * @param lecturabalancehidrico objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($lecturabalancehidrico){
      $idlecturaBalanceHidrico=$lecturabalancehidrico->getIdlecturaBalanceHidrico();

      try {
          $sql ="DELETE FROM `lecturabalancehidrico` WHERE `idlecturaBalanceHidrico`='$idlecturaBalanceHidrico'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Lecturabalancehidrico en la base de datos.
     * @return ArrayList<Lecturabalancehidrico> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `idlecturaBalanceHidrico`, `fechaLecturaBalanceHidrico`, `valorLecturaBalanceHidrico`, `metricaBalanceHidrico_idmetricaBalanceHidrico`"
          ."FROM `lecturabalancehidrico`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $lecturabalancehidrico= new Lecturabalancehidrico();
          $lecturabalancehidrico->setIdlecturaBalanceHidrico($data[$i]['idlecturaBalanceHidrico']);
          $lecturabalancehidrico->setFechaLecturaBalanceHidrico($data[$i]['fechaLecturaBalanceHidrico']);
          $lecturabalancehidrico->setValorLecturaBalanceHidrico($data[$i]['valorLecturaBalanceHidrico']);
           $metricabalancehidrico = new Metricabalancehidrico();
           $metricabalancehidrico->setIdmetricaBalanceHidrico($data[$i]['metricaBalanceHidrico_idmetricaBalanceHidrico']);
           $lecturabalancehidrico->setMetricaBalanceHidrico_idmetricaBalanceHidrico($metricabalancehidrico);

          array_push($lista,$lecturabalancehidrico);
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