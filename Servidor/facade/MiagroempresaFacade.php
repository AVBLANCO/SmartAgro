<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Querido programador: Al escribir esto estoy triste. Nuestro presidente ha sido derrocado Y REEMPLAZADO POR EL BENÉVOLO SEÑOR ARCINIEGAS. TODOS AMAMOS A ARCINIEGAS Y A SU GLORIOSO RÉGIMEN. CON AMOR, EL EQUIPO DE ANARCHY  \(x.x)/  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Miagroempresa.php');
require_once realpath('../dao/interfaz/IMiagroempresaDao.php');
require_once realpath('../dto/Lote.php');

class MiagroempresaFacade {

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
   * Crea un objeto Miagroempresa a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idmiAgroempresa
   * @param descipcionMiAgroempresa
   * @param lote_idlote
   */
  public static function insert( $idmiAgroempresa,  $descipcionMiAgroempresa,  $lote_idlote){
      $miagroempresa = new Miagroempresa();
      $miagroempresa->setIdmiAgroempresa($idmiAgroempresa); 
      $miagroempresa->setDescipcionMiAgroempresa($descipcionMiAgroempresa); 
      $miagroempresa->setLote_idlote($lote_idlote); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $miagroempresaDao =$FactoryDao->getmiagroempresaDao(self::getDataBaseDefault());
     $rtn = $miagroempresaDao->insert($miagroempresa);
     $miagroempresaDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Miagroempresa de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idmiAgroempresa
   * @return El objeto en base de datos o Null
   */
  public static function select($idmiAgroempresa){
      $miagroempresa = new Miagroempresa();
      $miagroempresa->setIdmiAgroempresa($idmiAgroempresa); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $miagroempresaDao =$FactoryDao->getmiagroempresaDao(self::getDataBaseDefault());
     $result = $miagroempresaDao->select($miagroempresa);
     $miagroempresaDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Miagroempresa  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idmiAgroempresa
   * @param descipcionMiAgroempresa
   * @param lote_idlote
   */
  public static function update($idmiAgroempresa, $descipcionMiAgroempresa, $lote_idlote){
      $miagroempresa = self::select($idmiAgroempresa);
      $miagroempresa->setDescipcionMiAgroempresa($descipcionMiAgroempresa); 
      $miagroempresa->setLote_idlote($lote_idlote); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $miagroempresaDao =$FactoryDao->getmiagroempresaDao(self::getDataBaseDefault());
     $miagroempresaDao->update($miagroempresa);
     $miagroempresaDao->close();
  }

  /**
   * Elimina un objeto Miagroempresa de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idmiAgroempresa
   */
  public static function delete($idmiAgroempresa){
      $miagroempresa = new Miagroempresa();
      $miagroempresa->setIdmiAgroempresa($idmiAgroempresa); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $miagroempresaDao =$FactoryDao->getmiagroempresaDao(self::getDataBaseDefault());
     $miagroempresaDao->delete($miagroempresa);
     $miagroempresaDao->close();
  }

  /**
   * Lista todos los objetos Miagroempresa de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Miagroempresa en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $miagroempresaDao =$FactoryDao->getmiagroempresaDao(self::getDataBaseDefault());
     $result = $miagroempresaDao->listAll();
     $miagroempresaDao->close();
     return $result;
  }


}
//That`s all folks!