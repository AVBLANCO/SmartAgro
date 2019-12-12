<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Vine a Comala porque me dijeron que acá vivía mi padre, un tal Pedro Páramo.  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Lecturaevotranspiracion.php');
require_once realpath('../dao/interfaz/ILecturaevotranspiracionDao.php');
require_once realpath('../dto/Metricaevotranspiracion.php');

class LecturaevotranspiracionFacade {

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
   * Crea un objeto Lecturaevotranspiracion a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idlecturaEvotranspiracion
   * @param fechaLecturaEvotranspiracion
   * @param valorLecturaEvotranspiracion
   * @param metricaEvotranspiracion_idmetricaEvotranspiracion
   */
  public static function insert( $idlecturaEvotranspiracion,  $fechaLecturaEvotranspiracion,  $valorLecturaEvotranspiracion,  $metricaEvotranspiracion_idmetricaEvotranspiracion){
      $lecturaevotranspiracion = new Lecturaevotranspiracion();
      $lecturaevotranspiracion->setIdlecturaEvotranspiracion($idlecturaEvotranspiracion); 
      $lecturaevotranspiracion->setFechaLecturaEvotranspiracion($fechaLecturaEvotranspiracion); 
      $lecturaevotranspiracion->setValorLecturaEvotranspiracion($valorLecturaEvotranspiracion); 
      $lecturaevotranspiracion->setMetricaEvotranspiracion_idmetricaEvotranspiracion($metricaEvotranspiracion_idmetricaEvotranspiracion); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $lecturaevotranspiracionDao =$FactoryDao->getlecturaevotranspiracionDao(self::getDataBaseDefault());
     $rtn = $lecturaevotranspiracionDao->insert($lecturaevotranspiracion);
     $lecturaevotranspiracionDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Lecturaevotranspiracion de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idlecturaEvotranspiracion
   * @return El objeto en base de datos o Null
   */
  public static function select($idlecturaEvotranspiracion){
      $lecturaevotranspiracion = new Lecturaevotranspiracion();
      $lecturaevotranspiracion->setIdlecturaEvotranspiracion($idlecturaEvotranspiracion); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $lecturaevotranspiracionDao =$FactoryDao->getlecturaevotranspiracionDao(self::getDataBaseDefault());
     $result = $lecturaevotranspiracionDao->select($lecturaevotranspiracion);
     $lecturaevotranspiracionDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Lecturaevotranspiracion  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idlecturaEvotranspiracion
   * @param fechaLecturaEvotranspiracion
   * @param valorLecturaEvotranspiracion
   * @param metricaEvotranspiracion_idmetricaEvotranspiracion
   */
  public static function update($idlecturaEvotranspiracion, $fechaLecturaEvotranspiracion, $valorLecturaEvotranspiracion, $metricaEvotranspiracion_idmetricaEvotranspiracion){
      $lecturaevotranspiracion = self::select($idlecturaEvotranspiracion);
      $lecturaevotranspiracion->setFechaLecturaEvotranspiracion($fechaLecturaEvotranspiracion); 
      $lecturaevotranspiracion->setValorLecturaEvotranspiracion($valorLecturaEvotranspiracion); 
      $lecturaevotranspiracion->setMetricaEvotranspiracion_idmetricaEvotranspiracion($metricaEvotranspiracion_idmetricaEvotranspiracion); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $lecturaevotranspiracionDao =$FactoryDao->getlecturaevotranspiracionDao(self::getDataBaseDefault());
     $lecturaevotranspiracionDao->update($lecturaevotranspiracion);
     $lecturaevotranspiracionDao->close();
  }

  /**
   * Elimina un objeto Lecturaevotranspiracion de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idlecturaEvotranspiracion
   */
  public static function delete($idlecturaEvotranspiracion){
      $lecturaevotranspiracion = new Lecturaevotranspiracion();
      $lecturaevotranspiracion->setIdlecturaEvotranspiracion($idlecturaEvotranspiracion); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $lecturaevotranspiracionDao =$FactoryDao->getlecturaevotranspiracionDao(self::getDataBaseDefault());
     $lecturaevotranspiracionDao->delete($lecturaevotranspiracion);
     $lecturaevotranspiracionDao->close();
  }

  /**
   * Lista todos los objetos Lecturaevotranspiracion de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Lecturaevotranspiracion en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $lecturaevotranspiracionDao =$FactoryDao->getlecturaevotranspiracionDao(self::getDataBaseDefault());
     $result = $lecturaevotranspiracionDao->listAll();
     $lecturaevotranspiracionDao->close();
     return $result;
  }


}
//That`s all folks!