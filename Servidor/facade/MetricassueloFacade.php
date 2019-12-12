<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Ojos de perro azul  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Metricassuelo.php');
require_once realpath('../dao/interfaz/IMetricassueloDao.php');
require_once realpath('../dto/Fisicasuelo.php');

class MetricassueloFacade {

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
   * Crea un objeto Metricassuelo a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idmetricasSuelo
   * @param descripcioMetricasSuelo
   * @param fisicaSuelo_idfisicaSuelo
   */
  public static function insert( $idmetricasSuelo,  $descripcioMetricasSuelo,  $fisicaSuelo_idfisicaSuelo){
      $metricassuelo = new Metricassuelo();
      $metricassuelo->setIdmetricasSuelo($idmetricasSuelo); 
      $metricassuelo->setDescripcioMetricasSuelo($descripcioMetricasSuelo); 
      $metricassuelo->setFisicaSuelo_idfisicaSuelo($fisicaSuelo_idfisicaSuelo); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $metricassueloDao =$FactoryDao->getmetricassueloDao(self::getDataBaseDefault());
     $rtn = $metricassueloDao->insert($metricassuelo);
     $metricassueloDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Metricassuelo de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idmetricasSuelo
   * @return El objeto en base de datos o Null
   */
  public static function select($idmetricasSuelo){
      $metricassuelo = new Metricassuelo();
      $metricassuelo->setIdmetricasSuelo($idmetricasSuelo); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $metricassueloDao =$FactoryDao->getmetricassueloDao(self::getDataBaseDefault());
     $result = $metricassueloDao->select($metricassuelo);
     $metricassueloDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Metricassuelo  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idmetricasSuelo
   * @param descripcioMetricasSuelo
   * @param fisicaSuelo_idfisicaSuelo
   */
  public static function update($idmetricasSuelo, $descripcioMetricasSuelo, $fisicaSuelo_idfisicaSuelo){
      $metricassuelo = self::select($idmetricasSuelo);
      $metricassuelo->setDescripcioMetricasSuelo($descripcioMetricasSuelo); 
      $metricassuelo->setFisicaSuelo_idfisicaSuelo($fisicaSuelo_idfisicaSuelo); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $metricassueloDao =$FactoryDao->getmetricassueloDao(self::getDataBaseDefault());
     $metricassueloDao->update($metricassuelo);
     $metricassueloDao->close();
  }

  /**
   * Elimina un objeto Metricassuelo de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idmetricasSuelo
   */
  public static function delete($idmetricasSuelo){
      $metricassuelo = new Metricassuelo();
      $metricassuelo->setIdmetricasSuelo($idmetricasSuelo); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $metricassueloDao =$FactoryDao->getmetricassueloDao(self::getDataBaseDefault());
     $metricassueloDao->delete($metricassuelo);
     $metricassueloDao->close();
  }

  /**
   * Lista todos los objetos Metricassuelo de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Metricassuelo en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $metricassueloDao =$FactoryDao->getmetricassueloDao(self::getDataBaseDefault());
     $result = $metricassueloDao->listAll();
     $metricassueloDao->close();
     return $result;
  }


}
//That`s all folks!