<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Y pensar que Anarchy está hecho en código espagueti...  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Manejointegradoplagas.php');
require_once realpath('../dao/interfaz/IManejointegradoplagasDao.php');
require_once realpath('../dto/Mipe.php');

class ManejointegradoplagasFacade {

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
   * Crea un objeto Manejointegradoplagas a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idmanejoIntegradoPlagas
   * @param descricionManejoIntegradoPlagas
   * @param mipe_idmipe
   */
  public static function insert( $idmanejoIntegradoPlagas,  $descricionManejoIntegradoPlagas,  $mipe_idmipe){
      $manejointegradoplagas = new Manejointegradoplagas();
      $manejointegradoplagas->setIdmanejoIntegradoPlagas($idmanejoIntegradoPlagas); 
      $manejointegradoplagas->setDescricionManejoIntegradoPlagas($descricionManejoIntegradoPlagas); 
      $manejointegradoplagas->setMipe_idmipe($mipe_idmipe); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $manejointegradoplagasDao =$FactoryDao->getmanejointegradoplagasDao(self::getDataBaseDefault());
     $rtn = $manejointegradoplagasDao->insert($manejointegradoplagas);
     $manejointegradoplagasDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Manejointegradoplagas de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idmanejoIntegradoPlagas
   * @return El objeto en base de datos o Null
   */
  public static function select($idmanejoIntegradoPlagas){
      $manejointegradoplagas = new Manejointegradoplagas();
      $manejointegradoplagas->setIdmanejoIntegradoPlagas($idmanejoIntegradoPlagas); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $manejointegradoplagasDao =$FactoryDao->getmanejointegradoplagasDao(self::getDataBaseDefault());
     $result = $manejointegradoplagasDao->select($manejointegradoplagas);
     $manejointegradoplagasDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Manejointegradoplagas  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idmanejoIntegradoPlagas
   * @param descricionManejoIntegradoPlagas
   * @param mipe_idmipe
   */
  public static function update($idmanejoIntegradoPlagas, $descricionManejoIntegradoPlagas, $mipe_idmipe){
      $manejointegradoplagas = self::select($idmanejoIntegradoPlagas);
      $manejointegradoplagas->setDescricionManejoIntegradoPlagas($descricionManejoIntegradoPlagas); 
      $manejointegradoplagas->setMipe_idmipe($mipe_idmipe); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $manejointegradoplagasDao =$FactoryDao->getmanejointegradoplagasDao(self::getDataBaseDefault());
     $manejointegradoplagasDao->update($manejointegradoplagas);
     $manejointegradoplagasDao->close();
  }

  /**
   * Elimina un objeto Manejointegradoplagas de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idmanejoIntegradoPlagas
   */
  public static function delete($idmanejoIntegradoPlagas){
      $manejointegradoplagas = new Manejointegradoplagas();
      $manejointegradoplagas->setIdmanejoIntegradoPlagas($idmanejoIntegradoPlagas); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $manejointegradoplagasDao =$FactoryDao->getmanejointegradoplagasDao(self::getDataBaseDefault());
     $manejointegradoplagasDao->delete($manejointegradoplagas);
     $manejointegradoplagasDao->close();
  }

  /**
   * Lista todos los objetos Manejointegradoplagas de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Manejointegradoplagas en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $manejointegradoplagasDao =$FactoryDao->getmanejointegradoplagasDao(self::getDataBaseDefault());
     $result = $manejointegradoplagasDao->listAll();
     $manejointegradoplagasDao->close();
     return $result;
  }


}
//That`s all folks!