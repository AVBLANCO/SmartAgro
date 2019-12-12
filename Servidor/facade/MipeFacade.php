<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Generar buen código o poner frases graciosas? ¡La frase! ¡La frase!  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Mipe.php');
require_once realpath('../dao/interfaz/IMipeDao.php');
require_once realpath('../dto/Lote.php');

class MipeFacade {

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
   * Crea un objeto Mipe a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idmipe
   * @param decripcionMipe
   * @param fechaMipe
   * @param lote_idlote
   */
  public static function insert( $idmipe,  $decripcionMipe,  $fechaMipe,  $lote_idlote){
      $mipe = new Mipe();
      $mipe->setIdmipe($idmipe); 
      $mipe->setDecripcionMipe($decripcionMipe); 
      $mipe->setFechaMipe($fechaMipe); 
      $mipe->setLote_idlote($lote_idlote); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $mipeDao =$FactoryDao->getmipeDao(self::getDataBaseDefault());
     $rtn = $mipeDao->insert($mipe);
     $mipeDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Mipe de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idmipe
   * @return El objeto en base de datos o Null
   */
  public static function select($idmipe){
      $mipe = new Mipe();
      $mipe->setIdmipe($idmipe); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $mipeDao =$FactoryDao->getmipeDao(self::getDataBaseDefault());
     $result = $mipeDao->select($mipe);
     $mipeDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Mipe  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idmipe
   * @param decripcionMipe
   * @param fechaMipe
   * @param lote_idlote
   */
  public static function update($idmipe, $decripcionMipe, $fechaMipe, $lote_idlote){
      $mipe = self::select($idmipe);
      $mipe->setDecripcionMipe($decripcionMipe); 
      $mipe->setFechaMipe($fechaMipe); 
      $mipe->setLote_idlote($lote_idlote); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $mipeDao =$FactoryDao->getmipeDao(self::getDataBaseDefault());
     $mipeDao->update($mipe);
     $mipeDao->close();
  }

  /**
   * Elimina un objeto Mipe de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idmipe
   */
  public static function delete($idmipe){
      $mipe = new Mipe();
      $mipe->setIdmipe($idmipe); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $mipeDao =$FactoryDao->getmipeDao(self::getDataBaseDefault());
     $mipeDao->delete($mipe);
     $mipeDao->close();
  }

  /**
   * Lista todos los objetos Mipe de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Mipe en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $mipeDao =$FactoryDao->getmipeDao(self::getDataBaseDefault());
     $result = $mipeDao->listAll();
     $mipeDao->close();
     return $result;
  }


}
//That`s all folks!