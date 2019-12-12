<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ...y esta no es la única frase que encontrarás...  \\

include_once realpath('../dao/interfaz/IManejointegradoenfermedadesDao.php');
include_once realpath('../dto/Manejointegradoenfermedades.php');
include_once realpath('../dto/Mipe.php');

class ManejointegradoenfermedadesDao implements IManejointegradoenfermedadesDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Manejointegradoenfermedades en la base de datos.
     * @param manejointegradoenfermedades objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($manejointegradoenfermedades){
      $idmanejoIntegradoEnfermedades=$manejointegradoenfermedades->getIdmanejoIntegradoEnfermedades();
$descripcioManejoIntegradoEnfermedades=$manejointegradoenfermedades->getDescripcioManejoIntegradoEnfermedades();
$mipe_idmipe=$manejointegradoenfermedades->getMipe_idmipe()->getIdmipe();

      try {
          $sql= "INSERT INTO `manejointegradoenfermedades`( `idmanejoIntegradoEnfermedades`, `descripcioManejoIntegradoEnfermedades`, `mipe_idmipe`)"
          ."VALUES ('$idmanejoIntegradoEnfermedades','$descripcioManejoIntegradoEnfermedades','$mipe_idmipe')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Manejointegradoenfermedades en la base de datos.
     * @param manejointegradoenfermedades objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($manejointegradoenfermedades){
      $idmanejoIntegradoEnfermedades=$manejointegradoenfermedades->getIdmanejoIntegradoEnfermedades();

      try {
          $sql= "SELECT `idmanejoIntegradoEnfermedades`, `descripcioManejoIntegradoEnfermedades`, `mipe_idmipe`"
          ."FROM `manejointegradoenfermedades`"
          ."WHERE `idmanejoIntegradoEnfermedades`='$idmanejoIntegradoEnfermedades'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $manejointegradoenfermedades->setIdmanejoIntegradoEnfermedades($data[$i]['idmanejoIntegradoEnfermedades']);
          $manejointegradoenfermedades->setDescripcioManejoIntegradoEnfermedades($data[$i]['descripcioManejoIntegradoEnfermedades']);
           $mipe = new Mipe();
           $mipe->setIdmipe($data[$i]['mipe_idmipe']);
           $manejointegradoenfermedades->setMipe_idmipe($mipe);

          }
      return $manejointegradoenfermedades;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Manejointegradoenfermedades en la base de datos.
     * @param manejointegradoenfermedades objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($manejointegradoenfermedades){
      $idmanejoIntegradoEnfermedades=$manejointegradoenfermedades->getIdmanejoIntegradoEnfermedades();
$descripcioManejoIntegradoEnfermedades=$manejointegradoenfermedades->getDescripcioManejoIntegradoEnfermedades();
$mipe_idmipe=$manejointegradoenfermedades->getMipe_idmipe()->getIdmipe();

      try {
          $sql= "UPDATE `manejointegradoenfermedades` SET`idmanejoIntegradoEnfermedades`='$idmanejoIntegradoEnfermedades' ,`descripcioManejoIntegradoEnfermedades`='$descripcioManejoIntegradoEnfermedades' ,`mipe_idmipe`='$mipe_idmipe' WHERE `idmanejoIntegradoEnfermedades`='$idmanejoIntegradoEnfermedades' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Manejointegradoenfermedades en la base de datos.
     * @param manejointegradoenfermedades objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($manejointegradoenfermedades){
      $idmanejoIntegradoEnfermedades=$manejointegradoenfermedades->getIdmanejoIntegradoEnfermedades();

      try {
          $sql ="DELETE FROM `manejointegradoenfermedades` WHERE `idmanejoIntegradoEnfermedades`='$idmanejoIntegradoEnfermedades'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Manejointegradoenfermedades en la base de datos.
     * @return ArrayList<Manejointegradoenfermedades> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `idmanejoIntegradoEnfermedades`, `descripcioManejoIntegradoEnfermedades`, `mipe_idmipe`"
          ."FROM `manejointegradoenfermedades`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $manejointegradoenfermedades= new Manejointegradoenfermedades();
          $manejointegradoenfermedades->setIdmanejoIntegradoEnfermedades($data[$i]['idmanejoIntegradoEnfermedades']);
          $manejointegradoenfermedades->setDescripcioManejoIntegradoEnfermedades($data[$i]['descripcioManejoIntegradoEnfermedades']);
           $mipe = new Mipe();
           $mipe->setIdmipe($data[$i]['mipe_idmipe']);
           $manejointegradoenfermedades->setMipe_idmipe($mipe);

          array_push($lista,$manejointegradoenfermedades);
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