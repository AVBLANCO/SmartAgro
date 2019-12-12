<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Vva 'l doro  \\

include_once realpath('../dao/interfaz/IMipeDao.php');
include_once realpath('../dto/Mipe.php');
include_once realpath('../dto/Lote.php');

class MipeDao implements IMipeDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Mipe en la base de datos.
     * @param mipe objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($mipe){
      $idmipe=$mipe->getIdmipe();
$decripcionMipe=$mipe->getDecripcionMipe();
$fechaMipe=$mipe->getFechaMipe();
$lote_idlote=$mipe->getLote_idlote()->getIdlote();

      try {
          $sql= "INSERT INTO `mipe`( `idmipe`, `decripcionMipe`, `fechaMipe`, `lote_idlote`)"
          ."VALUES ('$idmipe','$decripcionMipe','$fechaMipe','$lote_idlote')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Mipe en la base de datos.
     * @param mipe objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($mipe){
      $idmipe=$mipe->getIdmipe();

      try {
          $sql= "SELECT `idmipe`, `decripcionMipe`, `fechaMipe`, `lote_idlote`"
          ."FROM `mipe`"
          ."WHERE `idmipe`='$idmipe'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $mipe->setIdmipe($data[$i]['idmipe']);
          $mipe->setDecripcionMipe($data[$i]['decripcionMipe']);
          $mipe->setFechaMipe($data[$i]['fechaMipe']);
           $lote = new Lote();
           $lote->setIdlote($data[$i]['lote_idlote']);
           $mipe->setLote_idlote($lote);

          }
      return $mipe;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Mipe en la base de datos.
     * @param mipe objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($mipe){
      $idmipe=$mipe->getIdmipe();
$decripcionMipe=$mipe->getDecripcionMipe();
$fechaMipe=$mipe->getFechaMipe();
$lote_idlote=$mipe->getLote_idlote()->getIdlote();

      try {
          $sql= "UPDATE `mipe` SET`idmipe`='$idmipe' ,`decripcionMipe`='$decripcionMipe' ,`fechaMipe`='$fechaMipe' ,`lote_idlote`='$lote_idlote' WHERE `idmipe`='$idmipe' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Mipe en la base de datos.
     * @param mipe objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($mipe){
      $idmipe=$mipe->getIdmipe();

      try {
          $sql ="DELETE FROM `mipe` WHERE `idmipe`='$idmipe'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Mipe en la base de datos.
     * @return ArrayList<Mipe> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `idmipe`, `decripcionMipe`, `fechaMipe`, `lote_idlote`"
          ."FROM `mipe`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $mipe= new Mipe();
          $mipe->setIdmipe($data[$i]['idmipe']);
          $mipe->setDecripcionMipe($data[$i]['decripcionMipe']);
          $mipe->setFechaMipe($data[$i]['fechaMipe']);
           $lote = new Lote();
           $lote->setIdlote($data[$i]['lote_idlote']);
           $mipe->setLote_idlote($lote);

          array_push($lista,$mipe);
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