<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Cuenta la leyenda que si gritas 'Soy programador' las nenas caerán a tus pies  \\

include_once realpath('../dao/interfaz/IUsuarioDao.php');
include_once realpath('../dto/Usuario.php');
include_once realpath('../dto/Persona.php');
include_once realpath('../dto/Finca.php');

class UsuarioDao implements IUsuarioDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Usuario en la base de datos.
     * @param usuario objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($usuario){
      $idusuario=$usuario->getIdusuario();
$nombreUsuario=$usuario->getNombreUsuario();
$passwordUsuario=$usuario->getPasswordUsuario();
$persona_idpersona=$usuario->getPersona_idpersona()->getIdpersona();
$finca_idfinca=$usuario->getFinca_idfinca()->getIdfinca();

      try {
          $sql= "INSERT INTO `usuario`( `idusuario`, `nombreUsuario`, `passwordUsuario`, `persona_idpersona`, `finca_idfinca`)"
          ."VALUES ('$idusuario','$nombreUsuario','$passwordUsuario','$persona_idpersona','$finca_idfinca')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Usuario en la base de datos.
     * @param usuario objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($usuario){
      $idusuario=$usuario->getIdusuario();

      try {
          $sql= "SELECT `idusuario`, `nombreUsuario`, `passwordUsuario`, `persona_idpersona`, `finca_idfinca`"
          ."FROM `usuario`"
          ."WHERE `idusuario`='$idusuario'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $usuario->setIdusuario($data[$i]['idusuario']);
          $usuario->setNombreUsuario($data[$i]['nombreUsuario']);
          $usuario->setPasswordUsuario($data[$i]['passwordUsuario']);
           $persona = new Persona();
           $persona->setIdpersona($data[$i]['persona_idpersona']);
           $usuario->setPersona_idpersona($persona);
           $finca = new Finca();
           $finca->setIdfinca($data[$i]['finca_idfinca']);
           $usuario->setFinca_idfinca($finca);

          }
      return $usuario;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Usuario en la base de datos.
     * @param usuario objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($usuario){
      $idusuario=$usuario->getIdusuario();
$nombreUsuario=$usuario->getNombreUsuario();
$passwordUsuario=$usuario->getPasswordUsuario();
$persona_idpersona=$usuario->getPersona_idpersona()->getIdpersona();
$finca_idfinca=$usuario->getFinca_idfinca()->getIdfinca();

      try {
          $sql= "UPDATE `usuario` SET`idusuario`='$idusuario' ,`nombreUsuario`='$nombreUsuario' ,`passwordUsuario`='$passwordUsuario' ,`persona_idpersona`='$persona_idpersona' ,`finca_idfinca`='$finca_idfinca' WHERE `idusuario`='$idusuario' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Usuario en la base de datos.
     * @param usuario objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($usuario){
      $idusuario=$usuario->getIdusuario();

      try {
          $sql ="DELETE FROM `usuario` WHERE `idusuario`='$idusuario'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Usuario en la base de datos.
     * @return ArrayList<Usuario> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `idusuario`, `nombreUsuario`, `passwordUsuario`, `persona_idpersona`, `finca_idfinca`"
          ."FROM `usuario`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $usuario= new Usuario();
          $usuario->setIdusuario($data[$i]['idusuario']);
          $usuario->setNombreUsuario($data[$i]['nombreUsuario']);
          $usuario->setPasswordUsuario($data[$i]['passwordUsuario']);
           $persona = new Persona();
           $persona->setIdpersona($data[$i]['persona_idpersona']);
           $usuario->setPersona_idpersona($persona);
           $finca = new Finca();
           $finca->setIdfinca($data[$i]['finca_idfinca']);
           $usuario->setFinca_idfinca($finca);

          array_push($lista,$usuario);
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