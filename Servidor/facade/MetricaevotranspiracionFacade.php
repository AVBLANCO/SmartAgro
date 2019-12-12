<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Me ayudas con la tesis?  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Metricaevotranspiracion.php');
require_once realpath('../dao/interfaz/IMetricaevotranspiracionDao.php');
require_once realpath('../dto/Evotranspiracion.php');

class MetricaevotranspiracionFacade {

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
   * Crea un objeto Metricaevotranspiracion a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idmetricaEvotranspiracion
   * @param descripcionMetricaEvotranspiracion
   * @param evotranspiracion_idevotranspiracion
   */
  public static function insert( $idmetricaEvotranspiracion,  $descripcionMetricaEvotranspiracion,  $evotranspiracion_idevotranspiracion){
      $metricaevotranspiracion = new Metricaevotranspiracion();
      $metricaevotranspiracion->setIdmetricaEvotranspiracion($idmetricaEvotranspiracion); 
      $metricaevotranspiracion->setDescripcionMetricaEvotranspiracion($descripcionMetricaEvotranspiracion); 
      $metricaevotranspiracion->setEvotranspiracion_idevotranspiracion($evotranspiracion_idevotranspiracion); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $metricaevotranspiracionDao =$FactoryDao->getmetricaevotranspiracionDao(self::getDataBaseDefault());
     $rtn = $metricaevotranspiracionDao->insert($metricaevotranspiracion);
     $metricaevotranspiracionDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Metricaevotranspiracion de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idmetricaEvotranspiracion
   * @return El objeto en base de datos o Null
   */
  public static function select($idmetricaEvotranspiracion){
      $metricaevotranspiracion = new Metricaevotranspiracion();
      $metricaevotranspiracion->setIdmetricaEvotranspiracion($idmetricaEvotranspiracion); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $metricaevotranspiracionDao =$FactoryDao->getmetricaevotranspiracionDao(self::getDataBaseDefault());
     $result = $metricaevotranspiracionDao->select($metricaevotranspiracion);
     $metricaevotranspiracionDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Metricaevotranspiracion  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idmetricaEvotranspiracion
   * @param descripcionMetricaEvotranspiracion
   * @param evotranspiracion_idevotranspiracion
   */
  public static function update($idmetricaEvotranspiracion, $descripcionMetricaEvotranspiracion, $evotranspiracion_idevotranspiracion){
      $metricaevotranspiracion = self::select($idmetricaEvotranspiracion);
      $metricaevotranspiracion->setDescripcionMetricaEvotranspiracion($descripcionMetricaEvotranspiracion); 
      $metricaevotranspiracion->setEvotranspiracion_idevotranspiracion($evotranspiracion_idevotranspiracion); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $metricaevotranspiracionDao =$FactoryDao->getmetricaevotranspiracionDao(self::getDataBaseDefault());
     $metricaevotranspiracionDao->update($metricaevotranspiracion);
     $metricaevotranspiracionDao->close();
  }

  /**
   * Elimina un objeto Metricaevotranspiracion de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idmetricaEvotranspiracion
   */
  public static function delete($idmetricaEvotranspiracion){
      $metricaevotranspiracion = new Metricaevotranspiracion();
      $metricaevotranspiracion->setIdmetricaEvotranspiracion($idmetricaEvotranspiracion); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $metricaevotranspiracionDao =$FactoryDao->getmetricaevotranspiracionDao(self::getDataBaseDefault());
     $metricaevotranspiracionDao->delete($metricaevotranspiracion);
     $metricaevotranspiracionDao->close();
  }

  /**
   * Lista todos los objetos Metricaevotranspiracion de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Metricaevotranspiracion en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $metricaevotranspiracionDao =$FactoryDao->getmetricaevotranspiracionDao(self::getDataBaseDefault());
     $result = $metricaevotranspiracionDao->listAll();
     $metricaevotranspiracionDao->close();
     return $result;
  }


}
//That`s all folks!