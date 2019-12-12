<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¡Oh! (°o° ) ¡es Fredy Arciniegas, el intelectualoide millonario!  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Manejointegradoenfermedades.php');
require_once realpath('../dao/interfaz/IManejointegradoenfermedadesDao.php');
require_once realpath('../dto/Mipe.php');

class ManejointegradoenfermedadesFacade {

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
   * Crea un objeto Manejointegradoenfermedades a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idmanejoIntegradoEnfermedades
   * @param descripcioManejoIntegradoEnfermedades
   * @param mipe_idmipe
   */
  public static function insert( $idmanejoIntegradoEnfermedades,  $descripcioManejoIntegradoEnfermedades,  $mipe_idmipe){
      $manejointegradoenfermedades = new Manejointegradoenfermedades();
      $manejointegradoenfermedades->setIdmanejoIntegradoEnfermedades($idmanejoIntegradoEnfermedades); 
      $manejointegradoenfermedades->setDescripcioManejoIntegradoEnfermedades($descripcioManejoIntegradoEnfermedades); 
      $manejointegradoenfermedades->setMipe_idmipe($mipe_idmipe); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $manejointegradoenfermedadesDao =$FactoryDao->getmanejointegradoenfermedadesDao(self::getDataBaseDefault());
     $rtn = $manejointegradoenfermedadesDao->insert($manejointegradoenfermedades);
     $manejointegradoenfermedadesDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Manejointegradoenfermedades de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idmanejoIntegradoEnfermedades
   * @return El objeto en base de datos o Null
   */
  public static function select($idmanejoIntegradoEnfermedades){
      $manejointegradoenfermedades = new Manejointegradoenfermedades();
      $manejointegradoenfermedades->setIdmanejoIntegradoEnfermedades($idmanejoIntegradoEnfermedades); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $manejointegradoenfermedadesDao =$FactoryDao->getmanejointegradoenfermedadesDao(self::getDataBaseDefault());
     $result = $manejointegradoenfermedadesDao->select($manejointegradoenfermedades);
     $manejointegradoenfermedadesDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Manejointegradoenfermedades  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idmanejoIntegradoEnfermedades
   * @param descripcioManejoIntegradoEnfermedades
   * @param mipe_idmipe
   */
  public static function update($idmanejoIntegradoEnfermedades, $descripcioManejoIntegradoEnfermedades, $mipe_idmipe){
      $manejointegradoenfermedades = self::select($idmanejoIntegradoEnfermedades);
      $manejointegradoenfermedades->setDescripcioManejoIntegradoEnfermedades($descripcioManejoIntegradoEnfermedades); 
      $manejointegradoenfermedades->setMipe_idmipe($mipe_idmipe); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $manejointegradoenfermedadesDao =$FactoryDao->getmanejointegradoenfermedadesDao(self::getDataBaseDefault());
     $manejointegradoenfermedadesDao->update($manejointegradoenfermedades);
     $manejointegradoenfermedadesDao->close();
  }

  /**
   * Elimina un objeto Manejointegradoenfermedades de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idmanejoIntegradoEnfermedades
   */
  public static function delete($idmanejoIntegradoEnfermedades){
      $manejointegradoenfermedades = new Manejointegradoenfermedades();
      $manejointegradoenfermedades->setIdmanejoIntegradoEnfermedades($idmanejoIntegradoEnfermedades); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $manejointegradoenfermedadesDao =$FactoryDao->getmanejointegradoenfermedadesDao(self::getDataBaseDefault());
     $manejointegradoenfermedadesDao->delete($manejointegradoenfermedades);
     $manejointegradoenfermedadesDao->close();
  }

  /**
   * Lista todos los objetos Manejointegradoenfermedades de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Manejointegradoenfermedades en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $manejointegradoenfermedadesDao =$FactoryDao->getmanejointegradoenfermedadesDao(self::getDataBaseDefault());
     $result = $manejointegradoenfermedadesDao->listAll();
     $manejointegradoenfermedadesDao->close();
     return $result;
  }


}
//That`s all folks!