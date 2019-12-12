<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Lo sé porque lo sabe Fredy  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Metricaquimicasuelo.php');
require_once realpath('../dao/interfaz/IMetricaquimicasueloDao.php');
require_once realpath('../dto/Quimicasuelo.php');

class MetricaquimicasueloFacade {

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
   * Crea un objeto Metricaquimicasuelo a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idmetricaQuimicaSuelo
   * @param descripcionMetricaQuimicaSuelocol
   * @param quimicaSuelo_idQuimicaSuelo
   */
  public static function insert( $idmetricaQuimicaSuelo,  $descripcionMetricaQuimicaSuelocol,  $quimicaSuelo_idQuimicaSuelo){
      $metricaquimicasuelo = new Metricaquimicasuelo();
      $metricaquimicasuelo->setIdmetricaQuimicaSuelo($idmetricaQuimicaSuelo); 
      $metricaquimicasuelo->setDescripcionMetricaQuimicaSuelocol($descripcionMetricaQuimicaSuelocol); 
      $metricaquimicasuelo->setQuimicaSuelo_idQuimicaSuelo($quimicaSuelo_idQuimicaSuelo); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $metricaquimicasueloDao =$FactoryDao->getmetricaquimicasueloDao(self::getDataBaseDefault());
     $rtn = $metricaquimicasueloDao->insert($metricaquimicasuelo);
     $metricaquimicasueloDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Metricaquimicasuelo de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idmetricaQuimicaSuelo
   * @return El objeto en base de datos o Null
   */
  public static function select($idmetricaQuimicaSuelo){
      $metricaquimicasuelo = new Metricaquimicasuelo();
      $metricaquimicasuelo->setIdmetricaQuimicaSuelo($idmetricaQuimicaSuelo); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $metricaquimicasueloDao =$FactoryDao->getmetricaquimicasueloDao(self::getDataBaseDefault());
     $result = $metricaquimicasueloDao->select($metricaquimicasuelo);
     $metricaquimicasueloDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Metricaquimicasuelo  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idmetricaQuimicaSuelo
   * @param descripcionMetricaQuimicaSuelocol
   * @param quimicaSuelo_idQuimicaSuelo
   */
  public static function update($idmetricaQuimicaSuelo, $descripcionMetricaQuimicaSuelocol, $quimicaSuelo_idQuimicaSuelo){
      $metricaquimicasuelo = self::select($idmetricaQuimicaSuelo);
      $metricaquimicasuelo->setDescripcionMetricaQuimicaSuelocol($descripcionMetricaQuimicaSuelocol); 
      $metricaquimicasuelo->setQuimicaSuelo_idQuimicaSuelo($quimicaSuelo_idQuimicaSuelo); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $metricaquimicasueloDao =$FactoryDao->getmetricaquimicasueloDao(self::getDataBaseDefault());
     $metricaquimicasueloDao->update($metricaquimicasuelo);
     $metricaquimicasueloDao->close();
  }

  /**
   * Elimina un objeto Metricaquimicasuelo de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idmetricaQuimicaSuelo
   */
  public static function delete($idmetricaQuimicaSuelo){
      $metricaquimicasuelo = new Metricaquimicasuelo();
      $metricaquimicasuelo->setIdmetricaQuimicaSuelo($idmetricaQuimicaSuelo); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $metricaquimicasueloDao =$FactoryDao->getmetricaquimicasueloDao(self::getDataBaseDefault());
     $metricaquimicasueloDao->delete($metricaquimicasuelo);
     $metricaquimicasueloDao->close();
  }

  /**
   * Lista todos los objetos Metricaquimicasuelo de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Metricaquimicasuelo en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $metricaquimicasueloDao =$FactoryDao->getmetricaquimicasueloDao(self::getDataBaseDefault());
     $result = $metricaquimicasueloDao->listAll();
     $metricaquimicasueloDao->close();
     return $result;
  }


}
//That`s all folks!