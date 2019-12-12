<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Dispongo de doce horas de adelanto, puedo de decárselas a ella  \\

include_once realpath('../dao/interfaz/ILoteDao.php');
include_once realpath('../dto/Lote.php');
include_once realpath('../dto/Finca.php');

class LoteDao implements ILoteDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Lote en la base de datos.
     * @param lote objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($lote){
      $idlote=$lote->getIdlote();
$descripcionLote=$lote->getDescripcionLote();
$longitud=$lote->getLongitud();
$latitud=$lote->getLatitud();
$finca_idfinca=$lote->getFinca_idfinca()->getIdfinca();

      try {
          $sql= "INSERT INTO `lote`( `idlote`, `descripcionLote`, `longitud`, `latitud`, `finca_idfinca`)"
          ."VALUES ('$idlote','$descripcionLote','$longitud','$latitud','$finca_idfinca')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Lote en la base de datos.
     * @param lote objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($lote){
      $idlote=$lote->getIdlote();

      try {
          $sql= "SELECT `idlote`, `descripcionLote`, `longitud`, `latitud`, `finca_idfinca`"
          ."FROM `lote`"
          ."WHERE `idlote`='$idlote'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $lote->setIdlote($data[$i]['idlote']);
          $lote->setDescripcionLote($data[$i]['descripcionLote']);
          $lote->setLongitud($data[$i]['longitud']);
          $lote->setLatitud($data[$i]['latitud']);
           $finca = new Finca();
           $finca->setIdfinca($data[$i]['finca_idfinca']);
           $lote->setFinca_idfinca($finca);

          }
      return $lote;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Lote en la base de datos.
     * @param lote objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($lote){
      $idlote=$lote->getIdlote();
$descripcionLote=$lote->getDescripcionLote();
$longitud=$lote->getLongitud();
$latitud=$lote->getLatitud();
$finca_idfinca=$lote->getFinca_idfinca()->getIdfinca();

      try {
          $sql= "UPDATE `lote` SET`idlote`='$idlote' ,`descripcionLote`='$descripcionLote' ,`longitud`='$longitud' ,`latitud`='$latitud' ,`finca_idfinca`='$finca_idfinca' WHERE `idlote`='$idlote' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Lote en la base de datos.
     * @param lote objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($lote){
      $idlote=$lote->getIdlote();

      try {
          $sql ="DELETE FROM `lote` WHERE `idlote`='$idlote'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Lote en la base de datos.
     * @return ArrayList<Lote> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `idlote`, `descripcionLote`, `longitud`, `latitud`, `finca_idfinca`"
          ."FROM `lote`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $lote= new Lote();
          $lote->setIdlote($data[$i]['idlote']);
          $lote->setDescripcionLote($data[$i]['descripcionLote']);
          $lote->setLongitud($data[$i]['longitud']);
          $lote->setLatitud($data[$i]['latitud']);
           $finca = new Finca();
           $finca->setIdfinca($data[$i]['finca_idfinca']);
           $lote->setFinca_idfinca($finca);

          array_push($lista,$lote);
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