<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Don´t call me gringo you f%&ing beanner  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Lote.php');
require_once realpath('../dao/interfaz/ILoteDao.php');
require_once realpath('../dto/Finca.php');

class LoteFacade {

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
   * Crea un objeto Lote a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idlote
   * @param descripcionLote
   * @param longitud
   * @param latitud
   * @param finca_idfinca
   */
  public static function insert( $idlote,  $descripcionLote,  $longitud,  $latitud,  $finca_idfinca){
      $lote = new Lote();
      $lote->setIdlote($idlote); 
      $lote->setDescripcionLote($descripcionLote); 
      $lote->setLongitud($longitud); 
      $lote->setLatitud($latitud); 
      $lote->setFinca_idfinca($finca_idfinca); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $loteDao =$FactoryDao->getloteDao(self::getDataBaseDefault());
     $rtn = $loteDao->insert($lote);
     $loteDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Lote de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idlote
   * @return El objeto en base de datos o Null
   */
  public static function select($idlote){
      $lote = new Lote();
      $lote->setIdlote($idlote); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $loteDao =$FactoryDao->getloteDao(self::getDataBaseDefault());
     $result = $loteDao->select($lote);
     $loteDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Lote  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idlote
   * @param descripcionLote
   * @param longitud
   * @param latitud
   * @param finca_idfinca
   */
  public static function update($idlote, $descripcionLote, $longitud, $latitud, $finca_idfinca){
      $lote = self::select($idlote);
      $lote->setDescripcionLote($descripcionLote); 
      $lote->setLongitud($longitud); 
      $lote->setLatitud($latitud); 
      $lote->setFinca_idfinca($finca_idfinca); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $loteDao =$FactoryDao->getloteDao(self::getDataBaseDefault());
     $loteDao->update($lote);
     $loteDao->close();
  }

  /**
   * Elimina un objeto Lote de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idlote
   */
  public static function delete($idlote){
      $lote = new Lote();
      $lote->setIdlote($idlote); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $loteDao =$FactoryDao->getloteDao(self::getDataBaseDefault());
     $loteDao->delete($lote);
     $loteDao->close();
  }

  /**
   * Lista todos los objetos Lote de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Lote en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $loteDao =$FactoryDao->getloteDao(self::getDataBaseDefault());
     $result = $loteDao->listAll();
     $loteDao->close();
     return $result;
  }


}
//That`s all folks!