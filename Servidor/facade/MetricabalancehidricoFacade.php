<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    En lo que a mí respecta, señor Dix, lo imprevisto no existe  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Metricabalancehidrico.php');
require_once realpath('../dao/interfaz/IMetricabalancehidricoDao.php');
require_once realpath('../dto/Balancehidrico.php');

class MetricabalancehidricoFacade {

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
   * Crea un objeto Metricabalancehidrico a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idmetricaBalanceHidrico
   * @param descripcionMetricaBalanceHidrico
   * @param balanceHidrico_idbalanceHidrico
   */
  public static function insert( $idmetricaBalanceHidrico,  $descripcionMetricaBalanceHidrico,  $balanceHidrico_idbalanceHidrico){
      $metricabalancehidrico = new Metricabalancehidrico();
      $metricabalancehidrico->setIdmetricaBalanceHidrico($idmetricaBalanceHidrico); 
      $metricabalancehidrico->setDescripcionMetricaBalanceHidrico($descripcionMetricaBalanceHidrico); 
      $metricabalancehidrico->setBalanceHidrico_idbalanceHidrico($balanceHidrico_idbalanceHidrico); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $metricabalancehidricoDao =$FactoryDao->getmetricabalancehidricoDao(self::getDataBaseDefault());
     $rtn = $metricabalancehidricoDao->insert($metricabalancehidrico);
     $metricabalancehidricoDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Metricabalancehidrico de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idmetricaBalanceHidrico
   * @return El objeto en base de datos o Null
   */
  public static function select($idmetricaBalanceHidrico){
      $metricabalancehidrico = new Metricabalancehidrico();
      $metricabalancehidrico->setIdmetricaBalanceHidrico($idmetricaBalanceHidrico); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $metricabalancehidricoDao =$FactoryDao->getmetricabalancehidricoDao(self::getDataBaseDefault());
     $result = $metricabalancehidricoDao->select($metricabalancehidrico);
     $metricabalancehidricoDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Metricabalancehidrico  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idmetricaBalanceHidrico
   * @param descripcionMetricaBalanceHidrico
   * @param balanceHidrico_idbalanceHidrico
   */
  public static function update($idmetricaBalanceHidrico, $descripcionMetricaBalanceHidrico, $balanceHidrico_idbalanceHidrico){
      $metricabalancehidrico = self::select($idmetricaBalanceHidrico);
      $metricabalancehidrico->setDescripcionMetricaBalanceHidrico($descripcionMetricaBalanceHidrico); 
      $metricabalancehidrico->setBalanceHidrico_idbalanceHidrico($balanceHidrico_idbalanceHidrico); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $metricabalancehidricoDao =$FactoryDao->getmetricabalancehidricoDao(self::getDataBaseDefault());
     $metricabalancehidricoDao->update($metricabalancehidrico);
     $metricabalancehidricoDao->close();
  }

  /**
   * Elimina un objeto Metricabalancehidrico de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idmetricaBalanceHidrico
   */
  public static function delete($idmetricaBalanceHidrico){
      $metricabalancehidrico = new Metricabalancehidrico();
      $metricabalancehidrico->setIdmetricaBalanceHidrico($idmetricaBalanceHidrico); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $metricabalancehidricoDao =$FactoryDao->getmetricabalancehidricoDao(self::getDataBaseDefault());
     $metricabalancehidricoDao->delete($metricabalancehidrico);
     $metricabalancehidricoDao->close();
  }

  /**
   * Lista todos los objetos Metricabalancehidrico de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Metricabalancehidrico en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $metricabalancehidricoDao =$FactoryDao->getmetricabalancehidricoDao(self::getDataBaseDefault());
     $result = $metricabalancehidricoDao->listAll();
     $metricabalancehidricoDao->close();
     return $result;
  }


}
//That`s all folks!