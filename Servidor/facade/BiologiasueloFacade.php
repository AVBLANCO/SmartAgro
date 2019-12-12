<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Mátalos a todos, y que dios elija  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Biologiasuelo.php');
require_once realpath('../dao/interfaz/IBiologiasueloDao.php');
require_once realpath('../dto/Suelo.php');

class BiologiasueloFacade {

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
   * Crea un objeto Biologiasuelo a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idbiologiaSuelo
   * @param biologiaSuelo
   * @param suelo_idsuelo
   */
  public static function insert( $idbiologiaSuelo,  $biologiaSuelo,  $suelo_idsuelo){
      $biologiasuelo = new Biologiasuelo();
      $biologiasuelo->setIdbiologiaSuelo($idbiologiaSuelo); 
      $biologiasuelo->setBiologiaSuelo($biologiaSuelo); 
      $biologiasuelo->setSuelo_idsuelo($suelo_idsuelo); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $biologiasueloDao =$FactoryDao->getbiologiasueloDao(self::getDataBaseDefault());
     $rtn = $biologiasueloDao->insert($biologiasuelo);
     $biologiasueloDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Biologiasuelo de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idbiologiaSuelo
   * @return El objeto en base de datos o Null
   */
  public static function select($idbiologiaSuelo){
      $biologiasuelo = new Biologiasuelo();
      $biologiasuelo->setIdbiologiaSuelo($idbiologiaSuelo); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $biologiasueloDao =$FactoryDao->getbiologiasueloDao(self::getDataBaseDefault());
     $result = $biologiasueloDao->select($biologiasuelo);
     $biologiasueloDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Biologiasuelo  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idbiologiaSuelo
   * @param biologiaSuelo
   * @param suelo_idsuelo
   */
  public static function update($idbiologiaSuelo, $biologiaSuelo, $suelo_idsuelo){
      $biologiasuelo = self::select($idbiologiaSuelo);
      $biologiasuelo->setBiologiaSuelo($biologiaSuelo); 
      $biologiasuelo->setSuelo_idsuelo($suelo_idsuelo); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $biologiasueloDao =$FactoryDao->getbiologiasueloDao(self::getDataBaseDefault());
     $biologiasueloDao->update($biologiasuelo);
     $biologiasueloDao->close();
  }

  /**
   * Elimina un objeto Biologiasuelo de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idbiologiaSuelo
   */
  public static function delete($idbiologiaSuelo){
      $biologiasuelo = new Biologiasuelo();
      $biologiasuelo->setIdbiologiaSuelo($idbiologiaSuelo); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $biologiasueloDao =$FactoryDao->getbiologiasueloDao(self::getDataBaseDefault());
     $biologiasueloDao->delete($biologiasuelo);
     $biologiasueloDao->close();
  }

  /**
   * Lista todos los objetos Biologiasuelo de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Biologiasuelo en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $biologiasueloDao =$FactoryDao->getbiologiasueloDao(self::getDataBaseDefault());
     $result = $biologiasueloDao->listAll();
     $biologiasueloDao->close();
     return $result;
  }


}
//That`s all folks!