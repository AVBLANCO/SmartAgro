<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    En esto paso mis sábados en la noche ( ¬.¬)  \\

include_once realpath('../dao/interfaz/IMetaDao.php');
include_once realpath('../dto/Meta.php');
include_once realpath('../dto/Proyeccion.php');

class MetaDao implements IMetaDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Meta en la base de datos.
     * @param meta objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($meta){
      $idmeta=$meta->getIdmeta();
$descripcionMeta=$meta->getDescripcionMeta();
$valorMeta=$meta->getValorMeta();
$proyeccion_idproyeccion=$meta->getProyeccion_idproyeccion()->getIdproyeccion();

      try {
          $sql= "INSERT INTO `meta`( `idmeta`, `descripcionMeta`, `valorMeta`, `proyeccion_idproyeccion`)"
          ."VALUES ('$idmeta','$descripcionMeta','$valorMeta','$proyeccion_idproyeccion')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Meta en la base de datos.
     * @param meta objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($meta){
      $idmeta=$meta->getIdmeta();

      try {
          $sql= "SELECT `idmeta`, `descripcionMeta`, `valorMeta`, `proyeccion_idproyeccion`"
          ."FROM `meta`"
          ."WHERE `idmeta`='$idmeta'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $meta->setIdmeta($data[$i]['idmeta']);
          $meta->setDescripcionMeta($data[$i]['descripcionMeta']);
          $meta->setValorMeta($data[$i]['valorMeta']);
           $proyeccion = new Proyeccion();
           $proyeccion->setIdproyeccion($data[$i]['proyeccion_idproyeccion']);
           $meta->setProyeccion_idproyeccion($proyeccion);

          }
      return $meta;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Meta en la base de datos.
     * @param meta objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($meta){
      $idmeta=$meta->getIdmeta();
$descripcionMeta=$meta->getDescripcionMeta();
$valorMeta=$meta->getValorMeta();
$proyeccion_idproyeccion=$meta->getProyeccion_idproyeccion()->getIdproyeccion();

      try {
          $sql= "UPDATE `meta` SET`idmeta`='$idmeta' ,`descripcionMeta`='$descripcionMeta' ,`valorMeta`='$valorMeta' ,`proyeccion_idproyeccion`='$proyeccion_idproyeccion' WHERE `idmeta`='$idmeta' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Meta en la base de datos.
     * @param meta objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($meta){
      $idmeta=$meta->getIdmeta();

      try {
          $sql ="DELETE FROM `meta` WHERE `idmeta`='$idmeta'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Meta en la base de datos.
     * @return ArrayList<Meta> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `idmeta`, `descripcionMeta`, `valorMeta`, `proyeccion_idproyeccion`"
          ."FROM `meta`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $meta= new Meta();
          $meta->setIdmeta($data[$i]['idmeta']);
          $meta->setDescripcionMeta($data[$i]['descripcionMeta']);
          $meta->setValorMeta($data[$i]['valorMeta']);
           $proyeccion = new Proyeccion();
           $proyeccion->setIdproyeccion($data[$i]['proyeccion_idproyeccion']);
           $meta->setProyeccion_idproyeccion($proyeccion);

          array_push($lista,$meta);
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