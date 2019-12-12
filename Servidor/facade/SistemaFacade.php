<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Cuando eres Ingeniero en sistemas, pero tu vocación siempre fueron los memes  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Sistema.php');
require_once realpath('../dao/interfaz/ISistemaDao.php');

class SistemaFacade {

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
   * Crea un objeto Sistema a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idsistema
   * @param descripcion
   */
  public static function insert( $idsistema,  $descripcion){
      $sistema = new Sistema();
      $sistema->setIdsistema($idsistema); 
      $sistema->setDescripcion($descripcion); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $sistemaDao =$FactoryDao->getsistemaDao(self::getDataBaseDefault());
     $rtn = $sistemaDao->insert($sistema);
     $sistemaDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Sistema de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idsistema
   * @return El objeto en base de datos o Null
   */
  public static function select($idsistema){
      $sistema = new Sistema();
      $sistema->setIdsistema($idsistema); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $sistemaDao =$FactoryDao->getsistemaDao(self::getDataBaseDefault());
     $result = $sistemaDao->select($sistema);
     $sistemaDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Sistema  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idsistema
   * @param descripcion
   */
  public static function update($idsistema, $descripcion){
      $sistema = self::select($idsistema);
      $sistema->setDescripcion($descripcion); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $sistemaDao =$FactoryDao->getsistemaDao(self::getDataBaseDefault());
     $sistemaDao->update($sistema);
     $sistemaDao->close();
  }

  /**
   * Elimina un objeto Sistema de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idsistema
   */
  public static function delete($idsistema){
      $sistema = new Sistema();
      $sistema->setIdsistema($idsistema); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $sistemaDao =$FactoryDao->getsistemaDao(self::getDataBaseDefault());
     $sistemaDao->delete($sistema);
     $sistemaDao->close();
  }

  /**
   * Lista todos los objetos Sistema de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Sistema en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $sistemaDao =$FactoryDao->getsistemaDao(self::getDataBaseDefault());
     $result = $sistemaDao->listAll();
     $sistemaDao->close();
     return $result;
  }


}
//That`s all folks!