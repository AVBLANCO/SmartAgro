<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Sólo relájate y deja que alguien más lo haga  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Metricaconversionenergetica.php');
require_once realpath('../dao/interfaz/IMetricaconversionenergeticaDao.php');
require_once realpath('../dto/Conversionenergetica.php');

class MetricaconversionenergeticaFacade {

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
   * Crea un objeto Metricaconversionenergetica a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idmetricaConversionEnergetica
   * @param desripcionMetricaConversionEnergetica
   * @param conversionEnergetica_idconversionEnergetica
   */
  public static function insert( $idmetricaConversionEnergetica,  $desripcionMetricaConversionEnergetica,  $conversionEnergetica_idconversionEnergetica){
      $metricaconversionenergetica = new Metricaconversionenergetica();
      $metricaconversionenergetica->setIdmetricaConversionEnergetica($idmetricaConversionEnergetica); 
      $metricaconversionenergetica->setDesripcionMetricaConversionEnergetica($desripcionMetricaConversionEnergetica); 
      $metricaconversionenergetica->setConversionEnergetica_idconversionEnergetica($conversionEnergetica_idconversionEnergetica); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $metricaconversionenergeticaDao =$FactoryDao->getmetricaconversionenergeticaDao(self::getDataBaseDefault());
     $rtn = $metricaconversionenergeticaDao->insert($metricaconversionenergetica);
     $metricaconversionenergeticaDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Metricaconversionenergetica de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idmetricaConversionEnergetica
   * @return El objeto en base de datos o Null
   */
  public static function select($idmetricaConversionEnergetica){
      $metricaconversionenergetica = new Metricaconversionenergetica();
      $metricaconversionenergetica->setIdmetricaConversionEnergetica($idmetricaConversionEnergetica); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $metricaconversionenergeticaDao =$FactoryDao->getmetricaconversionenergeticaDao(self::getDataBaseDefault());
     $result = $metricaconversionenergeticaDao->select($metricaconversionenergetica);
     $metricaconversionenergeticaDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Metricaconversionenergetica  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idmetricaConversionEnergetica
   * @param desripcionMetricaConversionEnergetica
   * @param conversionEnergetica_idconversionEnergetica
   */
  public static function update($idmetricaConversionEnergetica, $desripcionMetricaConversionEnergetica, $conversionEnergetica_idconversionEnergetica){
      $metricaconversionenergetica = self::select($idmetricaConversionEnergetica);
      $metricaconversionenergetica->setDesripcionMetricaConversionEnergetica($desripcionMetricaConversionEnergetica); 
      $metricaconversionenergetica->setConversionEnergetica_idconversionEnergetica($conversionEnergetica_idconversionEnergetica); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $metricaconversionenergeticaDao =$FactoryDao->getmetricaconversionenergeticaDao(self::getDataBaseDefault());
     $metricaconversionenergeticaDao->update($metricaconversionenergetica);
     $metricaconversionenergeticaDao->close();
  }

  /**
   * Elimina un objeto Metricaconversionenergetica de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idmetricaConversionEnergetica
   */
  public static function delete($idmetricaConversionEnergetica){
      $metricaconversionenergetica = new Metricaconversionenergetica();
      $metricaconversionenergetica->setIdmetricaConversionEnergetica($idmetricaConversionEnergetica); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $metricaconversionenergeticaDao =$FactoryDao->getmetricaconversionenergeticaDao(self::getDataBaseDefault());
     $metricaconversionenergeticaDao->delete($metricaconversionenergetica);
     $metricaconversionenergeticaDao->close();
  }

  /**
   * Lista todos los objetos Metricaconversionenergetica de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Metricaconversionenergetica en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $metricaconversionenergeticaDao =$FactoryDao->getmetricaconversionenergeticaDao(self::getDataBaseDefault());
     $result = $metricaconversionenergeticaDao->listAll();
     $metricaconversionenergeticaDao->close();
     return $result;
  }


}
//That`s all folks!