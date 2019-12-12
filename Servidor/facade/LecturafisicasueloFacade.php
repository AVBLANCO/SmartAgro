<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ...Y como plato principal: ¡Código espagueti!  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Lecturafisicasuelo.php');
require_once realpath('../dao/interfaz/ILecturafisicasueloDao.php');
require_once realpath('../dto/Metricassuelo.php');

class LecturafisicasueloFacade {

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
   * Crea un objeto Lecturafisicasuelo a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idlecturaFisicaSuelo
   * @param fechaLecturaFisicaSuelo
   * @param valorLecturaFisicaSuelo
   * @param metricasSuelo_idmetricasSuelo
   */
  public static function insert( $idlecturaFisicaSuelo,  $fechaLecturaFisicaSuelo,  $valorLecturaFisicaSuelo,  $metricasSuelo_idmetricasSuelo){
      $lecturafisicasuelo = new Lecturafisicasuelo();
      $lecturafisicasuelo->setIdlecturaFisicaSuelo($idlecturaFisicaSuelo); 
      $lecturafisicasuelo->setFechaLecturaFisicaSuelo($fechaLecturaFisicaSuelo); 
      $lecturafisicasuelo->setValorLecturaFisicaSuelo($valorLecturaFisicaSuelo); 
      $lecturafisicasuelo->setMetricasSuelo_idmetricasSuelo($metricasSuelo_idmetricasSuelo); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $lecturafisicasueloDao =$FactoryDao->getlecturafisicasueloDao(self::getDataBaseDefault());
     $rtn = $lecturafisicasueloDao->insert($lecturafisicasuelo);
     $lecturafisicasueloDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Lecturafisicasuelo de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idlecturaFisicaSuelo
   * @return El objeto en base de datos o Null
   */
  public static function select($idlecturaFisicaSuelo){
      $lecturafisicasuelo = new Lecturafisicasuelo();
      $lecturafisicasuelo->setIdlecturaFisicaSuelo($idlecturaFisicaSuelo); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $lecturafisicasueloDao =$FactoryDao->getlecturafisicasueloDao(self::getDataBaseDefault());
     $result = $lecturafisicasueloDao->select($lecturafisicasuelo);
     $lecturafisicasueloDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Lecturafisicasuelo  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idlecturaFisicaSuelo
   * @param fechaLecturaFisicaSuelo
   * @param valorLecturaFisicaSuelo
   * @param metricasSuelo_idmetricasSuelo
   */
  public static function update($idlecturaFisicaSuelo, $fechaLecturaFisicaSuelo, $valorLecturaFisicaSuelo, $metricasSuelo_idmetricasSuelo){
      $lecturafisicasuelo = self::select($idlecturaFisicaSuelo);
      $lecturafisicasuelo->setFechaLecturaFisicaSuelo($fechaLecturaFisicaSuelo); 
      $lecturafisicasuelo->setValorLecturaFisicaSuelo($valorLecturaFisicaSuelo); 
      $lecturafisicasuelo->setMetricasSuelo_idmetricasSuelo($metricasSuelo_idmetricasSuelo); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $lecturafisicasueloDao =$FactoryDao->getlecturafisicasueloDao(self::getDataBaseDefault());
     $lecturafisicasueloDao->update($lecturafisicasuelo);
     $lecturafisicasueloDao->close();
  }

  /**
   * Elimina un objeto Lecturafisicasuelo de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idlecturaFisicaSuelo
   */
  public static function delete($idlecturaFisicaSuelo){
      $lecturafisicasuelo = new Lecturafisicasuelo();
      $lecturafisicasuelo->setIdlecturaFisicaSuelo($idlecturaFisicaSuelo); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $lecturafisicasueloDao =$FactoryDao->getlecturafisicasueloDao(self::getDataBaseDefault());
     $lecturafisicasueloDao->delete($lecturafisicasuelo);
     $lecturafisicasueloDao->close();
  }

  /**
   * Lista todos los objetos Lecturafisicasuelo de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Lecturafisicasuelo en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $lecturafisicasueloDao =$FactoryDao->getlecturafisicasueloDao(self::getDataBaseDefault());
     $result = $lecturafisicasueloDao->listAll();
     $lecturafisicasueloDao->close();
     return $result;
  }


}
//That`s all folks!