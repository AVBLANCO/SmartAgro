<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Pero el ruiseñor no respondió; yacía muerto sobre las altas hierbas, con el corazón traspasado de espinas.  \\

include_once realpath('../dao/interfaz/IMetricabalancehidricoDao.php');
include_once realpath('../dto/Metricabalancehidrico.php');
include_once realpath('../dto/Balancehidrico.php');

class MetricabalancehidricoDao implements IMetricabalancehidricoDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Metricabalancehidrico en la base de datos.
     * @param metricabalancehidrico objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($metricabalancehidrico){
      $idmetricaBalanceHidrico=$metricabalancehidrico->getIdmetricaBalanceHidrico();
$descripcionMetricaBalanceHidrico=$metricabalancehidrico->getDescripcionMetricaBalanceHidrico();
$balanceHidrico_idbalanceHidrico=$metricabalancehidrico->getBalanceHidrico_idbalanceHidrico()->getIdbalanceHidrico();

      try {
          $sql= "INSERT INTO `metricabalancehidrico`( `idmetricaBalanceHidrico`, `descripcionMetricaBalanceHidrico`, `balanceHidrico_idbalanceHidrico`)"
          ."VALUES ('$idmetricaBalanceHidrico','$descripcionMetricaBalanceHidrico','$balanceHidrico_idbalanceHidrico')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Metricabalancehidrico en la base de datos.
     * @param metricabalancehidrico objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($metricabalancehidrico){
      $idmetricaBalanceHidrico=$metricabalancehidrico->getIdmetricaBalanceHidrico();

      try {
          $sql= "SELECT `idmetricaBalanceHidrico`, `descripcionMetricaBalanceHidrico`, `balanceHidrico_idbalanceHidrico`"
          ."FROM `metricabalancehidrico`"
          ."WHERE `idmetricaBalanceHidrico`='$idmetricaBalanceHidrico'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $metricabalancehidrico->setIdmetricaBalanceHidrico($data[$i]['idmetricaBalanceHidrico']);
          $metricabalancehidrico->setDescripcionMetricaBalanceHidrico($data[$i]['descripcionMetricaBalanceHidrico']);
           $balancehidrico = new Balancehidrico();
           $balancehidrico->setIdbalanceHidrico($data[$i]['balanceHidrico_idbalanceHidrico']);
           $metricabalancehidrico->setBalanceHidrico_idbalanceHidrico($balancehidrico);

          }
      return $metricabalancehidrico;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Metricabalancehidrico en la base de datos.
     * @param metricabalancehidrico objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($metricabalancehidrico){
      $idmetricaBalanceHidrico=$metricabalancehidrico->getIdmetricaBalanceHidrico();
$descripcionMetricaBalanceHidrico=$metricabalancehidrico->getDescripcionMetricaBalanceHidrico();
$balanceHidrico_idbalanceHidrico=$metricabalancehidrico->getBalanceHidrico_idbalanceHidrico()->getIdbalanceHidrico();

      try {
          $sql= "UPDATE `metricabalancehidrico` SET`idmetricaBalanceHidrico`='$idmetricaBalanceHidrico' ,`descripcionMetricaBalanceHidrico`='$descripcionMetricaBalanceHidrico' ,`balanceHidrico_idbalanceHidrico`='$balanceHidrico_idbalanceHidrico' WHERE `idmetricaBalanceHidrico`='$idmetricaBalanceHidrico' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Metricabalancehidrico en la base de datos.
     * @param metricabalancehidrico objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($metricabalancehidrico){
      $idmetricaBalanceHidrico=$metricabalancehidrico->getIdmetricaBalanceHidrico();

      try {
          $sql ="DELETE FROM `metricabalancehidrico` WHERE `idmetricaBalanceHidrico`='$idmetricaBalanceHidrico'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Metricabalancehidrico en la base de datos.
     * @return ArrayList<Metricabalancehidrico> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `idmetricaBalanceHidrico`, `descripcionMetricaBalanceHidrico`, `balanceHidrico_idbalanceHidrico`"
          ."FROM `metricabalancehidrico`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $metricabalancehidrico= new Metricabalancehidrico();
          $metricabalancehidrico->setIdmetricaBalanceHidrico($data[$i]['idmetricaBalanceHidrico']);
          $metricabalancehidrico->setDescripcionMetricaBalanceHidrico($data[$i]['descripcionMetricaBalanceHidrico']);
           $balancehidrico = new Balancehidrico();
           $balancehidrico->setIdbalanceHidrico($data[$i]['balanceHidrico_idbalanceHidrico']);
           $metricabalancehidrico->setBalanceHidrico_idbalanceHidrico($balancehidrico);

          array_push($lista,$metricabalancehidrico);
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