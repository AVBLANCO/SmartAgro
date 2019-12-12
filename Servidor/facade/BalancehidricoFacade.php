<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Cuando Gregorio Samsa se despertó una mañana después de un sueño intranquilo, se encontró sobre su cama convertido en un monstruoso insecto.  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Balancehidrico.php');
require_once realpath('../dao/interfaz/IBalancehidricoDao.php');
require_once realpath('../dto/Agroclimatologia.php');

class BalancehidricoFacade {

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
   * Crea un objeto Balancehidrico a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idbalanceHidrico
   * @param descripcioBalanceHidricocol
   * @param fechabalanceHidrico
   * @param agroclimatologia_idagroclimatologia
   */
  public static function insert( $idbalanceHidrico,  $descripcioBalanceHidricocol,  $fechabalanceHidrico,  $agroclimatologia_idagroclimatologia){
      $balancehidrico = new Balancehidrico();
      $balancehidrico->setIdbalanceHidrico($idbalanceHidrico); 
      $balancehidrico->setDescripcioBalanceHidricocol($descripcioBalanceHidricocol); 
      $balancehidrico->setFechabalanceHidrico($fechabalanceHidrico); 
      $balancehidrico->setAgroclimatologia_idagroclimatologia($agroclimatologia_idagroclimatologia); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $balancehidricoDao =$FactoryDao->getbalancehidricoDao(self::getDataBaseDefault());
     $rtn = $balancehidricoDao->insert($balancehidrico);
     $balancehidricoDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Balancehidrico de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idbalanceHidrico
   * @return El objeto en base de datos o Null
   */
  public static function select($idbalanceHidrico){
      $balancehidrico = new Balancehidrico();
      $balancehidrico->setIdbalanceHidrico($idbalanceHidrico); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $balancehidricoDao =$FactoryDao->getbalancehidricoDao(self::getDataBaseDefault());
     $result = $balancehidricoDao->select($balancehidrico);
     $balancehidricoDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Balancehidrico  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idbalanceHidrico
   * @param descripcioBalanceHidricocol
   * @param fechabalanceHidrico
   * @param agroclimatologia_idagroclimatologia
   */
  public static function update($idbalanceHidrico, $descripcioBalanceHidricocol, $fechabalanceHidrico, $agroclimatologia_idagroclimatologia){
      $balancehidrico = self::select($idbalanceHidrico);
      $balancehidrico->setDescripcioBalanceHidricocol($descripcioBalanceHidricocol); 
      $balancehidrico->setFechabalanceHidrico($fechabalanceHidrico); 
      $balancehidrico->setAgroclimatologia_idagroclimatologia($agroclimatologia_idagroclimatologia); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $balancehidricoDao =$FactoryDao->getbalancehidricoDao(self::getDataBaseDefault());
     $balancehidricoDao->update($balancehidrico);
     $balancehidricoDao->close();
  }

  /**
   * Elimina un objeto Balancehidrico de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idbalanceHidrico
   */
  public static function delete($idbalanceHidrico){
      $balancehidrico = new Balancehidrico();
      $balancehidrico->setIdbalanceHidrico($idbalanceHidrico); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $balancehidricoDao =$FactoryDao->getbalancehidricoDao(self::getDataBaseDefault());
     $balancehidricoDao->delete($balancehidrico);
     $balancehidricoDao->close();
  }

  /**
   * Lista todos los objetos Balancehidrico de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Balancehidrico en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $balancehidricoDao =$FactoryDao->getbalancehidricoDao(self::getDataBaseDefault());
     $result = $balancehidricoDao->listAll();
     $balancehidricoDao->close();
     return $result;
  }


}
//That`s all folks!