<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Nada mejor que el código hecho a mano.  \\

include_once realpath('../dao/interfaz/IHojarutaDao.php');
include_once realpath('../dto/Hojaruta.php');
include_once realpath('../dto/Costo.php');

class HojarutaDao implements IHojarutaDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Hojaruta en la base de datos.
     * @param hojaruta objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($hojaruta){
      $idhojaRuta=$hojaruta->getIdhojaRuta();
$fechaHojaRuta=$hojaruta->getFechaHojaRuta();
$costo_idcosto=$hojaruta->getCosto_idcosto()->getIdcosto();

      try {
          $sql= "INSERT INTO `hojaruta`( `idhojaRuta`, `fechaHojaRuta`, `costo_idcosto`)"
          ."VALUES ('$idhojaRuta','$fechaHojaRuta','$costo_idcosto')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Hojaruta en la base de datos.
     * @param hojaruta objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($hojaruta){
      $idhojaRuta=$hojaruta->getIdhojaRuta();

      try {
          $sql= "SELECT `idhojaRuta`, `fechaHojaRuta`, `costo_idcosto`"
          ."FROM `hojaruta`"
          ."WHERE `idhojaRuta`='$idhojaRuta'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $hojaruta->setIdhojaRuta($data[$i]['idhojaRuta']);
          $hojaruta->setFechaHojaRuta($data[$i]['fechaHojaRuta']);
           $costo = new Costo();
           $costo->setIdcosto($data[$i]['costo_idcosto']);
           $hojaruta->setCosto_idcosto($costo);

          }
      return $hojaruta;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Hojaruta en la base de datos.
     * @param hojaruta objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($hojaruta){
      $idhojaRuta=$hojaruta->getIdhojaRuta();
$fechaHojaRuta=$hojaruta->getFechaHojaRuta();
$costo_idcosto=$hojaruta->getCosto_idcosto()->getIdcosto();

      try {
          $sql= "UPDATE `hojaruta` SET`idhojaRuta`='$idhojaRuta' ,`fechaHojaRuta`='$fechaHojaRuta' ,`costo_idcosto`='$costo_idcosto' WHERE `idhojaRuta`='$idhojaRuta' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Hojaruta en la base de datos.
     * @param hojaruta objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($hojaruta){
      $idhojaRuta=$hojaruta->getIdhojaRuta();

      try {
          $sql ="DELETE FROM `hojaruta` WHERE `idhojaRuta`='$idhojaRuta'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Hojaruta en la base de datos.
     * @return ArrayList<Hojaruta> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `idhojaRuta`, `fechaHojaRuta`, `costo_idcosto`"
          ."FROM `hojaruta`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $hojaruta= new Hojaruta();
          $hojaruta->setIdhojaRuta($data[$i]['idhojaRuta']);
          $hojaruta->setFechaHojaRuta($data[$i]['fechaHojaRuta']);
           $costo = new Costo();
           $costo->setIdcosto($data[$i]['costo_idcosto']);
           $hojaruta->setCosto_idcosto($costo);

          array_push($lista,$hojaruta);
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