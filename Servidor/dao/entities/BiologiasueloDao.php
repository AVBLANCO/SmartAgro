<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿No es más sencillo hacer todo en el Main?  \\

include_once realpath('../dao/interfaz/IBiologiasueloDao.php');
include_once realpath('../dto/Biologiasuelo.php');
include_once realpath('../dto/Suelo.php');

class BiologiasueloDao implements IBiologiasueloDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Biologiasuelo en la base de datos.
     * @param biologiasuelo objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($biologiasuelo){
      $idbiologiaSuelo=$biologiasuelo->getIdbiologiaSuelo();
$biologiaSuelo=$biologiasuelo->getBiologiaSuelo();
$suelo_idsuelo=$biologiasuelo->getSuelo_idsuelo()->getIdsuelo();

      try {
          $sql= "INSERT INTO `biologiasuelo`( `idbiologiaSuelo`, `biologiaSuelo`, `suelo_idsuelo`)"
          ."VALUES ('$idbiologiaSuelo','$biologiaSuelo','$suelo_idsuelo')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Biologiasuelo en la base de datos.
     * @param biologiasuelo objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($biologiasuelo){
      $idbiologiaSuelo=$biologiasuelo->getIdbiologiaSuelo();

      try {
          $sql= "SELECT `idbiologiaSuelo`, `biologiaSuelo`, `suelo_idsuelo`"
          ."FROM `biologiasuelo`"
          ."WHERE `idbiologiaSuelo`='$idbiologiaSuelo'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $biologiasuelo->setIdbiologiaSuelo($data[$i]['idbiologiaSuelo']);
          $biologiasuelo->setBiologiaSuelo($data[$i]['biologiaSuelo']);
           $suelo = new Suelo();
           $suelo->setIdsuelo($data[$i]['suelo_idsuelo']);
           $biologiasuelo->setSuelo_idsuelo($suelo);

          }
      return $biologiasuelo;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Biologiasuelo en la base de datos.
     * @param biologiasuelo objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($biologiasuelo){
      $idbiologiaSuelo=$biologiasuelo->getIdbiologiaSuelo();
$biologiaSuelo=$biologiasuelo->getBiologiaSuelo();
$suelo_idsuelo=$biologiasuelo->getSuelo_idsuelo()->getIdsuelo();

      try {
          $sql= "UPDATE `biologiasuelo` SET`idbiologiaSuelo`='$idbiologiaSuelo' ,`biologiaSuelo`='$biologiaSuelo' ,`suelo_idsuelo`='$suelo_idsuelo' WHERE `idbiologiaSuelo`='$idbiologiaSuelo' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Biologiasuelo en la base de datos.
     * @param biologiasuelo objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($biologiasuelo){
      $idbiologiaSuelo=$biologiasuelo->getIdbiologiaSuelo();

      try {
          $sql ="DELETE FROM `biologiasuelo` WHERE `idbiologiaSuelo`='$idbiologiaSuelo'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Biologiasuelo en la base de datos.
     * @return ArrayList<Biologiasuelo> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `idbiologiaSuelo`, `biologiaSuelo`, `suelo_idsuelo`"
          ."FROM `biologiasuelo`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $biologiasuelo= new Biologiasuelo();
          $biologiasuelo->setIdbiologiaSuelo($data[$i]['idbiologiaSuelo']);
          $biologiasuelo->setBiologiaSuelo($data[$i]['biologiaSuelo']);
           $suelo = new Suelo();
           $suelo->setIdsuelo($data[$i]['suelo_idsuelo']);
           $biologiasuelo->setSuelo_idsuelo($suelo);

          array_push($lista,$biologiasuelo);
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