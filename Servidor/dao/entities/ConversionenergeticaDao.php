<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    La vie est composé de combien de fois nous rions avant de mourir  \\

include_once realpath('../dao/interfaz/IConversionenergeticaDao.php');
include_once realpath('../dto/Conversionenergetica.php');
include_once realpath('../dto/Agroclimatologia.php');

class ConversionenergeticaDao implements IConversionenergeticaDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Conversionenergetica en la base de datos.
     * @param conversionenergetica objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($conversionenergetica){
      $idconversionEnergetica=$conversionenergetica->getIdconversionEnergetica();
$descripcionConversionEnergetica=$conversionenergetica->getDescripcionConversionEnergetica();
$fechaConversionEnergetica=$conversionenergetica->getFechaConversionEnergetica();
$agroclimatologia_idagroclimatologia=$conversionenergetica->getAgroclimatologia_idagroclimatologia()->getIdagroclimatologia();

      try {
          $sql= "INSERT INTO `conversionenergetica`( `idconversionEnergetica`, `descripcionConversionEnergetica`, `fechaConversionEnergetica`, `agroclimatologia_idagroclimatologia`)"
          ."VALUES ('$idconversionEnergetica','$descripcionConversionEnergetica','$fechaConversionEnergetica','$agroclimatologia_idagroclimatologia')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Conversionenergetica en la base de datos.
     * @param conversionenergetica objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($conversionenergetica){
      $idconversionEnergetica=$conversionenergetica->getIdconversionEnergetica();

      try {
          $sql= "SELECT `idconversionEnergetica`, `descripcionConversionEnergetica`, `fechaConversionEnergetica`, `agroclimatologia_idagroclimatologia`"
          ."FROM `conversionenergetica`"
          ."WHERE `idconversionEnergetica`='$idconversionEnergetica'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $conversionenergetica->setIdconversionEnergetica($data[$i]['idconversionEnergetica']);
          $conversionenergetica->setDescripcionConversionEnergetica($data[$i]['descripcionConversionEnergetica']);
          $conversionenergetica->setFechaConversionEnergetica($data[$i]['fechaConversionEnergetica']);
           $agroclimatologia = new Agroclimatologia();
           $agroclimatologia->setIdagroclimatologia($data[$i]['agroclimatologia_idagroclimatologia']);
           $conversionenergetica->setAgroclimatologia_idagroclimatologia($agroclimatologia);

          }
      return $conversionenergetica;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Conversionenergetica en la base de datos.
     * @param conversionenergetica objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($conversionenergetica){
      $idconversionEnergetica=$conversionenergetica->getIdconversionEnergetica();
$descripcionConversionEnergetica=$conversionenergetica->getDescripcionConversionEnergetica();
$fechaConversionEnergetica=$conversionenergetica->getFechaConversionEnergetica();
$agroclimatologia_idagroclimatologia=$conversionenergetica->getAgroclimatologia_idagroclimatologia()->getIdagroclimatologia();

      try {
          $sql= "UPDATE `conversionenergetica` SET`idconversionEnergetica`='$idconversionEnergetica' ,`descripcionConversionEnergetica`='$descripcionConversionEnergetica' ,`fechaConversionEnergetica`='$fechaConversionEnergetica' ,`agroclimatologia_idagroclimatologia`='$agroclimatologia_idagroclimatologia' WHERE `idconversionEnergetica`='$idconversionEnergetica' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Conversionenergetica en la base de datos.
     * @param conversionenergetica objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($conversionenergetica){
      $idconversionEnergetica=$conversionenergetica->getIdconversionEnergetica();

      try {
          $sql ="DELETE FROM `conversionenergetica` WHERE `idconversionEnergetica`='$idconversionEnergetica'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Conversionenergetica en la base de datos.
     * @return ArrayList<Conversionenergetica> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `idconversionEnergetica`, `descripcionConversionEnergetica`, `fechaConversionEnergetica`, `agroclimatologia_idagroclimatologia`"
          ."FROM `conversionenergetica`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $conversionenergetica= new Conversionenergetica();
          $conversionenergetica->setIdconversionEnergetica($data[$i]['idconversionEnergetica']);
          $conversionenergetica->setDescripcionConversionEnergetica($data[$i]['descripcionConversionEnergetica']);
          $conversionenergetica->setFechaConversionEnergetica($data[$i]['fechaConversionEnergetica']);
           $agroclimatologia = new Agroclimatologia();
           $agroclimatologia->setIdagroclimatologia($data[$i]['agroclimatologia_idagroclimatologia']);
           $conversionenergetica->setAgroclimatologia_idagroclimatologia($agroclimatologia);

          array_push($lista,$conversionenergetica);
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