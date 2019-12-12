<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¡Alza el puño y ven! ¡En la hoguera hay de beber!  \\

include_once realpath('../dao/interfaz/IMiagroempresaDao.php');
include_once realpath('../dto/Miagroempresa.php');
include_once realpath('../dto/Lote.php');

class MiagroempresaDao implements IMiagroempresaDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Miagroempresa en la base de datos.
     * @param miagroempresa objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($miagroempresa){
      $idmiAgroempresa=$miagroempresa->getIdmiAgroempresa();
$descipcionMiAgroempresa=$miagroempresa->getDescipcionMiAgroempresa();
$lote_idlote=$miagroempresa->getLote_idlote()->getIdlote();

      try {
          $sql= "INSERT INTO `miagroempresa`( `idmiAgroempresa`, `descipcionMiAgroempresa`, `lote_idlote`)"
          ."VALUES ('$idmiAgroempresa','$descipcionMiAgroempresa','$lote_idlote')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Miagroempresa en la base de datos.
     * @param miagroempresa objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($miagroempresa){
      $idmiAgroempresa=$miagroempresa->getIdmiAgroempresa();

      try {
          $sql= "SELECT `idmiAgroempresa`, `descipcionMiAgroempresa`, `lote_idlote`"
          ."FROM `miagroempresa`"
          ."WHERE `idmiAgroempresa`='$idmiAgroempresa'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $miagroempresa->setIdmiAgroempresa($data[$i]['idmiAgroempresa']);
          $miagroempresa->setDescipcionMiAgroempresa($data[$i]['descipcionMiAgroempresa']);
           $lote = new Lote();
           $lote->setIdlote($data[$i]['lote_idlote']);
           $miagroempresa->setLote_idlote($lote);

          }
      return $miagroempresa;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Miagroempresa en la base de datos.
     * @param miagroempresa objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($miagroempresa){
      $idmiAgroempresa=$miagroempresa->getIdmiAgroempresa();
$descipcionMiAgroempresa=$miagroempresa->getDescipcionMiAgroempresa();
$lote_idlote=$miagroempresa->getLote_idlote()->getIdlote();

      try {
          $sql= "UPDATE `miagroempresa` SET`idmiAgroempresa`='$idmiAgroempresa' ,`descipcionMiAgroempresa`='$descipcionMiAgroempresa' ,`lote_idlote`='$lote_idlote' WHERE `idmiAgroempresa`='$idmiAgroempresa' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Miagroempresa en la base de datos.
     * @param miagroempresa objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($miagroempresa){
      $idmiAgroempresa=$miagroempresa->getIdmiAgroempresa();

      try {
          $sql ="DELETE FROM `miagroempresa` WHERE `idmiAgroempresa`='$idmiAgroempresa'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Miagroempresa en la base de datos.
     * @return ArrayList<Miagroempresa> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `idmiAgroempresa`, `descipcionMiAgroempresa`, `lote_idlote`"
          ."FROM `miagroempresa`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $miagroempresa= new Miagroempresa();
          $miagroempresa->setIdmiAgroempresa($data[$i]['idmiAgroempresa']);
          $miagroempresa->setDescipcionMiAgroempresa($data[$i]['descipcionMiAgroempresa']);
           $lote = new Lote();
           $lote->setIdlote($data[$i]['lote_idlote']);
           $miagroempresa->setLote_idlote($lote);

          array_push($lista,$miagroempresa);
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