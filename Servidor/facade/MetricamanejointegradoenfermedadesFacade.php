<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Más delgado  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Metricamanejointegradoenfermedades.php');
require_once realpath('../dao/interfaz/IMetricamanejointegradoenfermedadesDao.php');
require_once realpath('../dto/Manejointegradoenfermedades.php');

class MetricamanejointegradoenfermedadesFacade {

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
   * Crea un objeto Metricamanejointegradoenfermedades a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idmetricaManejoIntegradoEnfermedades
   * @param descricionMetricaManejoIntegradoEnfermedades
   * @param manejoIntegradoEnfermedades_idmanejoIntegradoEnfermedades
   */
  public static function insert( $idmetricaManejoIntegradoEnfermedades,  $descricionMetricaManejoIntegradoEnfermedades,  $manejoIntegradoEnfermedades_idmanejoIntegradoEnfermedades){
      $metricamanejointegradoenfermedades = new Metricamanejointegradoenfermedades();
      $metricamanejointegradoenfermedades->setIdmetricaManejoIntegradoEnfermedades($idmetricaManejoIntegradoEnfermedades); 
      $metricamanejointegradoenfermedades->setDescricionMetricaManejoIntegradoEnfermedades($descricionMetricaManejoIntegradoEnfermedades); 
      $metricamanejointegradoenfermedades->setManejoIntegradoEnfermedades_idmanejoIntegradoEnfermedades($manejoIntegradoEnfermedades_idmanejoIntegradoEnfermedades); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $metricamanejointegradoenfermedadesDao =$FactoryDao->getmetricamanejointegradoenfermedadesDao(self::getDataBaseDefault());
     $rtn = $metricamanejointegradoenfermedadesDao->insert($metricamanejointegradoenfermedades);
     $metricamanejointegradoenfermedadesDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Metricamanejointegradoenfermedades de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idmetricaManejoIntegradoEnfermedades
   * @return El objeto en base de datos o Null
   */
  public static function select($idmetricaManejoIntegradoEnfermedades){
      $metricamanejointegradoenfermedades = new Metricamanejointegradoenfermedades();
      $metricamanejointegradoenfermedades->setIdmetricaManejoIntegradoEnfermedades($idmetricaManejoIntegradoEnfermedades); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $metricamanejointegradoenfermedadesDao =$FactoryDao->getmetricamanejointegradoenfermedadesDao(self::getDataBaseDefault());
     $result = $metricamanejointegradoenfermedadesDao->select($metricamanejointegradoenfermedades);
     $metricamanejointegradoenfermedadesDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Metricamanejointegradoenfermedades  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idmetricaManejoIntegradoEnfermedades
   * @param descricionMetricaManejoIntegradoEnfermedades
   * @param manejoIntegradoEnfermedades_idmanejoIntegradoEnfermedades
   */
  public static function update($idmetricaManejoIntegradoEnfermedades, $descricionMetricaManejoIntegradoEnfermedades, $manejoIntegradoEnfermedades_idmanejoIntegradoEnfermedades){
      $metricamanejointegradoenfermedades = self::select($idmetricaManejoIntegradoEnfermedades);
      $metricamanejointegradoenfermedades->setDescricionMetricaManejoIntegradoEnfermedades($descricionMetricaManejoIntegradoEnfermedades); 
      $metricamanejointegradoenfermedades->setManejoIntegradoEnfermedades_idmanejoIntegradoEnfermedades($manejoIntegradoEnfermedades_idmanejoIntegradoEnfermedades); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $metricamanejointegradoenfermedadesDao =$FactoryDao->getmetricamanejointegradoenfermedadesDao(self::getDataBaseDefault());
     $metricamanejointegradoenfermedadesDao->update($metricamanejointegradoenfermedades);
     $metricamanejointegradoenfermedadesDao->close();
  }

  /**
   * Elimina un objeto Metricamanejointegradoenfermedades de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idmetricaManejoIntegradoEnfermedades
   */
  public static function delete($idmetricaManejoIntegradoEnfermedades){
      $metricamanejointegradoenfermedades = new Metricamanejointegradoenfermedades();
      $metricamanejointegradoenfermedades->setIdmetricaManejoIntegradoEnfermedades($idmetricaManejoIntegradoEnfermedades); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $metricamanejointegradoenfermedadesDao =$FactoryDao->getmetricamanejointegradoenfermedadesDao(self::getDataBaseDefault());
     $metricamanejointegradoenfermedadesDao->delete($metricamanejointegradoenfermedades);
     $metricamanejointegradoenfermedadesDao->close();
  }

  /**
   * Lista todos los objetos Metricamanejointegradoenfermedades de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Metricamanejointegradoenfermedades en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $metricamanejointegradoenfermedadesDao =$FactoryDao->getmetricamanejointegradoenfermedadesDao(self::getDataBaseDefault());
     $result = $metricamanejointegradoenfermedadesDao->listAll();
     $metricamanejointegradoenfermedadesDao->close();
     return $result;
  }


}
//That`s all folks!