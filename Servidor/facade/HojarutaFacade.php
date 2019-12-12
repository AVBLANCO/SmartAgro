<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Un tequila, antes de que empiecen los trancazos  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Hojaruta.php');
require_once realpath('../dao/interfaz/IHojarutaDao.php');
require_once realpath('../dto/Costo.php');

class HojarutaFacade {

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
   * Crea un objeto Hojaruta a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idhojaRuta
   * @param fechaHojaRuta
   * @param costo_idcosto
   */
  public static function insert( $idhojaRuta,  $fechaHojaRuta,  $costo_idcosto){
      $hojaruta = new Hojaruta();
      $hojaruta->setIdhojaRuta($idhojaRuta); 
      $hojaruta->setFechaHojaRuta($fechaHojaRuta); 
      $hojaruta->setCosto_idcosto($costo_idcosto); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $hojarutaDao =$FactoryDao->gethojarutaDao(self::getDataBaseDefault());
     $rtn = $hojarutaDao->insert($hojaruta);
     $hojarutaDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Hojaruta de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idhojaRuta
   * @return El objeto en base de datos o Null
   */
  public static function select($idhojaRuta){
      $hojaruta = new Hojaruta();
      $hojaruta->setIdhojaRuta($idhojaRuta); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $hojarutaDao =$FactoryDao->gethojarutaDao(self::getDataBaseDefault());
     $result = $hojarutaDao->select($hojaruta);
     $hojarutaDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Hojaruta  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idhojaRuta
   * @param fechaHojaRuta
   * @param costo_idcosto
   */
  public static function update($idhojaRuta, $fechaHojaRuta, $costo_idcosto){
      $hojaruta = self::select($idhojaRuta);
      $hojaruta->setFechaHojaRuta($fechaHojaRuta); 
      $hojaruta->setCosto_idcosto($costo_idcosto); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $hojarutaDao =$FactoryDao->gethojarutaDao(self::getDataBaseDefault());
     $hojarutaDao->update($hojaruta);
     $hojarutaDao->close();
  }

  /**
   * Elimina un objeto Hojaruta de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idhojaRuta
   */
  public static function delete($idhojaRuta){
      $hojaruta = new Hojaruta();
      $hojaruta->setIdhojaRuta($idhojaRuta); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $hojarutaDao =$FactoryDao->gethojarutaDao(self::getDataBaseDefault());
     $hojarutaDao->delete($hojaruta);
     $hojarutaDao->close();
  }

  /**
   * Lista todos los objetos Hojaruta de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Hojaruta en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $hojarutaDao =$FactoryDao->gethojarutaDao(self::getDataBaseDefault());
     $result = $hojarutaDao->listAll();
     $hojarutaDao->close();
     return $result;
  }


}
//That`s all folks!