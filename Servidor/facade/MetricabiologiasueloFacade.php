<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    No quiero morir sin tener cicatrices.  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Metricabiologiasuelo.php');
require_once realpath('../dao/interfaz/IMetricabiologiasueloDao.php');
require_once realpath('../dto/Biologiasuelo.php');

class MetricabiologiasueloFacade {

  /**
   * Para su comodidad, defina aquí el gestor de conexión predilecto para esta entidad
   * @return idGestor Devuelve el identificador del gestor de conexión
   */
  private static function getGestorDefault(){
      return DEFAULT_GESTOR;
  }
  /**
   * Para su comodidad, defina aquí el nombre de base de datos predilecto para esta entidad
   * @return dbName Devuelve el nombre de la base de datos a emplear
   */
  private static function getDataBaseDefault(){
      return DEFAULT_DBNAME;
  }
  /**
   * Crea un objeto Metricabiologiasuelo a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idmetricaBiologiaSuelo
   * @param descripcionMetricaBiologiaSuelo
   * @param biologiaSuelo_idbiologiaSuelo
   */
  public static function insert( $idmetricaBiologiaSuelo,  $descripcionMetricaBiologiaSuelo,  $biologiaSuelo_idbiologiaSuelo){
      $metricabiologiasuelo = new Metricabiologiasuelo();
      $metricabiologiasuelo->setIdmetricaBiologiaSuelo($idmetricaBiologiaSuelo); 
      $metricabiologiasuelo->setDescripcionMetricaBiologiaSuelo($descripcionMetricaBiologiaSuelo); 
      $metricabiologiasuelo->setBiologiaSuelo_idbiologiaSuelo($biologiaSuelo_idbiologiaSuelo); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $metricabiologiasueloDao =$FactoryDao->getmetricabiologiasueloDao(self::getDataBaseDefault());
     $rtn = $metricabiologiasueloDao->insert($metricabiologiasuelo);
     $metricabiologiasueloDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Metricabiologiasuelo de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idmetricaBiologiaSuelo
   * @return El objeto en base de datos o Null
   */
  public static function select($idmetricaBiologiaSuelo){
      $metricabiologiasuelo = new Metricabiologiasuelo();
      $metricabiologiasuelo->setIdmetricaBiologiaSuelo($idmetricaBiologiaSuelo); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $metricabiologiasueloDao =$FactoryDao->getmetricabiologiasueloDao(self::getDataBaseDefault());
     $result = $metricabiologiasueloDao->select($metricabiologiasuelo);
     $metricabiologiasueloDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Metricabiologiasuelo  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idmetricaBiologiaSuelo
   * @param descripcionMetricaBiologiaSuelo
   * @param biologiaSuelo_idbiologiaSuelo
   */
  public static function update($idmetricaBiologiaSuelo, $descripcionMetricaBiologiaSuelo, $biologiaSuelo_idbiologiaSuelo){
      $metricabiologiasuelo = self::select($idmetricaBiologiaSuelo);
      $metricabiologiasuelo->setDescripcionMetricaBiologiaSuelo($descripcionMetricaBiologiaSuelo); 
      $metricabiologiasuelo->setBiologiaSuelo_idbiologiaSuelo($biologiaSuelo_idbiologiaSuelo); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $metricabiologiasueloDao =$FactoryDao->getmetricabiologiasueloDao(self::getDataBaseDefault());
     $metricabiologiasueloDao->update($metricabiologiasuelo);
     $metricabiologiasueloDao->close();
  }

  /**
   * Elimina un objeto Metricabiologiasuelo de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idmetricaBiologiaSuelo
   */
  public static function delete($idmetricaBiologiaSuelo){
      $metricabiologiasuelo = new Metricabiologiasuelo();
      $metricabiologiasuelo->setIdmetricaBiologiaSuelo($idmetricaBiologiaSuelo); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $metricabiologiasueloDao =$FactoryDao->getmetricabiologiasueloDao(self::getDataBaseDefault());
     $metricabiologiasueloDao->delete($metricabiologiasuelo);
     $metricabiologiasueloDao->close();
  }

  /**
   * Lista todos los objetos Metricabiologiasuelo de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Metricabiologiasuelo en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $metricabiologiasueloDao =$FactoryDao->getmetricabiologiasueloDao(self::getDataBaseDefault());
     $result = $metricabiologiasueloDao->listAll();
     $metricabiologiasueloDao->close();
     return $result;
  }


}
//That`s all folks!