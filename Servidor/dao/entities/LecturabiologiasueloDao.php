<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    El coronel necesitó setenta y cinco años -los setenta y cinco años de su vida, minuto a minuto- para llegar a ese instante. Se sintió puro, explícito, invencible, en el momento de responder:  \\

include_once realpath('../dao/interfaz/ILecturabiologiasueloDao.php');
include_once realpath('../dto/Lecturabiologiasuelo.php');
include_once realpath('../dto/Metricabiologiasuelo.php');

class LecturabiologiasueloDao implements ILecturabiologiasueloDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Lecturabiologiasuelo en la base de datos.
     * @param lecturabiologiasuelo objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($lecturabiologiasuelo){
      $idlecturaBiologiaSuelo=$lecturabiologiasuelo->getIdlecturaBiologiaSuelo();
$fechaLecturaBiologiaSuelo=$lecturabiologiasuelo->getFechaLecturaBiologiaSuelo();
$valorLecturaBiologiaSuelocol=$lecturabiologiasuelo->getValorLecturaBiologiaSuelocol();
$metricaBiologiaSuelo_idmetricaBiologiaSuelo=$lecturabiologiasuelo->getMetricaBiologiaSuelo_idmetricaBiologiaSuelo()->getIdmetricaBiologiaSuelo();

      try {
          $sql= "INSERT INTO `lecturabiologiasuelo`( `idlecturaBiologiaSuelo`, `fechaLecturaBiologiaSuelo`, `valorLecturaBiologiaSuelocol`, `metricaBiologiaSuelo_idmetricaBiologiaSuelo`)"
          ."VALUES ('$idlecturaBiologiaSuelo','$fechaLecturaBiologiaSuelo','$valorLecturaBiologiaSuelocol','$metricaBiologiaSuelo_idmetricaBiologiaSuelo')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Lecturabiologiasuelo en la base de datos.
     * @param lecturabiologiasuelo objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($lecturabiologiasuelo){
      $idlecturaBiologiaSuelo=$lecturabiologiasuelo->getIdlecturaBiologiaSuelo();

      try {
          $sql= "SELECT `idlecturaBiologiaSuelo`, `fechaLecturaBiologiaSuelo`, `valorLecturaBiologiaSuelocol`, `metricaBiologiaSuelo_idmetricaBiologiaSuelo`"
          ."FROM `lecturabiologiasuelo`"
          ."WHERE `idlecturaBiologiaSuelo`='$idlecturaBiologiaSuelo'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $lecturabiologiasuelo->setIdlecturaBiologiaSuelo($data[$i]['idlecturaBiologiaSuelo']);
          $lecturabiologiasuelo->setFechaLecturaBiologiaSuelo($data[$i]['fechaLecturaBiologiaSuelo']);
          $lecturabiologiasuelo->setValorLecturaBiologiaSuelocol($data[$i]['valorLecturaBiologiaSuelocol']);
           $metricabiologiasuelo = new Metricabiologiasuelo();
           $metricabiologiasuelo->setIdmetricaBiologiaSuelo($data[$i]['metricaBiologiaSuelo_idmetricaBiologiaSuelo']);
           $lecturabiologiasuelo->setMetricaBiologiaSuelo_idmetricaBiologiaSuelo($metricabiologiasuelo);

          }
      return $lecturabiologiasuelo;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Lecturabiologiasuelo en la base de datos.
     * @param lecturabiologiasuelo objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($lecturabiologiasuelo){
      $idlecturaBiologiaSuelo=$lecturabiologiasuelo->getIdlecturaBiologiaSuelo();
$fechaLecturaBiologiaSuelo=$lecturabiologiasuelo->getFechaLecturaBiologiaSuelo();
$valorLecturaBiologiaSuelocol=$lecturabiologiasuelo->getValorLecturaBiologiaSuelocol();
$metricaBiologiaSuelo_idmetricaBiologiaSuelo=$lecturabiologiasuelo->getMetricaBiologiaSuelo_idmetricaBiologiaSuelo()->getIdmetricaBiologiaSuelo();

      try {
          $sql= "UPDATE `lecturabiologiasuelo` SET`idlecturaBiologiaSuelo`='$idlecturaBiologiaSuelo' ,`fechaLecturaBiologiaSuelo`='$fechaLecturaBiologiaSuelo' ,`valorLecturaBiologiaSuelocol`='$valorLecturaBiologiaSuelocol' ,`metricaBiologiaSuelo_idmetricaBiologiaSuelo`='$metricaBiologiaSuelo_idmetricaBiologiaSuelo' WHERE `idlecturaBiologiaSuelo`='$idlecturaBiologiaSuelo' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Lecturabiologiasuelo en la base de datos.
     * @param lecturabiologiasuelo objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($lecturabiologiasuelo){
      $idlecturaBiologiaSuelo=$lecturabiologiasuelo->getIdlecturaBiologiaSuelo();

      try {
          $sql ="DELETE FROM `lecturabiologiasuelo` WHERE `idlecturaBiologiaSuelo`='$idlecturaBiologiaSuelo'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Lecturabiologiasuelo en la base de datos.
     * @return ArrayList<Lecturabiologiasuelo> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `idlecturaBiologiaSuelo`, `fechaLecturaBiologiaSuelo`, `valorLecturaBiologiaSuelocol`, `metricaBiologiaSuelo_idmetricaBiologiaSuelo`"
          ."FROM `lecturabiologiasuelo`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $lecturabiologiasuelo= new Lecturabiologiasuelo();
          $lecturabiologiasuelo->setIdlecturaBiologiaSuelo($data[$i]['idlecturaBiologiaSuelo']);
          $lecturabiologiasuelo->setFechaLecturaBiologiaSuelo($data[$i]['fechaLecturaBiologiaSuelo']);
          $lecturabiologiasuelo->setValorLecturaBiologiaSuelocol($data[$i]['valorLecturaBiologiaSuelocol']);
           $metricabiologiasuelo = new Metricabiologiasuelo();
           $metricabiologiasuelo->setIdmetricaBiologiaSuelo($data[$i]['metricaBiologiaSuelo_idmetricaBiologiaSuelo']);
           $lecturabiologiasuelo->setMetricaBiologiaSuelo_idmetricaBiologiaSuelo($metricabiologiasuelo);

          array_push($lista,$lecturabiologiasuelo);
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