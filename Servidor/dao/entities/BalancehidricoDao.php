<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Ya están los patrones implementados, ahora sí viene lo chido...  \\

include_once realpath('../dao/interfaz/IBalancehidricoDao.php');
include_once realpath('../dto/Balancehidrico.php');
include_once realpath('../dto/Agroclimatologia.php');

class BalancehidricoDao implements IBalancehidricoDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Balancehidrico en la base de datos.
     * @param balancehidrico objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($balancehidrico){
      $idbalanceHidrico=$balancehidrico->getIdbalanceHidrico();
$descripcioBalanceHidricocol=$balancehidrico->getDescripcioBalanceHidricocol();
$fechabalanceHidrico=$balancehidrico->getFechabalanceHidrico();
$agroclimatologia_idagroclimatologia=$balancehidrico->getAgroclimatologia_idagroclimatologia()->getIdagroclimatologia();

      try {
          $sql= "INSERT INTO `balancehidrico`( `idbalanceHidrico`, `descripcioBalanceHidricocol`, `fechabalanceHidrico`, `agroclimatologia_idagroclimatologia`)"
          ."VALUES ('$idbalanceHidrico','$descripcioBalanceHidricocol','$fechabalanceHidrico','$agroclimatologia_idagroclimatologia')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Balancehidrico en la base de datos.
     * @param balancehidrico objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($balancehidrico){
      $idbalanceHidrico=$balancehidrico->getIdbalanceHidrico();

      try {
          $sql= "SELECT `idbalanceHidrico`, `descripcioBalanceHidricocol`, `fechabalanceHidrico`, `agroclimatologia_idagroclimatologia`"
          ."FROM `balancehidrico`"
          ."WHERE `idbalanceHidrico`='$idbalanceHidrico'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $balancehidrico->setIdbalanceHidrico($data[$i]['idbalanceHidrico']);
          $balancehidrico->setDescripcioBalanceHidricocol($data[$i]['descripcioBalanceHidricocol']);
          $balancehidrico->setFechabalanceHidrico($data[$i]['fechabalanceHidrico']);
           $agroclimatologia = new Agroclimatologia();
           $agroclimatologia->setIdagroclimatologia($data[$i]['agroclimatologia_idagroclimatologia']);
           $balancehidrico->setAgroclimatologia_idagroclimatologia($agroclimatologia);

          }
      return $balancehidrico;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Balancehidrico en la base de datos.
     * @param balancehidrico objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($balancehidrico){
      $idbalanceHidrico=$balancehidrico->getIdbalanceHidrico();
$descripcioBalanceHidricocol=$balancehidrico->getDescripcioBalanceHidricocol();
$fechabalanceHidrico=$balancehidrico->getFechabalanceHidrico();
$agroclimatologia_idagroclimatologia=$balancehidrico->getAgroclimatologia_idagroclimatologia()->getIdagroclimatologia();

      try {
          $sql= "UPDATE `balancehidrico` SET`idbalanceHidrico`='$idbalanceHidrico' ,`descripcioBalanceHidricocol`='$descripcioBalanceHidricocol' ,`fechabalanceHidrico`='$fechabalanceHidrico' ,`agroclimatologia_idagroclimatologia`='$agroclimatologia_idagroclimatologia' WHERE `idbalanceHidrico`='$idbalanceHidrico' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Balancehidrico en la base de datos.
     * @param balancehidrico objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($balancehidrico){
      $idbalanceHidrico=$balancehidrico->getIdbalanceHidrico();

      try {
          $sql ="DELETE FROM `balancehidrico` WHERE `idbalanceHidrico`='$idbalanceHidrico'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Balancehidrico en la base de datos.
     * @return ArrayList<Balancehidrico> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `idbalanceHidrico`, `descripcioBalanceHidricocol`, `fechabalanceHidrico`, `agroclimatologia_idagroclimatologia`"
          ."FROM `balancehidrico`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $balancehidrico= new Balancehidrico();
          $balancehidrico->setIdbalanceHidrico($data[$i]['idbalanceHidrico']);
          $balancehidrico->setDescripcioBalanceHidricocol($data[$i]['descripcioBalanceHidricocol']);
          $balancehidrico->setFechabalanceHidrico($data[$i]['fechabalanceHidrico']);
           $agroclimatologia = new Agroclimatologia();
           $agroclimatologia->setIdagroclimatologia($data[$i]['agroclimatologia_idagroclimatologia']);
           $balancehidrico->setAgroclimatologia_idagroclimatologia($agroclimatologia);

          array_push($lista,$balancehidrico);
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