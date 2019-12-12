<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ...Y como plato principal: ¡Código espagueti!  \\

include_once realpath('../dao/interfaz/IFisicasueloDao.php');
include_once realpath('../dto/Fisicasuelo.php');
include_once realpath('../dto/Suelo.php');

class FisicasueloDao implements IFisicasueloDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Fisicasuelo en la base de datos.
     * @param fisicasuelo objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($fisicasuelo){
      $idfisicaSuelo=$fisicasuelo->getIdfisicaSuelo();
$decscricionfisicaSuelo=$fisicasuelo->getDecscricionfisicaSuelo();
$suelo_idsuelo=$fisicasuelo->getSuelo_idsuelo()->getIdsuelo();

      try {
          $sql= "INSERT INTO `fisicasuelo`( `idfisicaSuelo`, `decscricionfisicaSuelo`, `suelo_idsuelo`)"
          ."VALUES ('$idfisicaSuelo','$decscricionfisicaSuelo','$suelo_idsuelo')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Fisicasuelo en la base de datos.
     * @param fisicasuelo objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($fisicasuelo){
      $idfisicaSuelo=$fisicasuelo->getIdfisicaSuelo();

      try {
          $sql= "SELECT `idfisicaSuelo`, `decscricionfisicaSuelo`, `suelo_idsuelo`"
          ."FROM `fisicasuelo`"
          ."WHERE `idfisicaSuelo`='$idfisicaSuelo'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $fisicasuelo->setIdfisicaSuelo($data[$i]['idfisicaSuelo']);
          $fisicasuelo->setDecscricionfisicaSuelo($data[$i]['decscricionfisicaSuelo']);
           $suelo = new Suelo();
           $suelo->setIdsuelo($data[$i]['suelo_idsuelo']);
           $fisicasuelo->setSuelo_idsuelo($suelo);

          }
      return $fisicasuelo;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Fisicasuelo en la base de datos.
     * @param fisicasuelo objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($fisicasuelo){
      $idfisicaSuelo=$fisicasuelo->getIdfisicaSuelo();
$decscricionfisicaSuelo=$fisicasuelo->getDecscricionfisicaSuelo();
$suelo_idsuelo=$fisicasuelo->getSuelo_idsuelo()->getIdsuelo();

      try {
          $sql= "UPDATE `fisicasuelo` SET`idfisicaSuelo`='$idfisicaSuelo' ,`decscricionfisicaSuelo`='$decscricionfisicaSuelo' ,`suelo_idsuelo`='$suelo_idsuelo' WHERE `idfisicaSuelo`='$idfisicaSuelo' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Fisicasuelo en la base de datos.
     * @param fisicasuelo objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($fisicasuelo){
      $idfisicaSuelo=$fisicasuelo->getIdfisicaSuelo();

      try {
          $sql ="DELETE FROM `fisicasuelo` WHERE `idfisicaSuelo`='$idfisicaSuelo'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Fisicasuelo en la base de datos.
     * @return ArrayList<Fisicasuelo> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `idfisicaSuelo`, `decscricionfisicaSuelo`, `suelo_idsuelo`"
          ."FROM `fisicasuelo`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $fisicasuelo= new Fisicasuelo();
          $fisicasuelo->setIdfisicaSuelo($data[$i]['idfisicaSuelo']);
          $fisicasuelo->setDecscricionfisicaSuelo($data[$i]['decscricionfisicaSuelo']);
           $suelo = new Suelo();
           $suelo->setIdsuelo($data[$i]['suelo_idsuelo']);
           $fisicasuelo->setSuelo_idsuelo($suelo);

          array_push($lista,$fisicasuelo);
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