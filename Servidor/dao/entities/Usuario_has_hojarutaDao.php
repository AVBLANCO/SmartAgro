<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Esta es una frase no referenciada  \\

include_once realpath('../dao/interfaz/IUsuario_has_hojarutaDao.php');
include_once realpath('../dto/Usuario_has_hojaruta.php');
include_once realpath('../dto/Usuario.php');
include_once realpath('../dto/Hojaruta.php');

class Usuario_has_hojarutaDao implements IUsuario_has_hojarutaDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Usuario_has_hojaruta en la base de datos.
     * @param usuario_has_hojaruta objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($usuario_has_hojaruta){
      $usuario_idusuario=$usuario_has_hojaruta->getUsuario_idusuario()->getIdusuario();
$hojaRuta_idhojaRuta=$usuario_has_hojaruta->getHojaRuta_idhojaRuta()->getIdhojaRuta();

      try {
          $sql= "INSERT INTO `usuario_has_hojaruta`( `usuario_idusuario`, `hojaRuta_idhojaRuta`)"
          ."VALUES ('$usuario_idusuario','$hojaRuta_idhojaRuta')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Usuario_has_hojaruta en la base de datos.
     * @param usuario_has_hojaruta objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($usuario_has_hojaruta){
      $usuario_idusuario=$usuario_has_hojaruta->getUsuario_idusuario()->getIdusuario();
$hojaRuta_idhojaRuta=$usuario_has_hojaruta->getHojaRuta_idhojaRuta()->getIdhojaRuta();

      try {
          $sql= "SELECT `usuario_idusuario`, `hojaRuta_idhojaRuta`"
          ."FROM `usuario_has_hojaruta`"
          ."WHERE `usuario_idusuario`='$usuario_idusuario' AND`hojaRuta_idhojaRuta`='$hojaRuta_idhojaRuta'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
           $usuario = new Usuario();
           $usuario->setIdusuario($data[$i]['usuario_idusuario']);
           $usuario_has_hojaruta->setUsuario_idusuario($usuario);
           $hojaruta = new Hojaruta();
           $hojaruta->setIdhojaRuta($data[$i]['hojaRuta_idhojaRuta']);
           $usuario_has_hojaruta->setHojaRuta_idhojaRuta($hojaruta);

          }
      return $usuario_has_hojaruta;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Usuario_has_hojaruta en la base de datos.
     * @param usuario_has_hojaruta objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($usuario_has_hojaruta){
      $usuario_idusuario=$usuario_has_hojaruta->getUsuario_idusuario()->getIdusuario();
$hojaRuta_idhojaRuta=$usuario_has_hojaruta->getHojaRuta_idhojaRuta()->getIdhojaRuta();

      try {
          $sql= "UPDATE `usuario_has_hojaruta` SET`usuario_idusuario`='$usuario_idusuario' ,`hojaRuta_idhojaRuta`='$hojaRuta_idhojaRuta' WHERE `usuario_idusuario`='$usuario_idusuario' AND `hojaRuta_idhojaRuta`='$hojaRuta_idhojaRuta' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Usuario_has_hojaruta en la base de datos.
     * @param usuario_has_hojaruta objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($usuario_has_hojaruta){
      $usuario_idusuario=$usuario_has_hojaruta->getUsuario_idusuario()->getIdusuario();
$hojaRuta_idhojaRuta=$usuario_has_hojaruta->getHojaRuta_idhojaRuta()->getIdhojaRuta();

      try {
          $sql ="DELETE FROM `usuario_has_hojaruta` WHERE `usuario_idusuario`='$usuario_idusuario' AND`hojaRuta_idhojaRuta`='$hojaRuta_idhojaRuta'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Usuario_has_hojaruta en la base de datos.
     * @return ArrayList<Usuario_has_hojaruta> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `usuario_idusuario`, `hojaRuta_idhojaRuta`"
          ."FROM `usuario_has_hojaruta`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $usuario_has_hojaruta= new Usuario_has_hojaruta();
           $usuario = new Usuario();
           $usuario->setIdusuario($data[$i]['usuario_idusuario']);
           $usuario_has_hojaruta->setUsuario_idusuario($usuario);
           $hojaruta = new Hojaruta();
           $hojaruta->setIdhojaRuta($data[$i]['hojaRuta_idhojaRuta']);
           $usuario_has_hojaruta->setHojaRuta_idhojaRuta($hojaruta);

          array_push($lista,$usuario_has_hojaruta);
          }
      return $lista;
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Busca un objeto Usuario_has_hojaruta en la base de datos.
     * @param usuario_has_hojaruta objeto con la(s) llave(s) primaria(s) para consultar
     * @return ArrayList<Usuario_has_hojaruta> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listByUsuario_idusuario($usuario_has_hojaruta){
      $lista = array();
      $usuario_idusuario=$usuario_has_hojaruta->getUsuario_idusuario()->getIdusuario();

      try {
          $sql ="SELECT `usuario_idusuario`, `hojaRuta_idhojaRuta`"
          ."FROM `usuario_has_hojaruta`"
          ."WHERE `usuario_idusuario`='$usuario_idusuario'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $usuario_has_hojaruta = new Usuario_has_hojaruta();
           $usuario = new Usuario();
           $usuario->setIdusuario($data[$i]['usuario_idusuario']);
           $usuario_has_hojaruta->setUsuario_idusuario($usuario);
           $hojaruta = new Hojaruta();
           $hojaruta->setIdhojaRuta($data[$i]['hojaRuta_idhojaRuta']);
           $usuario_has_hojaruta->setHojaRuta_idhojaRuta($hojaruta);

          array_push($lista,$usuario_has_hojaruta);
          }
      return $lista;
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Busca un objeto Usuario_has_hojaruta en la base de datos.
     * @param usuario_has_hojaruta objeto con la(s) llave(s) primaria(s) para consultar
     * @return ArrayList<Usuario_has_hojaruta> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listByHojaRuta_idhojaRuta($usuario_has_hojaruta){
      $lista = array();
      $hojaRuta_idhojaRuta=$usuario_has_hojaruta->getHojaRuta_idhojaRuta()->getIdhojaRuta();

      try {
          $sql ="SELECT `usuario_idusuario`, `hojaRuta_idhojaRuta`"
          ."FROM `usuario_has_hojaruta`"
          ."WHERE `hojaRuta_idhojaRuta`='$hojaRuta_idhojaRuta'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $usuario_has_hojaruta = new Usuario_has_hojaruta();
           $usuario = new Usuario();
           $usuario->setIdusuario($data[$i]['usuario_idusuario']);
           $usuario_has_hojaruta->setUsuario_idusuario($usuario);
           $hojaruta = new Hojaruta();
           $hojaruta->setIdhojaRuta($data[$i]['hojaRuta_idhojaRuta']);
           $usuario_has_hojaruta->setHojaRuta_idhojaRuta($hojaruta);

          array_push($lista,$usuario_has_hojaruta);
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