<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Don´t call me gringo you f%&ing beanner  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Lecturaquimicasuelo.php');
require_once realpath('../dao/interfaz/ILecturaquimicasueloDao.php');
require_once realpath('../dto/Metricaquimicasuelo.php');

class LecturaquimicasueloFacade {

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
   * Crea un objeto Lecturaquimicasuelo a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idlecturaQuimicaSuelo
   * @param fechaLecturaQuimicaSuelo
   * @param valorLecturaQuimicaSuelo
   * @param metricaQuimicaSuelo_idmetricaQuimicaSuelo
   */
  public static function insert( $idlecturaQuimicaSuelo,  $fechaLecturaQuimicaSuelo,  $valorLecturaQuimicaSuelo,  $metricaQuimicaSuelo_idmetricaQuimicaSuelo){
      $lecturaquimicasuelo = new Lecturaquimicasuelo();
      $lecturaquimicasuelo->setIdlecturaQuimicaSuelo($idlecturaQuimicaSuelo); 
      $lecturaquimicasuelo->setFechaLecturaQuimicaSuelo($fechaLecturaQuimicaSuelo); 
      $lecturaquimicasuelo->setValorLecturaQuimicaSuelo($valorLecturaQuimicaSuelo); 
      $lecturaquimicasuelo->setMetricaQuimicaSuelo_idmetricaQuimicaSuelo($metricaQuimicaSuelo_idmetricaQuimicaSuelo); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $lecturaquimicasueloDao =$FactoryDao->getlecturaquimicasueloDao(self::getDataBaseDefault());
     $rtn = $lecturaquimicasueloDao->insert($lecturaquimicasuelo);
     $lecturaquimicasueloDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Lecturaquimicasuelo de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idlecturaQuimicaSuelo
   * @return El objeto en base de datos o Null
   */
  public static function select($idlecturaQuimicaSuelo){
      $lecturaquimicasuelo = new Lecturaquimicasuelo();
      $lecturaquimicasuelo->setIdlecturaQuimicaSuelo($idlecturaQuimicaSuelo); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $lecturaquimicasueloDao =$FactoryDao->getlecturaquimicasueloDao(self::getDataBaseDefault());
     $result = $lecturaquimicasueloDao->select($lecturaquimicasuelo);
     $lecturaquimicasueloDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Lecturaquimicasuelo  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idlecturaQuimicaSuelo
   * @param fechaLecturaQuimicaSuelo
   * @param valorLecturaQuimicaSuelo
   * @param metricaQuimicaSuelo_idmetricaQuimicaSuelo
   */
  public static function update($idlecturaQuimicaSuelo, $fechaLecturaQuimicaSuelo, $valorLecturaQuimicaSuelo, $metricaQuimicaSuelo_idmetricaQuimicaSuelo){
      $lecturaquimicasuelo = self::select($idlecturaQuimicaSuelo);
      $lecturaquimicasuelo->setFechaLecturaQuimicaSuelo($fechaLecturaQuimicaSuelo); 
      $lecturaquimicasuelo->setValorLecturaQuimicaSuelo($valorLecturaQuimicaSuelo); 
      $lecturaquimicasuelo->setMetricaQuimicaSuelo_idmetricaQuimicaSuelo($metricaQuimicaSuelo_idmetricaQuimicaSuelo); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $lecturaquimicasueloDao =$FactoryDao->getlecturaquimicasueloDao(self::getDataBaseDefault());
     $lecturaquimicasueloDao->update($lecturaquimicasuelo);
     $lecturaquimicasueloDao->close();
  }

  /**
   * Elimina un objeto Lecturaquimicasuelo de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idlecturaQuimicaSuelo
   */
  public static function delete($idlecturaQuimicaSuelo){
      $lecturaquimicasuelo = new Lecturaquimicasuelo();
      $lecturaquimicasuelo->setIdlecturaQuimicaSuelo($idlecturaQuimicaSuelo); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $lecturaquimicasueloDao =$FactoryDao->getlecturaquimicasueloDao(self::getDataBaseDefault());
     $lecturaquimicasueloDao->delete($lecturaquimicasuelo);
     $lecturaquimicasueloDao->close();
  }

  /**
   * Lista todos los objetos Lecturaquimicasuelo de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Lecturaquimicasuelo en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $lecturaquimicasueloDao =$FactoryDao->getlecturaquimicasueloDao(self::getDataBaseDefault());
     $result = $lecturaquimicasueloDao->listAll();
     $lecturaquimicasueloDao->close();
     return $result;
  }


}
//That`s all folks!