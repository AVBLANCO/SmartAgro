<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Si he visto más lejos es porque estoy sentado sobre los hombros de gigantes.  \\

include_once realpath('../dao/interfaz/IEvotranspiracionDao.php');
include_once realpath('../dto/Evotranspiracion.php');
include_once realpath('../dto/Agroclimatologia.php');

class EvotranspiracionDao implements IEvotranspiracionDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Evotranspiracion en la base de datos.
     * @param evotranspiracion objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($evotranspiracion){
      $idevotranspiracion=$evotranspiracion->getIdevotranspiracion();
$descripcionEvotranspiracion=$evotranspiracion->getDescripcionEvotranspiracion();
$fechaEvotranspiracion=$evotranspiracion->getFechaEvotranspiracion();
$agroclimatologia_idagroclimatologia=$evotranspiracion->getAgroclimatologia_idagroclimatologia()->getIdagroclimatologia();

      try {
          $sql= "INSERT INTO `evotranspiracion`( `idevotranspiracion`, `descripcionEvotranspiracion`, `fechaEvotranspiracion`, `agroclimatologia_idagroclimatologia`)"
          ."VALUES ('$idevotranspiracion','$descripcionEvotranspiracion','$fechaEvotranspiracion','$agroclimatologia_idagroclimatologia')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Evotranspiracion en la base de datos.
     * @param evotranspiracion objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($evotranspiracion){
      $idevotranspiracion=$evotranspiracion->getIdevotranspiracion();

      try {
          $sql= "SELECT `idevotranspiracion`, `descripcionEvotranspiracion`, `fechaEvotranspiracion`, `agroclimatologia_idagroclimatologia`"
          ."FROM `evotranspiracion`"
          ."WHERE `idevotranspiracion`='$idevotranspiracion'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $evotranspiracion->setIdevotranspiracion($data[$i]['idevotranspiracion']);
          $evotranspiracion->setDescripcionEvotranspiracion($data[$i]['descripcionEvotranspiracion']);
          $evotranspiracion->setFechaEvotranspiracion($data[$i]['fechaEvotranspiracion']);
           $agroclimatologia = new Agroclimatologia();
           $agroclimatologia->setIdagroclimatologia($data[$i]['agroclimatologia_idagroclimatologia']);
           $evotranspiracion->setAgroclimatologia_idagroclimatologia($agroclimatologia);

          }
      return $evotranspiracion;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Evotranspiracion en la base de datos.
     * @param evotranspiracion objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($evotranspiracion){
      $idevotranspiracion=$evotranspiracion->getIdevotranspiracion();
$descripcionEvotranspiracion=$evotranspiracion->getDescripcionEvotranspiracion();
$fechaEvotranspiracion=$evotranspiracion->getFechaEvotranspiracion();
$agroclimatologia_idagroclimatologia=$evotranspiracion->getAgroclimatologia_idagroclimatologia()->getIdagroclimatologia();

      try {
          $sql= "UPDATE `evotranspiracion` SET`idevotranspiracion`='$idevotranspiracion' ,`descripcionEvotranspiracion`='$descripcionEvotranspiracion' ,`fechaEvotranspiracion`='$fechaEvotranspiracion' ,`agroclimatologia_idagroclimatologia`='$agroclimatologia_idagroclimatologia' WHERE `idevotranspiracion`='$idevotranspiracion' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Evotranspiracion en la base de datos.
     * @param evotranspiracion objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($evotranspiracion){
      $idevotranspiracion=$evotranspiracion->getIdevotranspiracion();

      try {
          $sql ="DELETE FROM `evotranspiracion` WHERE `idevotranspiracion`='$idevotranspiracion'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Evotranspiracion en la base de datos.
     * @return ArrayList<Evotranspiracion> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `idevotranspiracion`, `descripcionEvotranspiracion`, `fechaEvotranspiracion`, `agroclimatologia_idagroclimatologia`"
          ."FROM `evotranspiracion`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $evotranspiracion= new Evotranspiracion();
          $evotranspiracion->setIdevotranspiracion($data[$i]['idevotranspiracion']);
          $evotranspiracion->setDescripcionEvotranspiracion($data[$i]['descripcionEvotranspiracion']);
          $evotranspiracion->setFechaEvotranspiracion($data[$i]['fechaEvotranspiracion']);
           $agroclimatologia = new Agroclimatologia();
           $agroclimatologia->setIdagroclimatologia($data[$i]['agroclimatologia_idagroclimatologia']);
           $evotranspiracion->setAgroclimatologia_idagroclimatologia($agroclimatologia);

          array_push($lista,$evotranspiracion);
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