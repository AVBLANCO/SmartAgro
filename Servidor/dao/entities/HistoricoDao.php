<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    El coronel necesitó setenta y cinco años -los setenta y cinco años de su vida, minuto a minuto- para llegar a ese instante. Se sintió puro, explícito, invencible, en el momento de responder:  \\

include_once realpath('../dao/interfaz/IHistoricoDao.php');
include_once realpath('../dto/Historico.php');
include_once realpath('../dto/Miagroempresa.php');

class HistoricoDao implements IHistoricoDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Historico en la base de datos.
     * @param historico objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($historico){
      $idhistorico=$historico->getIdhistorico();
$descripcionHistorico=$historico->getDescripcionHistorico();
$miAgroempresa_idmiAgroempresa=$historico->getMiAgroempresa_idmiAgroempresa()->getIdmiAgroempresa();
$valorHistorico=$historico->getValorHistorico();

      try {
          $sql= "INSERT INTO `historico`( `idhistorico`, `descripcionHistorico`, `miAgroempresa_idmiAgroempresa`, `valorHistorico`)"
          ."VALUES ('$idhistorico','$descripcionHistorico','$miAgroempresa_idmiAgroempresa','$valorHistorico')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Historico en la base de datos.
     * @param historico objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($historico){
      $idhistorico=$historico->getIdhistorico();

      try {
          $sql= "SELECT `idhistorico`, `descripcionHistorico`, `miAgroempresa_idmiAgroempresa`, `valorHistorico`"
          ."FROM `historico`"
          ."WHERE `idhistorico`='$idhistorico'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $historico->setIdhistorico($data[$i]['idhistorico']);
          $historico->setDescripcionHistorico($data[$i]['descripcionHistorico']);
           $miagroempresa = new Miagroempresa();
           $miagroempresa->setIdmiAgroempresa($data[$i]['miAgroempresa_idmiAgroempresa']);
           $historico->setMiAgroempresa_idmiAgroempresa($miagroempresa);
          $historico->setValorHistorico($data[$i]['valorHistorico']);

          }
      return $historico;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Historico en la base de datos.
     * @param historico objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($historico){
      $idhistorico=$historico->getIdhistorico();
$descripcionHistorico=$historico->getDescripcionHistorico();
$miAgroempresa_idmiAgroempresa=$historico->getMiAgroempresa_idmiAgroempresa()->getIdmiAgroempresa();
$valorHistorico=$historico->getValorHistorico();

      try {
          $sql= "UPDATE `historico` SET`idhistorico`='$idhistorico' ,`descripcionHistorico`='$descripcionHistorico' ,`miAgroempresa_idmiAgroempresa`='$miAgroempresa_idmiAgroempresa' ,`valorHistorico`='$valorHistorico' WHERE `idhistorico`='$idhistorico' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Historico en la base de datos.
     * @param historico objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($historico){
      $idhistorico=$historico->getIdhistorico();

      try {
          $sql ="DELETE FROM `historico` WHERE `idhistorico`='$idhistorico'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Historico en la base de datos.
     * @return ArrayList<Historico> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `idhistorico`, `descripcionHistorico`, `miAgroempresa_idmiAgroempresa`, `valorHistorico`"
          ."FROM `historico`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $historico= new Historico();
          $historico->setIdhistorico($data[$i]['idhistorico']);
          $historico->setDescripcionHistorico($data[$i]['descripcionHistorico']);
           $miagroempresa = new Miagroempresa();
           $miagroempresa->setIdmiAgroempresa($data[$i]['miAgroempresa_idmiAgroempresa']);
           $historico->setMiAgroempresa_idmiAgroempresa($miagroempresa);
          $historico->setValorHistorico($data[$i]['valorHistorico']);

          array_push($lista,$historico);
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