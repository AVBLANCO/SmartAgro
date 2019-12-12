<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Cuando uses Anarchy, Georgie, tú también flotarás  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Suelo.php');
require_once realpath('../dao/interfaz/ISueloDao.php');
require_once realpath('../dto/Lote.php');

class SueloFacade {

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
   * Crea un objeto Suelo a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idsuelo
   * @param decripcionSuelo
   * @param fechaSuelo
   * @param lote_idlote
   */
  public static function insert( $idsuelo,  $decripcionSuelo,  $fechaSuelo,  $lote_idlote){
      $suelo = new Suelo();
      $suelo->setIdsuelo($idsuelo); 
      $suelo->setDecripcionSuelo($decripcionSuelo); 
      $suelo->setFechaSuelo($fechaSuelo); 
      $suelo->setLote_idlote($lote_idlote); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $sueloDao =$FactoryDao->getsueloDao(self::getDataBaseDefault());
     $rtn = $sueloDao->insert($suelo);
     $sueloDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Suelo de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idsuelo
   * @return El objeto en base de datos o Null
   */
  public static function select($idsuelo){
      $suelo = new Suelo();
      $suelo->setIdsuelo($idsuelo); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $sueloDao =$FactoryDao->getsueloDao(self::getDataBaseDefault());
     $result = $sueloDao->select($suelo);
     $sueloDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Suelo  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idsuelo
   * @param decripcionSuelo
   * @param fechaSuelo
   * @param lote_idlote
   */
  public static function update($idsuelo, $decripcionSuelo, $fechaSuelo, $lote_idlote){
      $suelo = self::select($idsuelo);
      $suelo->setDecripcionSuelo($decripcionSuelo); 
      $suelo->setFechaSuelo($fechaSuelo); 
      $suelo->setLote_idlote($lote_idlote); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $sueloDao =$FactoryDao->getsueloDao(self::getDataBaseDefault());
     $sueloDao->update($suelo);
     $sueloDao->close();
  }

  /**
   * Elimina un objeto Suelo de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idsuelo
   */
  public static function delete($idsuelo){
      $suelo = new Suelo();
      $suelo->setIdsuelo($idsuelo); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $sueloDao =$FactoryDao->getsueloDao(self::getDataBaseDefault());
     $sueloDao->delete($suelo);
     $sueloDao->close();
  }

  /**
   * Lista todos los objetos Suelo de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Suelo en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $sueloDao =$FactoryDao->getsueloDao(self::getDataBaseDefault());
     $result = $sueloDao->listAll();
     $sueloDao->close();
     return $result;
  }


}
//That`s all folks!