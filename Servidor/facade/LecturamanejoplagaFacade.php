<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Tenemos trabajos que odiamos para comprar cosas que no necesitamos.  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Lecturamanejoplaga.php');
require_once realpath('../dao/interfaz/ILecturamanejoplagaDao.php');
require_once realpath('../dto/Metricamanejoplagas.php');

class LecturamanejoplagaFacade {

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
   * Crea un objeto Lecturamanejoplaga a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idlecturaManejoPlaga
   * @param valorLecturaManejoPlagacol
   * @param fechaLecturaManejoPlaga
   * @param metricaManejoPlagas_idmetricaManejoPlagas
   */
  public static function insert( $idlecturaManejoPlaga,  $valorLecturaManejoPlagacol,  $fechaLecturaManejoPlaga,  $metricaManejoPlagas_idmetricaManejoPlagas){
      $lecturamanejoplaga = new Lecturamanejoplaga();
      $lecturamanejoplaga->setIdlecturaManejoPlaga($idlecturaManejoPlaga); 
      $lecturamanejoplaga->setValorLecturaManejoPlagacol($valorLecturaManejoPlagacol); 
      $lecturamanejoplaga->setFechaLecturaManejoPlaga($fechaLecturaManejoPlaga); 
      $lecturamanejoplaga->setMetricaManejoPlagas_idmetricaManejoPlagas($metricaManejoPlagas_idmetricaManejoPlagas); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $lecturamanejoplagaDao =$FactoryDao->getlecturamanejoplagaDao(self::getDataBaseDefault());
     $rtn = $lecturamanejoplagaDao->insert($lecturamanejoplaga);
     $lecturamanejoplagaDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Lecturamanejoplaga de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idlecturaManejoPlaga
   * @return El objeto en base de datos o Null
   */
  public static function select($idlecturaManejoPlaga){
      $lecturamanejoplaga = new Lecturamanejoplaga();
      $lecturamanejoplaga->setIdlecturaManejoPlaga($idlecturaManejoPlaga); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $lecturamanejoplagaDao =$FactoryDao->getlecturamanejoplagaDao(self::getDataBaseDefault());
     $result = $lecturamanejoplagaDao->select($lecturamanejoplaga);
     $lecturamanejoplagaDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Lecturamanejoplaga  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idlecturaManejoPlaga
   * @param valorLecturaManejoPlagacol
   * @param fechaLecturaManejoPlaga
   * @param metricaManejoPlagas_idmetricaManejoPlagas
   */
  public static function update($idlecturaManejoPlaga, $valorLecturaManejoPlagacol, $fechaLecturaManejoPlaga, $metricaManejoPlagas_idmetricaManejoPlagas){
      $lecturamanejoplaga = self::select($idlecturaManejoPlaga);
      $lecturamanejoplaga->setValorLecturaManejoPlagacol($valorLecturaManejoPlagacol); 
      $lecturamanejoplaga->setFechaLecturaManejoPlaga($fechaLecturaManejoPlaga); 
      $lecturamanejoplaga->setMetricaManejoPlagas_idmetricaManejoPlagas($metricaManejoPlagas_idmetricaManejoPlagas); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $lecturamanejoplagaDao =$FactoryDao->getlecturamanejoplagaDao(self::getDataBaseDefault());
     $lecturamanejoplagaDao->update($lecturamanejoplaga);
     $lecturamanejoplagaDao->close();
  }

  /**
   * Elimina un objeto Lecturamanejoplaga de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idlecturaManejoPlaga
   */
  public static function delete($idlecturaManejoPlaga){
      $lecturamanejoplaga = new Lecturamanejoplaga();
      $lecturamanejoplaga->setIdlecturaManejoPlaga($idlecturaManejoPlaga); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $lecturamanejoplagaDao =$FactoryDao->getlecturamanejoplagaDao(self::getDataBaseDefault());
     $lecturamanejoplagaDao->delete($lecturamanejoplaga);
     $lecturamanejoplagaDao->close();
  }

  /**
   * Lista todos los objetos Lecturamanejoplaga de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Lecturamanejoplaga en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $lecturamanejoplagaDao =$FactoryDao->getlecturamanejoplagaDao(self::getDataBaseDefault());
     $result = $lecturamanejoplagaDao->listAll();
     $lecturamanejoplagaDao->close();
     return $result;
  }


}
//That`s all folks!