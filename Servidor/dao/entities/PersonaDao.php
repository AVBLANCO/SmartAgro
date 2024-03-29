<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    A vote for Bart is a vote for Anarchy!  \\

include_once realpath('../dao/interfaz/IPersonaDao.php');
include_once realpath('../dto/Persona.php');

class PersonaDao implements IPersonaDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Persona en la base de datos.
     * @param persona objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($persona){
      $idpersona=$persona->getIdpersona();
$nombrePersona=$persona->getNombrePersona();
$cedulaPersona=$persona->getCedulaPersona();
$correoPersona=$persona->getCorreoPersona();
$fechaNacimientoPersona=$persona->getFechaNacimientoPersona();
$genero=$persona->getGenero();

      try {
          $sql= "INSERT INTO `persona`( `idpersona`, `nombrePersona`, `cedulaPersona`, `correoPersona`, `fechaNacimientoPersona`, `genero`)"
          ."VALUES ('$idpersona','$nombrePersona','$cedulaPersona','$correoPersona','$fechaNacimientoPersona','$genero')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Persona en la base de datos.
     * @param persona objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($persona){
      $idpersona=$persona->getIdpersona();

      try {
          $sql= "SELECT `idpersona`, `nombrePersona`, `cedulaPersona`, `correoPersona`, `fechaNacimientoPersona`, `genero`"
          ."FROM `persona`"
          ."WHERE `idpersona`='$idpersona'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $persona->setIdpersona($data[$i]['idpersona']);
          $persona->setNombrePersona($data[$i]['nombrePersona']);
          $persona->setCedulaPersona($data[$i]['cedulaPersona']);
          $persona->setCorreoPersona($data[$i]['correoPersona']);
          $persona->setFechaNacimientoPersona($data[$i]['fechaNacimientoPersona']);
          $persona->setGenero($data[$i]['genero']);

          }
      return $persona;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Persona en la base de datos.
     * @param persona objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($persona){
      $idpersona=$persona->getIdpersona();
$nombrePersona=$persona->getNombrePersona();
$cedulaPersona=$persona->getCedulaPersona();
$correoPersona=$persona->getCorreoPersona();
$fechaNacimientoPersona=$persona->getFechaNacimientoPersona();
$genero=$persona->getGenero();

      try {
          $sql= "UPDATE `persona` SET`idpersona`='$idpersona' ,`nombrePersona`='$nombrePersona' ,`cedulaPersona`='$cedulaPersona' ,`correoPersona`='$correoPersona' ,`fechaNacimientoPersona`='$fechaNacimientoPersona' ,`genero`='$genero' WHERE `idpersona`='$idpersona' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Persona en la base de datos.
     * @param persona objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($persona){
      $idpersona=$persona->getIdpersona();

      try {
          $sql ="DELETE FROM `persona` WHERE `idpersona`='$idpersona'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Persona en la base de datos.
     * @return ArrayList<Persona> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `idpersona`, `nombrePersona`, `cedulaPersona`, `correoPersona`, `fechaNacimientoPersona`, `genero`"
          ."FROM `persona`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $persona= new Persona();
          $persona->setIdpersona($data[$i]['idpersona']);
          $persona->setNombrePersona($data[$i]['nombrePersona']);
          $persona->setCedulaPersona($data[$i]['cedulaPersona']);
          $persona->setCorreoPersona($data[$i]['correoPersona']);
          $persona->setFechaNacimientoPersona($data[$i]['fechaNacimientoPersona']);
          $persona->setGenero($data[$i]['genero']);

          array_push($lista,$persona);
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