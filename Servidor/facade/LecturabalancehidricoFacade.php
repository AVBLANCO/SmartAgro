<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Quédate con quien te quiera por tu back-end, no por tu front-end  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Lecturabalancehidrico.php');
require_once realpath('../dao/interfaz/ILecturabalancehidricoDao.php');
require_once realpath('../dto/Metricabalancehidrico.php');

class LecturabalancehidricoFacade {

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
   * Crea un objeto Lecturabalancehidrico a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idlecturaBalanceHidrico
   * @param fechaLecturaBalanceHidrico
   * @param valorLecturaBalanceHidrico
   * @param metricaBalanceHidrico_idmetricaBalanceHidrico
   */
  public static function insert( $idlecturaBalanceHidrico,  $fechaLecturaBalanceHidrico,  $valorLecturaBalanceHidrico,  $metricaBalanceHidrico_idmetricaBalanceHidrico){
      $lecturabalancehidrico = new Lecturabalancehidrico();
      $lecturabalancehidrico->setIdlecturaBalanceHidrico($idlecturaBalanceHidrico); 
      $lecturabalancehidrico->setFechaLecturaBalanceHidrico($fechaLecturaBalanceHidrico); 
      $lecturabalancehidrico->setValorLecturaBalanceHidrico($valorLecturaBalanceHidrico); 
      $lecturabalancehidrico->setMetricaBalanceHidrico_idmetricaBalanceHidrico($metricaBalanceHidrico_idmetricaBalanceHidrico); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $lecturabalancehidricoDao =$FactoryDao->getlecturabalancehidricoDao(self::getDataBaseDefault());
     $rtn = $lecturabalancehidricoDao->insert($lecturabalancehidrico);
     $lecturabalancehidricoDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Lecturabalancehidrico de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idlecturaBalanceHidrico
   * @return El objeto en base de datos o Null
   */
  public static function select($idlecturaBalanceHidrico){
      $lecturabalancehidrico = new Lecturabalancehidrico();
      $lecturabalancehidrico->setIdlecturaBalanceHidrico($idlecturaBalanceHidrico); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $lecturabalancehidricoDao =$FactoryDao->getlecturabalancehidricoDao(self::getDataBaseDefault());
     $result = $lecturabalancehidricoDao->select($lecturabalancehidrico);
     $lecturabalancehidricoDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Lecturabalancehidrico  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idlecturaBalanceHidrico
   * @param fechaLecturaBalanceHidrico
   * @param valorLecturaBalanceHidrico
   * @param metricaBalanceHidrico_idmetricaBalanceHidrico
   */
  public static function update($idlecturaBalanceHidrico, $fechaLecturaBalanceHidrico, $valorLecturaBalanceHidrico, $metricaBalanceHidrico_idmetricaBalanceHidrico){
      $lecturabalancehidrico = self::select($idlecturaBalanceHidrico);
      $lecturabalancehidrico->setFechaLecturaBalanceHidrico($fechaLecturaBalanceHidrico); 
      $lecturabalancehidrico->setValorLecturaBalanceHidrico($valorLecturaBalanceHidrico); 
      $lecturabalancehidrico->setMetricaBalanceHidrico_idmetricaBalanceHidrico($metricaBalanceHidrico_idmetricaBalanceHidrico); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $lecturabalancehidricoDao =$FactoryDao->getlecturabalancehidricoDao(self::getDataBaseDefault());
     $lecturabalancehidricoDao->update($lecturabalancehidrico);
     $lecturabalancehidricoDao->close();
  }

  /**
   * Elimina un objeto Lecturabalancehidrico de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idlecturaBalanceHidrico
   */
  public static function delete($idlecturaBalanceHidrico){
      $lecturabalancehidrico = new Lecturabalancehidrico();
      $lecturabalancehidrico->setIdlecturaBalanceHidrico($idlecturaBalanceHidrico); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $lecturabalancehidricoDao =$FactoryDao->getlecturabalancehidricoDao(self::getDataBaseDefault());
     $lecturabalancehidricoDao->delete($lecturabalancehidrico);
     $lecturabalancehidricoDao->close();
  }

  /**
   * Lista todos los objetos Lecturabalancehidrico de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Lecturabalancehidrico en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $lecturabalancehidricoDao =$FactoryDao->getlecturabalancehidricoDao(self::getDataBaseDefault());
     $result = $lecturabalancehidricoDao->listAll();
     $lecturabalancehidricoDao->close();
     return $result;
  }


}
//That`s all folks!