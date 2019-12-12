<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Somos los amish del software  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Lecturamanejointegradoenfermedades.php');
require_once realpath('../dao/interfaz/ILecturamanejointegradoenfermedadesDao.php');
require_once realpath('../dto/Metricamanejointegradoenfermedades.php');

class LecturamanejointegradoenfermedadesFacade {

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
   * Crea un objeto Lecturamanejointegradoenfermedades a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idlecturaManejoIntegradoEnfermedades
   * @param fechaLecturaManejoIntegradoEnfermedadescol
   * @param valorLecturaManejoIntegradoEnfermedades
   * @param metricaManejoIntegradoEnfermedades
   */
  public static function insert( $idlecturaManejoIntegradoEnfermedades,  $fechaLecturaManejoIntegradoEnfermedadescol,  $valorLecturaManejoIntegradoEnfermedades,  $metricaManejoIntegradoEnfermedades){
      $lecturamanejointegradoenfermedades = new Lecturamanejointegradoenfermedades();
      $lecturamanejointegradoenfermedades->setIdlecturaManejoIntegradoEnfermedades($idlecturaManejoIntegradoEnfermedades); 
      $lecturamanejointegradoenfermedades->setFechaLecturaManejoIntegradoEnfermedadescol($fechaLecturaManejoIntegradoEnfermedadescol); 
      $lecturamanejointegradoenfermedades->setValorLecturaManejoIntegradoEnfermedades($valorLecturaManejoIntegradoEnfermedades); 
      $lecturamanejointegradoenfermedades->setMetricaManejoIntegradoEnfermedades($metricaManejoIntegradoEnfermedades); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $lecturamanejointegradoenfermedadesDao =$FactoryDao->getlecturamanejointegradoenfermedadesDao(self::getDataBaseDefault());
     $rtn = $lecturamanejointegradoenfermedadesDao->insert($lecturamanejointegradoenfermedades);
     $lecturamanejointegradoenfermedadesDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Lecturamanejointegradoenfermedades de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idlecturaManejoIntegradoEnfermedades
   * @return El objeto en base de datos o Null
   */
  public static function select($idlecturaManejoIntegradoEnfermedades){
      $lecturamanejointegradoenfermedades = new Lecturamanejointegradoenfermedades();
      $lecturamanejointegradoenfermedades->setIdlecturaManejoIntegradoEnfermedades($idlecturaManejoIntegradoEnfermedades); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $lecturamanejointegradoenfermedadesDao =$FactoryDao->getlecturamanejointegradoenfermedadesDao(self::getDataBaseDefault());
     $result = $lecturamanejointegradoenfermedadesDao->select($lecturamanejointegradoenfermedades);
     $lecturamanejointegradoenfermedadesDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Lecturamanejointegradoenfermedades  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idlecturaManejoIntegradoEnfermedades
   * @param fechaLecturaManejoIntegradoEnfermedadescol
   * @param valorLecturaManejoIntegradoEnfermedades
   * @param metricaManejoIntegradoEnfermedades
   */
  public static function update($idlecturaManejoIntegradoEnfermedades, $fechaLecturaManejoIntegradoEnfermedadescol, $valorLecturaManejoIntegradoEnfermedades, $metricaManejoIntegradoEnfermedades){
      $lecturamanejointegradoenfermedades = self::select($idlecturaManejoIntegradoEnfermedades);
      $lecturamanejointegradoenfermedades->setFechaLecturaManejoIntegradoEnfermedadescol($fechaLecturaManejoIntegradoEnfermedadescol); 
      $lecturamanejointegradoenfermedades->setValorLecturaManejoIntegradoEnfermedades($valorLecturaManejoIntegradoEnfermedades); 
      $lecturamanejointegradoenfermedades->setMetricaManejoIntegradoEnfermedades($metricaManejoIntegradoEnfermedades); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $lecturamanejointegradoenfermedadesDao =$FactoryDao->getlecturamanejointegradoenfermedadesDao(self::getDataBaseDefault());
     $lecturamanejointegradoenfermedadesDao->update($lecturamanejointegradoenfermedades);
     $lecturamanejointegradoenfermedadesDao->close();
  }

  /**
   * Elimina un objeto Lecturamanejointegradoenfermedades de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idlecturaManejoIntegradoEnfermedades
   */
  public static function delete($idlecturaManejoIntegradoEnfermedades){
      $lecturamanejointegradoenfermedades = new Lecturamanejointegradoenfermedades();
      $lecturamanejointegradoenfermedades->setIdlecturaManejoIntegradoEnfermedades($idlecturaManejoIntegradoEnfermedades); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $lecturamanejointegradoenfermedadesDao =$FactoryDao->getlecturamanejointegradoenfermedadesDao(self::getDataBaseDefault());
     $lecturamanejointegradoenfermedadesDao->delete($lecturamanejointegradoenfermedades);
     $lecturamanejointegradoenfermedadesDao->close();
  }

  /**
   * Lista todos los objetos Lecturamanejointegradoenfermedades de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Lecturamanejointegradoenfermedades en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $lecturamanejointegradoenfermedadesDao =$FactoryDao->getlecturamanejointegradoenfermedadesDao(self::getDataBaseDefault());
     $result = $lecturamanejointegradoenfermedadesDao->listAll();
     $lecturamanejointegradoenfermedadesDao->close();
     return $result;
  }


}
//That`s all folks!