<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Recuerda, cuando enciendas la molotov, debes arrojarla  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Lecturabiologiasuelo.php');
require_once realpath('../dao/interfaz/ILecturabiologiasueloDao.php');
require_once realpath('../dto/Metricabiologiasuelo.php');

class LecturabiologiasueloFacade {

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
   * Crea un objeto Lecturabiologiasuelo a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idlecturaBiologiaSuelo
   * @param fechaLecturaBiologiaSuelo
   * @param valorLecturaBiologiaSuelocol
   * @param metricaBiologiaSuelo_idmetricaBiologiaSuelo
   */
  public static function insert( $idlecturaBiologiaSuelo,  $fechaLecturaBiologiaSuelo,  $valorLecturaBiologiaSuelocol,  $metricaBiologiaSuelo_idmetricaBiologiaSuelo){
      $lecturabiologiasuelo = new Lecturabiologiasuelo();
      $lecturabiologiasuelo->setIdlecturaBiologiaSuelo($idlecturaBiologiaSuelo); 
      $lecturabiologiasuelo->setFechaLecturaBiologiaSuelo($fechaLecturaBiologiaSuelo); 
      $lecturabiologiasuelo->setValorLecturaBiologiaSuelocol($valorLecturaBiologiaSuelocol); 
      $lecturabiologiasuelo->setMetricaBiologiaSuelo_idmetricaBiologiaSuelo($metricaBiologiaSuelo_idmetricaBiologiaSuelo); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $lecturabiologiasueloDao =$FactoryDao->getlecturabiologiasueloDao(self::getDataBaseDefault());
     $rtn = $lecturabiologiasueloDao->insert($lecturabiologiasuelo);
     $lecturabiologiasueloDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Lecturabiologiasuelo de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idlecturaBiologiaSuelo
   * @return El objeto en base de datos o Null
   */
  public static function select($idlecturaBiologiaSuelo){
      $lecturabiologiasuelo = new Lecturabiologiasuelo();
      $lecturabiologiasuelo->setIdlecturaBiologiaSuelo($idlecturaBiologiaSuelo); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $lecturabiologiasueloDao =$FactoryDao->getlecturabiologiasueloDao(self::getDataBaseDefault());
     $result = $lecturabiologiasueloDao->select($lecturabiologiasuelo);
     $lecturabiologiasueloDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Lecturabiologiasuelo  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idlecturaBiologiaSuelo
   * @param fechaLecturaBiologiaSuelo
   * @param valorLecturaBiologiaSuelocol
   * @param metricaBiologiaSuelo_idmetricaBiologiaSuelo
   */
  public static function update($idlecturaBiologiaSuelo, $fechaLecturaBiologiaSuelo, $valorLecturaBiologiaSuelocol, $metricaBiologiaSuelo_idmetricaBiologiaSuelo){
      $lecturabiologiasuelo = self::select($idlecturaBiologiaSuelo);
      $lecturabiologiasuelo->setFechaLecturaBiologiaSuelo($fechaLecturaBiologiaSuelo); 
      $lecturabiologiasuelo->setValorLecturaBiologiaSuelocol($valorLecturaBiologiaSuelocol); 
      $lecturabiologiasuelo->setMetricaBiologiaSuelo_idmetricaBiologiaSuelo($metricaBiologiaSuelo_idmetricaBiologiaSuelo); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $lecturabiologiasueloDao =$FactoryDao->getlecturabiologiasueloDao(self::getDataBaseDefault());
     $lecturabiologiasueloDao->update($lecturabiologiasuelo);
     $lecturabiologiasueloDao->close();
  }

  /**
   * Elimina un objeto Lecturabiologiasuelo de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idlecturaBiologiaSuelo
   */
  public static function delete($idlecturaBiologiaSuelo){
      $lecturabiologiasuelo = new Lecturabiologiasuelo();
      $lecturabiologiasuelo->setIdlecturaBiologiaSuelo($idlecturaBiologiaSuelo); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $lecturabiologiasueloDao =$FactoryDao->getlecturabiologiasueloDao(self::getDataBaseDefault());
     $lecturabiologiasueloDao->delete($lecturabiologiasuelo);
     $lecturabiologiasueloDao->close();
  }

  /**
   * Lista todos los objetos Lecturabiologiasuelo de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Lecturabiologiasuelo en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $lecturabiologiasueloDao =$FactoryDao->getlecturabiologiasueloDao(self::getDataBaseDefault());
     $result = $lecturabiologiasueloDao->listAll();
     $lecturabiologiasueloDao->close();
     return $result;
  }


}
//That`s all folks!