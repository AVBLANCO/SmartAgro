<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Me ayudas con la tesis?  \\

include_once realpath('../dao/interfaz/IQuimicasueloDao.php');
include_once realpath('../dto/Quimicasuelo.php');
include_once realpath('../dto/Suelo.php');

class QuimicasueloDao implements IQuimicasueloDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Quimicasuelo en la base de datos.
     * @param quimicasuelo objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($quimicasuelo){
      $idQuimicaSuelo=$quimicasuelo->getIdQuimicaSuelo();
$descripcionQuimica=$quimicasuelo->getDescripcionQuimica();
$suelo_idsuelo=$quimicasuelo->getSuelo_idsuelo()->getIdsuelo();

      try {
          $sql= "INSERT INTO `quimicasuelo`( `idQuimicaSuelo`, `descripcionQuimica`, `suelo_idsuelo`)"
          ."VALUES ('$idQuimicaSuelo','$descripcionQuimica','$suelo_idsuelo')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Quimicasuelo en la base de datos.
     * @param quimicasuelo objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($quimicasuelo){
      $idQuimicaSuelo=$quimicasuelo->getIdQuimicaSuelo();

      try {
          $sql= "SELECT `idQuimicaSuelo`, `descripcionQuimica`, `suelo_idsuelo`"
          ."FROM `quimicasuelo`"
          ."WHERE `idQuimicaSuelo`='$idQuimicaSuelo'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $quimicasuelo->setIdQuimicaSuelo($data[$i]['idQuimicaSuelo']);
          $quimicasuelo->setDescripcionQuimica($data[$i]['descripcionQuimica']);
           $suelo = new Suelo();
           $suelo->setIdsuelo($data[$i]['suelo_idsuelo']);
           $quimicasuelo->setSuelo_idsuelo($suelo);

          }
      return $quimicasuelo;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Quimicasuelo en la base de datos.
     * @param quimicasuelo objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($quimicasuelo){
      $idQuimicaSuelo=$quimicasuelo->getIdQuimicaSuelo();
$descripcionQuimica=$quimicasuelo->getDescripcionQuimica();
$suelo_idsuelo=$quimicasuelo->getSuelo_idsuelo()->getIdsuelo();

      try {
          $sql= "UPDATE `quimicasuelo` SET`idQuimicaSuelo`='$idQuimicaSuelo' ,`descripcionQuimica`='$descripcionQuimica' ,`suelo_idsuelo`='$suelo_idsuelo' WHERE `idQuimicaSuelo`='$idQuimicaSuelo' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Quimicasuelo en la base de datos.
     * @param quimicasuelo objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($quimicasuelo){
      $idQuimicaSuelo=$quimicasuelo->getIdQuimicaSuelo();

      try {
          $sql ="DELETE FROM `quimicasuelo` WHERE `idQuimicaSuelo`='$idQuimicaSuelo'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Quimicasuelo en la base de datos.
     * @return ArrayList<Quimicasuelo> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `idQuimicaSuelo`, `descripcionQuimica`, `suelo_idsuelo`"
          ."FROM `quimicasuelo`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $quimicasuelo= new Quimicasuelo();
          $quimicasuelo->setIdQuimicaSuelo($data[$i]['idQuimicaSuelo']);
          $quimicasuelo->setDescripcionQuimica($data[$i]['descripcionQuimica']);
           $suelo = new Suelo();
           $suelo->setIdsuelo($data[$i]['suelo_idsuelo']);
           $quimicasuelo->setSuelo_idsuelo($suelo);

          array_push($lista,$quimicasuelo);
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