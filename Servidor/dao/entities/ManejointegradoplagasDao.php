<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    gravitaban alrededor del astro de la noche, y por primera vez podía la vista penetrar todos sus misterios.  \\

include_once realpath('../dao/interfaz/IManejointegradoplagasDao.php');
include_once realpath('../dto/Manejointegradoplagas.php');
include_once realpath('../dto/Mipe.php');

class ManejointegradoplagasDao implements IManejointegradoplagasDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Manejointegradoplagas en la base de datos.
     * @param manejointegradoplagas objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($manejointegradoplagas){
      $idmanejoIntegradoPlagas=$manejointegradoplagas->getIdmanejoIntegradoPlagas();
$descricionManejoIntegradoPlagas=$manejointegradoplagas->getDescricionManejoIntegradoPlagas();
$mipe_idmipe=$manejointegradoplagas->getMipe_idmipe()->getIdmipe();

      try {
          $sql= "INSERT INTO `manejointegradoplagas`( `idmanejoIntegradoPlagas`, `descricionManejoIntegradoPlagas`, `mipe_idmipe`)"
          ."VALUES ('$idmanejoIntegradoPlagas','$descricionManejoIntegradoPlagas','$mipe_idmipe')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Manejointegradoplagas en la base de datos.
     * @param manejointegradoplagas objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($manejointegradoplagas){
      $idmanejoIntegradoPlagas=$manejointegradoplagas->getIdmanejoIntegradoPlagas();

      try {
          $sql= "SELECT `idmanejoIntegradoPlagas`, `descricionManejoIntegradoPlagas`, `mipe_idmipe`"
          ."FROM `manejointegradoplagas`"
          ."WHERE `idmanejoIntegradoPlagas`='$idmanejoIntegradoPlagas'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $manejointegradoplagas->setIdmanejoIntegradoPlagas($data[$i]['idmanejoIntegradoPlagas']);
          $manejointegradoplagas->setDescricionManejoIntegradoPlagas($data[$i]['descricionManejoIntegradoPlagas']);
           $mipe = new Mipe();
           $mipe->setIdmipe($data[$i]['mipe_idmipe']);
           $manejointegradoplagas->setMipe_idmipe($mipe);

          }
      return $manejointegradoplagas;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Manejointegradoplagas en la base de datos.
     * @param manejointegradoplagas objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($manejointegradoplagas){
      $idmanejoIntegradoPlagas=$manejointegradoplagas->getIdmanejoIntegradoPlagas();
$descricionManejoIntegradoPlagas=$manejointegradoplagas->getDescricionManejoIntegradoPlagas();
$mipe_idmipe=$manejointegradoplagas->getMipe_idmipe()->getIdmipe();

      try {
          $sql= "UPDATE `manejointegradoplagas` SET`idmanejoIntegradoPlagas`='$idmanejoIntegradoPlagas' ,`descricionManejoIntegradoPlagas`='$descricionManejoIntegradoPlagas' ,`mipe_idmipe`='$mipe_idmipe' WHERE `idmanejoIntegradoPlagas`='$idmanejoIntegradoPlagas' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Manejointegradoplagas en la base de datos.
     * @param manejointegradoplagas objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($manejointegradoplagas){
      $idmanejoIntegradoPlagas=$manejointegradoplagas->getIdmanejoIntegradoPlagas();

      try {
          $sql ="DELETE FROM `manejointegradoplagas` WHERE `idmanejoIntegradoPlagas`='$idmanejoIntegradoPlagas'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Manejointegradoplagas en la base de datos.
     * @return ArrayList<Manejointegradoplagas> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `idmanejoIntegradoPlagas`, `descricionManejoIntegradoPlagas`, `mipe_idmipe`"
          ."FROM `manejointegradoplagas`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $manejointegradoplagas= new Manejointegradoplagas();
          $manejointegradoplagas->setIdmanejoIntegradoPlagas($data[$i]['idmanejoIntegradoPlagas']);
          $manejointegradoplagas->setDescricionManejoIntegradoPlagas($data[$i]['descricionManejoIntegradoPlagas']);
           $mipe = new Mipe();
           $mipe->setIdmipe($data[$i]['mipe_idmipe']);
           $manejointegradoplagas->setMipe_idmipe($mipe);

          array_push($lista,$manejointegradoplagas);
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