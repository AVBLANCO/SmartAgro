<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿No es más sencillo hacer todo en el Main?  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Labor.php');
require_once realpath('../dao/interfaz/ILaborDao.php');
require_once realpath('../dto/Miagroempresa.php');

class LaborFacade {

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
   * Crea un objeto Labor a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idlabor
   * @param descripcionLabor
   * @param duracionLabor
   * @param miAgroempresa_idmiAgroempresa
   */
  public static function insert( $idlabor,  $descripcionLabor,  $duracionLabor,  $miAgroempresa_idmiAgroempresa){
      $labor = new Labor();
      $labor->setIdlabor($idlabor); 
      $labor->setDescripcionLabor($descripcionLabor); 
      $labor->setDuracionLabor($duracionLabor); 
      $labor->setMiAgroempresa_idmiAgroempresa($miAgroempresa_idmiAgroempresa); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $laborDao =$FactoryDao->getlaborDao(self::getDataBaseDefault());
     $rtn = $laborDao->insert($labor);
     $laborDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Labor de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idlabor
   * @return El objeto en base de datos o Null
   */
  public static function select($idlabor){
      $labor = new Labor();
      $labor->setIdlabor($idlabor); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $laborDao =$FactoryDao->getlaborDao(self::getDataBaseDefault());
     $result = $laborDao->select($labor);
     $laborDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Labor  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idlabor
   * @param descripcionLabor
   * @param duracionLabor
   * @param miAgroempresa_idmiAgroempresa
   */
  public static function update($idlabor, $descripcionLabor, $duracionLabor, $miAgroempresa_idmiAgroempresa){
      $labor = self::select($idlabor);
      $labor->setDescripcionLabor($descripcionLabor); 
      $labor->setDuracionLabor($duracionLabor); 
      $labor->setMiAgroempresa_idmiAgroempresa($miAgroempresa_idmiAgroempresa); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $laborDao =$FactoryDao->getlaborDao(self::getDataBaseDefault());
     $laborDao->update($labor);
     $laborDao->close();
  }

  /**
   * Elimina un objeto Labor de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idlabor
   */
  public static function delete($idlabor){
      $labor = new Labor();
      $labor->setIdlabor($idlabor); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $laborDao =$FactoryDao->getlaborDao(self::getDataBaseDefault());
     $laborDao->delete($labor);
     $laborDao->close();
  }

  /**
   * Lista todos los objetos Labor de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Labor en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $laborDao =$FactoryDao->getlaborDao(self::getDataBaseDefault());
     $result = $laborDao->listAll();
     $laborDao->close();
     return $result;
  }


}
//That`s all folks!