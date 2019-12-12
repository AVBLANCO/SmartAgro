<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Esta es una frase de prueba ¿Quieres ver la de verdad? ( ͡~ ͜ʖ ͡°)  \\

include_once realpath('../dao/interfaz/IAgroclimatologiaDao.php');
include_once realpath('../dto/Agroclimatologia.php');
include_once realpath('../dto/Lote.php');

class AgroclimatologiaDao implements IAgroclimatologiaDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Agroclimatologia en la base de datos.
     * @param agroclimatologia objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($agroclimatologia){
      $idagroclimatologia=$agroclimatologia->getIdagroclimatologia();
$descripcionAgroclimatologia=$agroclimatologia->getDescripcionAgroclimatologia();
$fechaAgroclimatologia=$agroclimatologia->getFechaAgroclimatologia();
$lote_idlote=$agroclimatologia->getLote_idlote()->getIdlote();

      try {
          $sql= "INSERT INTO `agroclimatologia`( `idagroclimatologia`, `descripcionAgroclimatologia`, `fechaAgroclimatologia`, `lote_idlote`)"
          ."VALUES ('$idagroclimatologia','$descripcionAgroclimatologia','$fechaAgroclimatologia','$lote_idlote')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Agroclimatologia en la base de datos.
     * @param agroclimatologia objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($agroclimatologia){
      $idagroclimatologia=$agroclimatologia->getIdagroclimatologia();

      try {
          $sql= "SELECT `idagroclimatologia`, `descripcionAgroclimatologia`, `fechaAgroclimatologia`, `lote_idlote`"
          ."FROM `agroclimatologia`"
          ."WHERE `idagroclimatologia`='$idagroclimatologia'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $agroclimatologia->setIdagroclimatologia($data[$i]['idagroclimatologia']);
          $agroclimatologia->setDescripcionAgroclimatologia($data[$i]['descripcionAgroclimatologia']);
          $agroclimatologia->setFechaAgroclimatologia($data[$i]['fechaAgroclimatologia']);
           $lote = new Lote();
           $lote->setIdlote($data[$i]['lote_idlote']);
           $agroclimatologia->setLote_idlote($lote);

          }
      return $agroclimatologia;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Agroclimatologia en la base de datos.
     * @param agroclimatologia objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($agroclimatologia){
      $idagroclimatologia=$agroclimatologia->getIdagroclimatologia();
$descripcionAgroclimatologia=$agroclimatologia->getDescripcionAgroclimatologia();
$fechaAgroclimatologia=$agroclimatologia->getFechaAgroclimatologia();
$lote_idlote=$agroclimatologia->getLote_idlote()->getIdlote();

      try {
          $sql= "UPDATE `agroclimatologia` SET`idagroclimatologia`='$idagroclimatologia' ,`descripcionAgroclimatologia`='$descripcionAgroclimatologia' ,`fechaAgroclimatologia`='$fechaAgroclimatologia' ,`lote_idlote`='$lote_idlote' WHERE `idagroclimatologia`='$idagroclimatologia' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Agroclimatologia en la base de datos.
     * @param agroclimatologia objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($agroclimatologia){
      $idagroclimatologia=$agroclimatologia->getIdagroclimatologia();

      try {
          $sql ="DELETE FROM `agroclimatologia` WHERE `idagroclimatologia`='$idagroclimatologia'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Agroclimatologia en la base de datos.
     * @return ArrayList<Agroclimatologia> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `idagroclimatologia`, `descripcionAgroclimatologia`, `fechaAgroclimatologia`, `lote_idlote`"
          ."FROM `agroclimatologia`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $agroclimatologia= new Agroclimatologia();
          $agroclimatologia->setIdagroclimatologia($data[$i]['idagroclimatologia']);
          $agroclimatologia->setDescripcionAgroclimatologia($data[$i]['descripcionAgroclimatologia']);
          $agroclimatologia->setFechaAgroclimatologia($data[$i]['fechaAgroclimatologia']);
           $lote = new Lote();
           $lote->setIdlote($data[$i]['lote_idlote']);
           $agroclimatologia->setLote_idlote($lote);

          array_push($lista,$agroclimatologia);
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