<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Cuantas frases como esta crees que puedo escribir?  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Metricamanejoplagas.php');
require_once realpath('../dao/interfaz/IMetricamanejoplagasDao.php');
require_once realpath('../dto/Manejointegradoplagas.php');

class MetricamanejoplagasFacade {

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
   * Crea un objeto Metricamanejoplagas a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idmetricaManejoPlagas
   * @param descripcionMetricaManejoPlagas
   * @param manejoIntegradoPlagas_idmanejoIntegradoPlagas
   */
  public static function insert( $idmetricaManejoPlagas,  $descripcionMetricaManejoPlagas,  $manejoIntegradoPlagas_idmanejoIntegradoPlagas){
      $metricamanejoplagas = new Metricamanejoplagas();
      $metricamanejoplagas->setIdmetricaManejoPlagas($idmetricaManejoPlagas); 
      $metricamanejoplagas->setDescripcionMetricaManejoPlagas($descripcionMetricaManejoPlagas); 
      $metricamanejoplagas->setManejoIntegradoPlagas_idmanejoIntegradoPlagas($manejoIntegradoPlagas_idmanejoIntegradoPlagas); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $metricamanejoplagasDao =$FactoryDao->getmetricamanejoplagasDao(self::getDataBaseDefault());
     $rtn = $metricamanejoplagasDao->insert($metricamanejoplagas);
     $metricamanejoplagasDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Metricamanejoplagas de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idmetricaManejoPlagas
   * @return El objeto en base de datos o Null
   */
  public static function select($idmetricaManejoPlagas){
      $metricamanejoplagas = new Metricamanejoplagas();
      $metricamanejoplagas->setIdmetricaManejoPlagas($idmetricaManejoPlagas); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $metricamanejoplagasDao =$FactoryDao->getmetricamanejoplagasDao(self::getDataBaseDefault());
     $result = $metricamanejoplagasDao->select($metricamanejoplagas);
     $metricamanejoplagasDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Metricamanejoplagas  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idmetricaManejoPlagas
   * @param descripcionMetricaManejoPlagas
   * @param manejoIntegradoPlagas_idmanejoIntegradoPlagas
   */
  public static function update($idmetricaManejoPlagas, $descripcionMetricaManejoPlagas, $manejoIntegradoPlagas_idmanejoIntegradoPlagas){
      $metricamanejoplagas = self::select($idmetricaManejoPlagas);
      $metricamanejoplagas->setDescripcionMetricaManejoPlagas($descripcionMetricaManejoPlagas); 
      $metricamanejoplagas->setManejoIntegradoPlagas_idmanejoIntegradoPlagas($manejoIntegradoPlagas_idmanejoIntegradoPlagas); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $metricamanejoplagasDao =$FactoryDao->getmetricamanejoplagasDao(self::getDataBaseDefault());
     $metricamanejoplagasDao->update($metricamanejoplagas);
     $metricamanejoplagasDao->close();
  }

  /**
   * Elimina un objeto Metricamanejoplagas de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idmetricaManejoPlagas
   */
  public static function delete($idmetricaManejoPlagas){
      $metricamanejoplagas = new Metricamanejoplagas();
      $metricamanejoplagas->setIdmetricaManejoPlagas($idmetricaManejoPlagas); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $metricamanejoplagasDao =$FactoryDao->getmetricamanejoplagasDao(self::getDataBaseDefault());
     $metricamanejoplagasDao->delete($metricamanejoplagas);
     $metricamanejoplagasDao->close();
  }

  /**
   * Lista todos los objetos Metricamanejoplagas de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Metricamanejoplagas en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $metricamanejoplagasDao =$FactoryDao->getmetricamanejoplagasDao(self::getDataBaseDefault());
     $result = $metricamanejoplagasDao->listAll();
     $metricamanejoplagasDao->close();
     return $result;
  }


}
//That`s all folks!