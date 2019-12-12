<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Has encontrado la frase #1024 ¡Felicidades! Ahora tu proyecto funcionará a la primera  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Historico.php');
require_once realpath('../dao/interfaz/IHistoricoDao.php');
require_once realpath('../dto/Miagroempresa.php');

class HistoricoFacade {

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
   * Crea un objeto Historico a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idhistorico
   * @param descripcionHistorico
   * @param miAgroempresa_idmiAgroempresa
   * @param valorHistorico
   */
  public static function insert( $idhistorico,  $descripcionHistorico,  $miAgroempresa_idmiAgroempresa,  $valorHistorico){
      $historico = new Historico();
      $historico->setIdhistorico($idhistorico); 
      $historico->setDescripcionHistorico($descripcionHistorico); 
      $historico->setMiAgroempresa_idmiAgroempresa($miAgroempresa_idmiAgroempresa); 
      $historico->setValorHistorico($valorHistorico); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $historicoDao =$FactoryDao->gethistoricoDao(self::getDataBaseDefault());
     $rtn = $historicoDao->insert($historico);
     $historicoDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Historico de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idhistorico
   * @return El objeto en base de datos o Null
   */
  public static function select($idhistorico){
      $historico = new Historico();
      $historico->setIdhistorico($idhistorico); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $historicoDao =$FactoryDao->gethistoricoDao(self::getDataBaseDefault());
     $result = $historicoDao->select($historico);
     $historicoDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Historico  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idhistorico
   * @param descripcionHistorico
   * @param miAgroempresa_idmiAgroempresa
   * @param valorHistorico
   */
  public static function update($idhistorico, $descripcionHistorico, $miAgroempresa_idmiAgroempresa, $valorHistorico){
      $historico = self::select($idhistorico);
      $historico->setDescripcionHistorico($descripcionHistorico); 
      $historico->setMiAgroempresa_idmiAgroempresa($miAgroempresa_idmiAgroempresa); 
      $historico->setValorHistorico($valorHistorico); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $historicoDao =$FactoryDao->gethistoricoDao(self::getDataBaseDefault());
     $historicoDao->update($historico);
     $historicoDao->close();
  }

  /**
   * Elimina un objeto Historico de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idhistorico
   */
  public static function delete($idhistorico){
      $historico = new Historico();
      $historico->setIdhistorico($idhistorico); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $historicoDao =$FactoryDao->gethistoricoDao(self::getDataBaseDefault());
     $historicoDao->delete($historico);
     $historicoDao->close();
  }

  /**
   * Lista todos los objetos Historico de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Historico en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $historicoDao =$FactoryDao->gethistoricoDao(self::getDataBaseDefault());
     $result = $historicoDao->listAll();
     $historicoDao->close();
     return $result;
  }


}
//That`s all folks!