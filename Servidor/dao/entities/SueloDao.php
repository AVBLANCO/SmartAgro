<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Traigo una pizza para ¿y se la creyó?  \\

include_once realpath('../dao/interfaz/ISueloDao.php');
include_once realpath('../dto/Suelo.php');
include_once realpath('../dto/Lote.php');

class SueloDao implements ISueloDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Suelo en la base de datos.
     * @param suelo objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($suelo){
      $idsuelo=$suelo->getIdsuelo();
$decripcionSuelo=$suelo->getDecripcionSuelo();
$fechaSuelo=$suelo->getFechaSuelo();
$lote_idlote=$suelo->getLote_idlote()->getIdlote();

      try {
          $sql= "INSERT INTO `suelo`( `idsuelo`, `decripcionSuelo`, `fechaSuelo`, `lote_idlote`)"
          ."VALUES ('$idsuelo','$decripcionSuelo','$fechaSuelo','$lote_idlote')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Suelo en la base de datos.
     * @param suelo objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($suelo){
      $idsuelo=$suelo->getIdsuelo();

      try {
          $sql= "SELECT `idsuelo`, `decripcionSuelo`, `fechaSuelo`, `lote_idlote`"
          ."FROM `suelo`"
          ."WHERE `idsuelo`='$idsuelo'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $suelo->setIdsuelo($data[$i]['idsuelo']);
          $suelo->setDecripcionSuelo($data[$i]['decripcionSuelo']);
          $suelo->setFechaSuelo($data[$i]['fechaSuelo']);
           $lote = new Lote();
           $lote->setIdlote($data[$i]['lote_idlote']);
           $suelo->setLote_idlote($lote);

          }
      return $suelo;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Suelo en la base de datos.
     * @param suelo objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($suelo){
      $idsuelo=$suelo->getIdsuelo();
$decripcionSuelo=$suelo->getDecripcionSuelo();
$fechaSuelo=$suelo->getFechaSuelo();
$lote_idlote=$suelo->getLote_idlote()->getIdlote();

      try {
          $sql= "UPDATE `suelo` SET`idsuelo`='$idsuelo' ,`decripcionSuelo`='$decripcionSuelo' ,`fechaSuelo`='$fechaSuelo' ,`lote_idlote`='$lote_idlote' WHERE `idsuelo`='$idsuelo' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Suelo en la base de datos.
     * @param suelo objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($suelo){
      $idsuelo=$suelo->getIdsuelo();

      try {
          $sql ="DELETE FROM `suelo` WHERE `idsuelo`='$idsuelo'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Suelo en la base de datos.
     * @return ArrayList<Suelo> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `idsuelo`, `decripcionSuelo`, `fechaSuelo`, `lote_idlote`"
          ."FROM `suelo`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $suelo= new Suelo();
          $suelo->setIdsuelo($data[$i]['idsuelo']);
          $suelo->setDecripcionSuelo($data[$i]['decripcionSuelo']);
          $suelo->setFechaSuelo($data[$i]['fechaSuelo']);
           $lote = new Lote();
           $lote->setIdlote($data[$i]['lote_idlote']);
           $suelo->setLote_idlote($lote);

          array_push($lista,$suelo);
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