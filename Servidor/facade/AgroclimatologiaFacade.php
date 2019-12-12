<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Nuestra empresa cuenta con una división sólo para las frases. Disfrútalas  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Agroclimatologia.php');
require_once realpath('../dao/interfaz/IAgroclimatologiaDao.php');
require_once realpath('../dto/Lote.php');

class AgroclimatologiaFacade {

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
   * Crea un objeto Agroclimatologia a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idagroclimatologia
   * @param descripcionAgroclimatologia
   * @param fechaAgroclimatologia
   * @param lote_idlote
   */
  public static function insert( $idagroclimatologia,  $descripcionAgroclimatologia,  $fechaAgroclimatologia,  $lote_idlote){
      $agroclimatologia = new Agroclimatologia();
      $agroclimatologia->setIdagroclimatologia($idagroclimatologia); 
      $agroclimatologia->setDescripcionAgroclimatologia($descripcionAgroclimatologia); 
      $agroclimatologia->setFechaAgroclimatologia($fechaAgroclimatologia); 
      $agroclimatologia->setLote_idlote($lote_idlote); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $agroclimatologiaDao =$FactoryDao->getagroclimatologiaDao(self::getDataBaseDefault());
     $rtn = $agroclimatologiaDao->insert($agroclimatologia);
     $agroclimatologiaDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Agroclimatologia de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idagroclimatologia
   * @return El objeto en base de datos o Null
   */
  public static function select($idagroclimatologia){
      $agroclimatologia = new Agroclimatologia();
      $agroclimatologia->setIdagroclimatologia($idagroclimatologia); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $agroclimatologiaDao =$FactoryDao->getagroclimatologiaDao(self::getDataBaseDefault());
     $result = $agroclimatologiaDao->select($agroclimatologia);
     $agroclimatologiaDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Agroclimatologia  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idagroclimatologia
   * @param descripcionAgroclimatologia
   * @param fechaAgroclimatologia
   * @param lote_idlote
   */
  public static function update($idagroclimatologia, $descripcionAgroclimatologia, $fechaAgroclimatologia, $lote_idlote){
      $agroclimatologia = self::select($idagroclimatologia);
      $agroclimatologia->setDescripcionAgroclimatologia($descripcionAgroclimatologia); 
      $agroclimatologia->setFechaAgroclimatologia($fechaAgroclimatologia); 
      $agroclimatologia->setLote_idlote($lote_idlote); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $agroclimatologiaDao =$FactoryDao->getagroclimatologiaDao(self::getDataBaseDefault());
     $agroclimatologiaDao->update($agroclimatologia);
     $agroclimatologiaDao->close();
  }

  /**
   * Elimina un objeto Agroclimatologia de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idagroclimatologia
   */
  public static function delete($idagroclimatologia){
      $agroclimatologia = new Agroclimatologia();
      $agroclimatologia->setIdagroclimatologia($idagroclimatologia); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $agroclimatologiaDao =$FactoryDao->getagroclimatologiaDao(self::getDataBaseDefault());
     $agroclimatologiaDao->delete($agroclimatologia);
     $agroclimatologiaDao->close();
  }

  /**
   * Lista todos los objetos Agroclimatologia de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Agroclimatologia en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $agroclimatologiaDao =$FactoryDao->getagroclimatologiaDao(self::getDataBaseDefault());
     $result = $agroclimatologiaDao->listAll();
     $agroclimatologiaDao->close();
     return $result;
  }


}
//That`s all folks!