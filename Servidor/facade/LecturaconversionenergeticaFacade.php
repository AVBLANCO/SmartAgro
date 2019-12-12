<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¡Vaya! ¡Al fin harás algo mejor que una calculadora!  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Lecturaconversionenergetica.php');
require_once realpath('../dao/interfaz/ILecturaconversionenergeticaDao.php');
require_once realpath('../dto/Metricaconversionenergetica.php');

class LecturaconversionenergeticaFacade {

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
   * Crea un objeto Lecturaconversionenergetica a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idlecturaConversionEnergetica
   * @param fechaLecturaConversionEnergetica
   * @param valorLecturaConversionEnergeticacol
   * @param metricaConversionEnergetica_idmetricaConversionEnergetica
   */
  public static function insert( $idlecturaConversionEnergetica,  $fechaLecturaConversionEnergetica,  $valorLecturaConversionEnergeticacol,  $metricaConversionEnergetica_idmetricaConversionEnergetica){
      $lecturaconversionenergetica = new Lecturaconversionenergetica();
      $lecturaconversionenergetica->setIdlecturaConversionEnergetica($idlecturaConversionEnergetica); 
      $lecturaconversionenergetica->setFechaLecturaConversionEnergetica($fechaLecturaConversionEnergetica); 
      $lecturaconversionenergetica->setValorLecturaConversionEnergeticacol($valorLecturaConversionEnergeticacol); 
      $lecturaconversionenergetica->setMetricaConversionEnergetica_idmetricaConversionEnergetica($metricaConversionEnergetica_idmetricaConversionEnergetica); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $lecturaconversionenergeticaDao =$FactoryDao->getlecturaconversionenergeticaDao(self::getDataBaseDefault());
     $rtn = $lecturaconversionenergeticaDao->insert($lecturaconversionenergetica);
     $lecturaconversionenergeticaDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Lecturaconversionenergetica de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idlecturaConversionEnergetica
   * @return El objeto en base de datos o Null
   */
  public static function select($idlecturaConversionEnergetica){
      $lecturaconversionenergetica = new Lecturaconversionenergetica();
      $lecturaconversionenergetica->setIdlecturaConversionEnergetica($idlecturaConversionEnergetica); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $lecturaconversionenergeticaDao =$FactoryDao->getlecturaconversionenergeticaDao(self::getDataBaseDefault());
     $result = $lecturaconversionenergeticaDao->select($lecturaconversionenergetica);
     $lecturaconversionenergeticaDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Lecturaconversionenergetica  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idlecturaConversionEnergetica
   * @param fechaLecturaConversionEnergetica
   * @param valorLecturaConversionEnergeticacol
   * @param metricaConversionEnergetica_idmetricaConversionEnergetica
   */
  public static function update($idlecturaConversionEnergetica, $fechaLecturaConversionEnergetica, $valorLecturaConversionEnergeticacol, $metricaConversionEnergetica_idmetricaConversionEnergetica){
      $lecturaconversionenergetica = self::select($idlecturaConversionEnergetica);
      $lecturaconversionenergetica->setFechaLecturaConversionEnergetica($fechaLecturaConversionEnergetica); 
      $lecturaconversionenergetica->setValorLecturaConversionEnergeticacol($valorLecturaConversionEnergeticacol); 
      $lecturaconversionenergetica->setMetricaConversionEnergetica_idmetricaConversionEnergetica($metricaConversionEnergetica_idmetricaConversionEnergetica); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $lecturaconversionenergeticaDao =$FactoryDao->getlecturaconversionenergeticaDao(self::getDataBaseDefault());
     $lecturaconversionenergeticaDao->update($lecturaconversionenergetica);
     $lecturaconversionenergeticaDao->close();
  }

  /**
   * Elimina un objeto Lecturaconversionenergetica de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idlecturaConversionEnergetica
   */
  public static function delete($idlecturaConversionEnergetica){
      $lecturaconversionenergetica = new Lecturaconversionenergetica();
      $lecturaconversionenergetica->setIdlecturaConversionEnergetica($idlecturaConversionEnergetica); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $lecturaconversionenergeticaDao =$FactoryDao->getlecturaconversionenergeticaDao(self::getDataBaseDefault());
     $lecturaconversionenergeticaDao->delete($lecturaconversionenergetica);
     $lecturaconversionenergeticaDao->close();
  }

  /**
   * Lista todos los objetos Lecturaconversionenergetica de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Lecturaconversionenergetica en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $lecturaconversionenergeticaDao =$FactoryDao->getlecturaconversionenergeticaDao(self::getDataBaseDefault());
     $result = $lecturaconversionenergeticaDao->listAll();
     $lecturaconversionenergeticaDao->close();
     return $result;
  }


}
//That`s all folks!