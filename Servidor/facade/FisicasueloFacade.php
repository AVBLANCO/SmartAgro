<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Traigo una pizza para ¿y se la creyó?  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Fisicasuelo.php');
require_once realpath('../dao/interfaz/IFisicasueloDao.php');
require_once realpath('../dto/Suelo.php');

class FisicasueloFacade {

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
   * Crea un objeto Fisicasuelo a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idfisicaSuelo
   * @param decscricionfisicaSuelo
   * @param suelo_idsuelo
   */
  public static function insert( $idfisicaSuelo,  $decscricionfisicaSuelo,  $suelo_idsuelo){
      $fisicasuelo = new Fisicasuelo();
      $fisicasuelo->setIdfisicaSuelo($idfisicaSuelo); 
      $fisicasuelo->setDecscricionfisicaSuelo($decscricionfisicaSuelo); 
      $fisicasuelo->setSuelo_idsuelo($suelo_idsuelo); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $fisicasueloDao =$FactoryDao->getfisicasueloDao(self::getDataBaseDefault());
     $rtn = $fisicasueloDao->insert($fisicasuelo);
     $fisicasueloDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Fisicasuelo de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idfisicaSuelo
   * @return El objeto en base de datos o Null
   */
  public static function select($idfisicaSuelo){
      $fisicasuelo = new Fisicasuelo();
      $fisicasuelo->setIdfisicaSuelo($idfisicaSuelo); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $fisicasueloDao =$FactoryDao->getfisicasueloDao(self::getDataBaseDefault());
     $result = $fisicasueloDao->select($fisicasuelo);
     $fisicasueloDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Fisicasuelo  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idfisicaSuelo
   * @param decscricionfisicaSuelo
   * @param suelo_idsuelo
   */
  public static function update($idfisicaSuelo, $decscricionfisicaSuelo, $suelo_idsuelo){
      $fisicasuelo = self::select($idfisicaSuelo);
      $fisicasuelo->setDecscricionfisicaSuelo($decscricionfisicaSuelo); 
      $fisicasuelo->setSuelo_idsuelo($suelo_idsuelo); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $fisicasueloDao =$FactoryDao->getfisicasueloDao(self::getDataBaseDefault());
     $fisicasueloDao->update($fisicasuelo);
     $fisicasueloDao->close();
  }

  /**
   * Elimina un objeto Fisicasuelo de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idfisicaSuelo
   */
  public static function delete($idfisicaSuelo){
      $fisicasuelo = new Fisicasuelo();
      $fisicasuelo->setIdfisicaSuelo($idfisicaSuelo); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $fisicasueloDao =$FactoryDao->getfisicasueloDao(self::getDataBaseDefault());
     $fisicasueloDao->delete($fisicasuelo);
     $fisicasueloDao->close();
  }

  /**
   * Lista todos los objetos Fisicasuelo de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Fisicasuelo en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $fisicasueloDao =$FactoryDao->getfisicasueloDao(self::getDataBaseDefault());
     $result = $fisicasueloDao->listAll();
     $fisicasueloDao->close();
     return $result;
  }


}
//That`s all folks!