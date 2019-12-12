<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Un tequila, antes de que empiecen los trancazos  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Evotranspiracion.php');
require_once realpath('../dao/interfaz/IEvotranspiracionDao.php');
require_once realpath('../dto/Agroclimatologia.php');

class EvotranspiracionFacade {

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
   * Crea un objeto Evotranspiracion a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idevotranspiracion
   * @param descripcionEvotranspiracion
   * @param fechaEvotranspiracion
   * @param agroclimatologia_idagroclimatologia
   */
  public static function insert( $idevotranspiracion,  $descripcionEvotranspiracion,  $fechaEvotranspiracion,  $agroclimatologia_idagroclimatologia){
      $evotranspiracion = new Evotranspiracion();
      $evotranspiracion->setIdevotranspiracion($idevotranspiracion); 
      $evotranspiracion->setDescripcionEvotranspiracion($descripcionEvotranspiracion); 
      $evotranspiracion->setFechaEvotranspiracion($fechaEvotranspiracion); 
      $evotranspiracion->setAgroclimatologia_idagroclimatologia($agroclimatologia_idagroclimatologia); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $evotranspiracionDao =$FactoryDao->getevotranspiracionDao(self::getDataBaseDefault());
     $rtn = $evotranspiracionDao->insert($evotranspiracion);
     $evotranspiracionDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Evotranspiracion de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idevotranspiracion
   * @return El objeto en base de datos o Null
   */
  public static function select($idevotranspiracion){
      $evotranspiracion = new Evotranspiracion();
      $evotranspiracion->setIdevotranspiracion($idevotranspiracion); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $evotranspiracionDao =$FactoryDao->getevotranspiracionDao(self::getDataBaseDefault());
     $result = $evotranspiracionDao->select($evotranspiracion);
     $evotranspiracionDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Evotranspiracion  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idevotranspiracion
   * @param descripcionEvotranspiracion
   * @param fechaEvotranspiracion
   * @param agroclimatologia_idagroclimatologia
   */
  public static function update($idevotranspiracion, $descripcionEvotranspiracion, $fechaEvotranspiracion, $agroclimatologia_idagroclimatologia){
      $evotranspiracion = self::select($idevotranspiracion);
      $evotranspiracion->setDescripcionEvotranspiracion($descripcionEvotranspiracion); 
      $evotranspiracion->setFechaEvotranspiracion($fechaEvotranspiracion); 
      $evotranspiracion->setAgroclimatologia_idagroclimatologia($agroclimatologia_idagroclimatologia); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $evotranspiracionDao =$FactoryDao->getevotranspiracionDao(self::getDataBaseDefault());
     $evotranspiracionDao->update($evotranspiracion);
     $evotranspiracionDao->close();
  }

  /**
   * Elimina un objeto Evotranspiracion de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idevotranspiracion
   */
  public static function delete($idevotranspiracion){
      $evotranspiracion = new Evotranspiracion();
      $evotranspiracion->setIdevotranspiracion($idevotranspiracion); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $evotranspiracionDao =$FactoryDao->getevotranspiracionDao(self::getDataBaseDefault());
     $evotranspiracionDao->delete($evotranspiracion);
     $evotranspiracionDao->close();
  }

  /**
   * Lista todos los objetos Evotranspiracion de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Evotranspiracion en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $evotranspiracionDao =$FactoryDao->getevotranspiracionDao(self::getDataBaseDefault());
     $result = $evotranspiracionDao->listAll();
     $evotranspiracionDao->close();
     return $result;
  }


}
//That`s all folks!