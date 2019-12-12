<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Me arreglas mi impresora?  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Proyeccion.php');
require_once realpath('../dao/interfaz/IProyeccionDao.php');
require_once realpath('../dto/Lote.php');

class ProyeccionFacade {

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
   * Crea un objeto Proyeccion a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idproyeccion
   * @param descripcionProyeccion
   * @param fechaProyeccion
   * @param lote_idlote
   */
  public static function insert( $idproyeccion,  $descripcionProyeccion,  $fechaProyeccion,  $lote_idlote){
      $proyeccion = new Proyeccion();
      $proyeccion->setIdproyeccion($idproyeccion); 
      $proyeccion->setDescripcionProyeccion($descripcionProyeccion); 
      $proyeccion->setFechaProyeccion($fechaProyeccion); 
      $proyeccion->setLote_idlote($lote_idlote); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $proyeccionDao =$FactoryDao->getproyeccionDao(self::getDataBaseDefault());
     $rtn = $proyeccionDao->insert($proyeccion);
     $proyeccionDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Proyeccion de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idproyeccion
   * @return El objeto en base de datos o Null
   */
  public static function select($idproyeccion){
      $proyeccion = new Proyeccion();
      $proyeccion->setIdproyeccion($idproyeccion); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $proyeccionDao =$FactoryDao->getproyeccionDao(self::getDataBaseDefault());
     $result = $proyeccionDao->select($proyeccion);
     $proyeccionDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Proyeccion  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idproyeccion
   * @param descripcionProyeccion
   * @param fechaProyeccion
   * @param lote_idlote
   */
  public static function update($idproyeccion, $descripcionProyeccion, $fechaProyeccion, $lote_idlote){
      $proyeccion = self::select($idproyeccion);
      $proyeccion->setDescripcionProyeccion($descripcionProyeccion); 
      $proyeccion->setFechaProyeccion($fechaProyeccion); 
      $proyeccion->setLote_idlote($lote_idlote); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $proyeccionDao =$FactoryDao->getproyeccionDao(self::getDataBaseDefault());
     $proyeccionDao->update($proyeccion);
     $proyeccionDao->close();
  }

  /**
   * Elimina un objeto Proyeccion de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idproyeccion
   */
  public static function delete($idproyeccion){
      $proyeccion = new Proyeccion();
      $proyeccion->setIdproyeccion($idproyeccion); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $proyeccionDao =$FactoryDao->getproyeccionDao(self::getDataBaseDefault());
     $proyeccionDao->delete($proyeccion);
     $proyeccionDao->close();
  }

  /**
   * Lista todos los objetos Proyeccion de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Proyeccion en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $proyeccionDao =$FactoryDao->getproyeccionDao(self::getDataBaseDefault());
     $result = $proyeccionDao->listAll();
     $proyeccionDao->close();
     return $result;
  }


}
//That`s all folks!