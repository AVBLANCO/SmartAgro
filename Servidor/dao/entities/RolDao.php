<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Proletarios del mundo ¡Uníos!  \\

include_once realpath('../dao/interfaz/IRolDao.php');
include_once realpath('../dto/Rol.php');
include_once realpath('../dto/Usuario.php');

class RolDao implements IRolDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Rol en la base de datos.
     * @param rol objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($rol){
      $idrol=$rol->getIdrol();
$descripcion=$rol->getDescripcion();
$usuario_idusuario=$rol->getUsuario_idusuario()->getIdusuario();

      try {
          $sql= "INSERT INTO `rol`( `idrol`, `descripcion`, `usuario_idusuario`)"
          ."VALUES ('$idrol','$descripcion','$usuario_idusuario')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Rol en la base de datos.
     * @param rol objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($rol){
      $idrol=$rol->getIdrol();

      try {
          $sql= "SELECT `idrol`, `descripcion`, `usuario_idusuario`"
          ."FROM `rol`"
          ."WHERE `idrol`='$idrol'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $rol->setIdrol($data[$i]['idrol']);
          $rol->setDescripcion($data[$i]['descripcion']);
           $usuario = new Usuario();
           $usuario->setIdusuario($data[$i]['usuario_idusuario']);
           $rol->setUsuario_idusuario($usuario);

          }
      return $rol;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Rol en la base de datos.
     * @param rol objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($rol){
      $idrol=$rol->getIdrol();
$descripcion=$rol->getDescripcion();
$usuario_idusuario=$rol->getUsuario_idusuario()->getIdusuario();

      try {
          $sql= "UPDATE `rol` SET`idrol`='$idrol' ,`descripcion`='$descripcion' ,`usuario_idusuario`='$usuario_idusuario' WHERE `idrol`='$idrol' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Rol en la base de datos.
     * @param rol objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($rol){
      $idrol=$rol->getIdrol();

      try {
          $sql ="DELETE FROM `rol` WHERE `idrol`='$idrol'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Rol en la base de datos.
     * @return ArrayList<Rol> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `idrol`, `descripcion`, `usuario_idusuario`"
          ."FROM `rol`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $rol= new Rol();
          $rol->setIdrol($data[$i]['idrol']);
          $rol->setDescripcion($data[$i]['descripcion']);
           $usuario = new Usuario();
           $usuario->setIdusuario($data[$i]['usuario_idusuario']);
           $rol->setUsuario_idusuario($usuario);

          array_push($lista,$rol);
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