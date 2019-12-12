<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Sabías que hay una vida afuera de tu cuarto?  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Meta.php');
require_once realpath('../dao/interfaz/IMetaDao.php');
require_once realpath('../dto/Proyeccion.php');

class MetaFacade {

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
   * Crea un objeto Meta a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idmeta
   * @param descripcionMeta
   * @param valorMeta
   * @param proyeccion_idproyeccion
   */
  public static function insert( $idmeta,  $descripcionMeta,  $valorMeta,  $proyeccion_idproyeccion){
      $meta = new Meta();
      $meta->setIdmeta($idmeta); 
      $meta->setDescripcionMeta($descripcionMeta); 
      $meta->setValorMeta($valorMeta); 
      $meta->setProyeccion_idproyeccion($proyeccion_idproyeccion); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $metaDao =$FactoryDao->getmetaDao(self::getDataBaseDefault());
     $rtn = $metaDao->insert($meta);
     $metaDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Meta de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idmeta
   * @return El objeto en base de datos o Null
   */
  public static function select($idmeta){
      $meta = new Meta();
      $meta->setIdmeta($idmeta); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $metaDao =$FactoryDao->getmetaDao(self::getDataBaseDefault());
     $result = $metaDao->select($meta);
     $metaDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Meta  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idmeta
   * @param descripcionMeta
   * @param valorMeta
   * @param proyeccion_idproyeccion
   */
  public static function update($idmeta, $descripcionMeta, $valorMeta, $proyeccion_idproyeccion){
      $meta = self::select($idmeta);
      $meta->setDescripcionMeta($descripcionMeta); 
      $meta->setValorMeta($valorMeta); 
      $meta->setProyeccion_idproyeccion($proyeccion_idproyeccion); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $metaDao =$FactoryDao->getmetaDao(self::getDataBaseDefault());
     $metaDao->update($meta);
     $metaDao->close();
  }

  /**
   * Elimina un objeto Meta de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idmeta
   */
  public static function delete($idmeta){
      $meta = new Meta();
      $meta->setIdmeta($idmeta); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $metaDao =$FactoryDao->getmetaDao(self::getDataBaseDefault());
     $metaDao->delete($meta);
     $metaDao->close();
  }

  /**
   * Lista todos los objetos Meta de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Meta en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $metaDao =$FactoryDao->getmetaDao(self::getDataBaseDefault());
     $result = $metaDao->listAll();
     $metaDao->close();
     return $result;
  }


}
//That`s all folks!