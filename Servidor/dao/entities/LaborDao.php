<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Somos los amish del software  \\

include_once realpath('../dao/interfaz/ILaborDao.php');
include_once realpath('../dto/Labor.php');
include_once realpath('../dto/Miagroempresa.php');

class LaborDao implements ILaborDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Labor en la base de datos.
     * @param labor objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($labor){
      $idlabor=$labor->getIdlabor();
$descripcionLabor=$labor->getDescripcionLabor();
$duracionLabor=$labor->getDuracionLabor();
$miAgroempresa_idmiAgroempresa=$labor->getMiAgroempresa_idmiAgroempresa()->getIdmiAgroempresa();

      try {
          $sql= "INSERT INTO `labor`( `idlabor`, `descripcionLabor`, `duracionLabor`, `miAgroempresa_idmiAgroempresa`)"
          ."VALUES ('$idlabor','$descripcionLabor','$duracionLabor','$miAgroempresa_idmiAgroempresa')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Labor en la base de datos.
     * @param labor objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($labor){
      $idlabor=$labor->getIdlabor();

      try {
          $sql= "SELECT `idlabor`, `descripcionLabor`, `duracionLabor`, `miAgroempresa_idmiAgroempresa`"
          ."FROM `labor`"
          ."WHERE `idlabor`='$idlabor'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $labor->setIdlabor($data[$i]['idlabor']);
          $labor->setDescripcionLabor($data[$i]['descripcionLabor']);
          $labor->setDuracionLabor($data[$i]['duracionLabor']);
           $miagroempresa = new Miagroempresa();
           $miagroempresa->setIdmiAgroempresa($data[$i]['miAgroempresa_idmiAgroempresa']);
           $labor->setMiAgroempresa_idmiAgroempresa($miagroempresa);

          }
      return $labor;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Labor en la base de datos.
     * @param labor objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($labor){
      $idlabor=$labor->getIdlabor();
$descripcionLabor=$labor->getDescripcionLabor();
$duracionLabor=$labor->getDuracionLabor();
$miAgroempresa_idmiAgroempresa=$labor->getMiAgroempresa_idmiAgroempresa()->getIdmiAgroempresa();

      try {
          $sql= "UPDATE `labor` SET`idlabor`='$idlabor' ,`descripcionLabor`='$descripcionLabor' ,`duracionLabor`='$duracionLabor' ,`miAgroempresa_idmiAgroempresa`='$miAgroempresa_idmiAgroempresa' WHERE `idlabor`='$idlabor' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Labor en la base de datos.
     * @param labor objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($labor){
      $idlabor=$labor->getIdlabor();

      try {
          $sql ="DELETE FROM `labor` WHERE `idlabor`='$idlabor'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Labor en la base de datos.
     * @return ArrayList<Labor> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `idlabor`, `descripcionLabor`, `duracionLabor`, `miAgroempresa_idmiAgroempresa`"
          ."FROM `labor`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $labor= new Labor();
          $labor->setIdlabor($data[$i]['idlabor']);
          $labor->setDescripcionLabor($data[$i]['descripcionLabor']);
          $labor->setDuracionLabor($data[$i]['duracionLabor']);
           $miagroempresa = new Miagroempresa();
           $miagroempresa->setIdmiAgroempresa($data[$i]['miAgroempresa_idmiAgroempresa']);
           $labor->setMiAgroempresa_idmiAgroempresa($miagroempresa);

          array_push($lista,$labor);
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