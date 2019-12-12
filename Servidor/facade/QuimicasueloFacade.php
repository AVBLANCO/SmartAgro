<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Sabías que Anarchy se generó a sí mismo?  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Quimicasuelo.php');
require_once realpath('../dao/interfaz/IQuimicasueloDao.php');
require_once realpath('../dto/Suelo.php');

class QuimicasueloFacade {

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
   * Crea un objeto Quimicasuelo a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idQuimicaSuelo
   * @param descripcionQuimica
   * @param suelo_idsuelo
   */
  public static function insert( $idQuimicaSuelo,  $descripcionQuimica,  $suelo_idsuelo){
      $quimicasuelo = new Quimicasuelo();
      $quimicasuelo->setIdQuimicaSuelo($idQuimicaSuelo); 
      $quimicasuelo->setDescripcionQuimica($descripcionQuimica); 
      $quimicasuelo->setSuelo_idsuelo($suelo_idsuelo); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $quimicasueloDao =$FactoryDao->getquimicasueloDao(self::getDataBaseDefault());
     $rtn = $quimicasueloDao->insert($quimicasuelo);
     $quimicasueloDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Quimicasuelo de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idQuimicaSuelo
   * @return El objeto en base de datos o Null
   */
  public static function select($idQuimicaSuelo){
      $quimicasuelo = new Quimicasuelo();
      $quimicasuelo->setIdQuimicaSuelo($idQuimicaSuelo); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $quimicasueloDao =$FactoryDao->getquimicasueloDao(self::getDataBaseDefault());
     $result = $quimicasueloDao->select($quimicasuelo);
     $quimicasueloDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Quimicasuelo  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idQuimicaSuelo
   * @param descripcionQuimica
   * @param suelo_idsuelo
   */
  public static function update($idQuimicaSuelo, $descripcionQuimica, $suelo_idsuelo){
      $quimicasuelo = self::select($idQuimicaSuelo);
      $quimicasuelo->setDescripcionQuimica($descripcionQuimica); 
      $quimicasuelo->setSuelo_idsuelo($suelo_idsuelo); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $quimicasueloDao =$FactoryDao->getquimicasueloDao(self::getDataBaseDefault());
     $quimicasueloDao->update($quimicasuelo);
     $quimicasueloDao->close();
  }

  /**
   * Elimina un objeto Quimicasuelo de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idQuimicaSuelo
   */
  public static function delete($idQuimicaSuelo){
      $quimicasuelo = new Quimicasuelo();
      $quimicasuelo->setIdQuimicaSuelo($idQuimicaSuelo); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $quimicasueloDao =$FactoryDao->getquimicasueloDao(self::getDataBaseDefault());
     $quimicasueloDao->delete($quimicasuelo);
     $quimicasueloDao->close();
  }

  /**
   * Lista todos los objetos Quimicasuelo de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Quimicasuelo en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $quimicasueloDao =$FactoryDao->getquimicasueloDao(self::getDataBaseDefault());
     $result = $quimicasueloDao->listAll();
     $quimicasueloDao->close();
     return $result;
  }


}
//That`s all folks!