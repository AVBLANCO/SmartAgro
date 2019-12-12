<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¡Alza el puño y ven! ¡En la hoguera hay de beber!  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Finca.php');
require_once realpath('../dao/interfaz/IFincaDao.php');

class FincaFacade {

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
   * Crea un objeto Finca a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idfinca
   * @param descripcionFinca
   */
  public static function insert( $idfinca,  $descripcionFinca){
      $finca = new Finca();
      $finca->setIdfinca($idfinca); 
      $finca->setDescripcionFinca($descripcionFinca); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $fincaDao =$FactoryDao->getfincaDao(self::getDataBaseDefault());
     $rtn = $fincaDao->insert($finca);
     $fincaDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Finca de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idfinca
   * @return El objeto en base de datos o Null
   */
  public static function select($idfinca){
      $finca = new Finca();
      $finca->setIdfinca($idfinca); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $fincaDao =$FactoryDao->getfincaDao(self::getDataBaseDefault());
     $result = $fincaDao->select($finca);
     $fincaDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Finca  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idfinca
   * @param descripcionFinca
   */
  public static function update($idfinca, $descripcionFinca){
      $finca = self::select($idfinca);
      $finca->setDescripcionFinca($descripcionFinca); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $fincaDao =$FactoryDao->getfincaDao(self::getDataBaseDefault());
     $fincaDao->update($finca);
     $fincaDao->close();
  }

  /**
   * Elimina un objeto Finca de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idfinca
   */
  public static function delete($idfinca){
      $finca = new Finca();
      $finca->setIdfinca($idfinca); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $fincaDao =$FactoryDao->getfincaDao(self::getDataBaseDefault());
     $fincaDao->delete($finca);
     $fincaDao->close();
  }

  /**
   * Lista todos los objetos Finca de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Finca en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $fincaDao =$FactoryDao->getfincaDao(self::getDataBaseDefault());
     $result = $fincaDao->listAll();
     $fincaDao->close();
     return $result;
  }


}
//That`s all folks!