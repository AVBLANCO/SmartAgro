<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    No hay de qué so no más de papa  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Costo.php');
require_once realpath('../dao/interfaz/ICostoDao.php');
require_once realpath('../dto/Miagroempresa.php');

class CostoFacade {

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
   * Crea un objeto Costo a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idcosto
   * @param descripcionCosto
   * @param valorCosto
   * @param miAgroempresa_idmiAgroempresa
   */
  public static function insert( $idcosto,  $descripcionCosto,  $valorCosto,  $miAgroempresa_idmiAgroempresa){
      $costo = new Costo();
      $costo->setIdcosto($idcosto); 
      $costo->setDescripcionCosto($descripcionCosto); 
      $costo->setValorCosto($valorCosto); 
      $costo->setMiAgroempresa_idmiAgroempresa($miAgroempresa_idmiAgroempresa); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $costoDao =$FactoryDao->getcostoDao(self::getDataBaseDefault());
     $rtn = $costoDao->insert($costo);
     $costoDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Costo de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idcosto
   * @return El objeto en base de datos o Null
   */
  public static function select($idcosto){
      $costo = new Costo();
      $costo->setIdcosto($idcosto); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $costoDao =$FactoryDao->getcostoDao(self::getDataBaseDefault());
     $result = $costoDao->select($costo);
     $costoDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Costo  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idcosto
   * @param descripcionCosto
   * @param valorCosto
   * @param miAgroempresa_idmiAgroempresa
   */
  public static function update($idcosto, $descripcionCosto, $valorCosto, $miAgroempresa_idmiAgroempresa){
      $costo = self::select($idcosto);
      $costo->setDescripcionCosto($descripcionCosto); 
      $costo->setValorCosto($valorCosto); 
      $costo->setMiAgroempresa_idmiAgroempresa($miAgroempresa_idmiAgroempresa); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $costoDao =$FactoryDao->getcostoDao(self::getDataBaseDefault());
     $costoDao->update($costo);
     $costoDao->close();
  }

  /**
   * Elimina un objeto Costo de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idcosto
   */
  public static function delete($idcosto){
      $costo = new Costo();
      $costo->setIdcosto($idcosto); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $costoDao =$FactoryDao->getcostoDao(self::getDataBaseDefault());
     $costoDao->delete($costo);
     $costoDao->close();
  }

  /**
   * Lista todos los objetos Costo de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Costo en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $costoDao =$FactoryDao->getcostoDao(self::getDataBaseDefault());
     $result = $costoDao->listAll();
     $costoDao->close();
     return $result;
  }


}
//That`s all folks!