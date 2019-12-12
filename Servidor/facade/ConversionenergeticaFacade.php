<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Oh gloria de las glorias, oh divino testamento de la eterna majestad de la creación de dios  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Conversionenergetica.php');
require_once realpath('../dao/interfaz/IConversionenergeticaDao.php');
require_once realpath('../dto/Agroclimatologia.php');

class ConversionenergeticaFacade {

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
   * Crea un objeto Conversionenergetica a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idconversionEnergetica
   * @param descripcionConversionEnergetica
   * @param fechaConversionEnergetica
   * @param agroclimatologia_idagroclimatologia
   */
  public static function insert( $idconversionEnergetica,  $descripcionConversionEnergetica,  $fechaConversionEnergetica,  $agroclimatologia_idagroclimatologia){
      $conversionenergetica = new Conversionenergetica();
      $conversionenergetica->setIdconversionEnergetica($idconversionEnergetica); 
      $conversionenergetica->setDescripcionConversionEnergetica($descripcionConversionEnergetica); 
      $conversionenergetica->setFechaConversionEnergetica($fechaConversionEnergetica); 
      $conversionenergetica->setAgroclimatologia_idagroclimatologia($agroclimatologia_idagroclimatologia); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $conversionenergeticaDao =$FactoryDao->getconversionenergeticaDao(self::getDataBaseDefault());
     $rtn = $conversionenergeticaDao->insert($conversionenergetica);
     $conversionenergeticaDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Conversionenergetica de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idconversionEnergetica
   * @return El objeto en base de datos o Null
   */
  public static function select($idconversionEnergetica){
      $conversionenergetica = new Conversionenergetica();
      $conversionenergetica->setIdconversionEnergetica($idconversionEnergetica); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $conversionenergeticaDao =$FactoryDao->getconversionenergeticaDao(self::getDataBaseDefault());
     $result = $conversionenergeticaDao->select($conversionenergetica);
     $conversionenergeticaDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Conversionenergetica  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idconversionEnergetica
   * @param descripcionConversionEnergetica
   * @param fechaConversionEnergetica
   * @param agroclimatologia_idagroclimatologia
   */
  public static function update($idconversionEnergetica, $descripcionConversionEnergetica, $fechaConversionEnergetica, $agroclimatologia_idagroclimatologia){
      $conversionenergetica = self::select($idconversionEnergetica);
      $conversionenergetica->setDescripcionConversionEnergetica($descripcionConversionEnergetica); 
      $conversionenergetica->setFechaConversionEnergetica($fechaConversionEnergetica); 
      $conversionenergetica->setAgroclimatologia_idagroclimatologia($agroclimatologia_idagroclimatologia); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $conversionenergeticaDao =$FactoryDao->getconversionenergeticaDao(self::getDataBaseDefault());
     $conversionenergeticaDao->update($conversionenergetica);
     $conversionenergeticaDao->close();
  }

  /**
   * Elimina un objeto Conversionenergetica de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idconversionEnergetica
   */
  public static function delete($idconversionEnergetica){
      $conversionenergetica = new Conversionenergetica();
      $conversionenergetica->setIdconversionEnergetica($idconversionEnergetica); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $conversionenergeticaDao =$FactoryDao->getconversionenergeticaDao(self::getDataBaseDefault());
     $conversionenergeticaDao->delete($conversionenergetica);
     $conversionenergeticaDao->close();
  }

  /**
   * Lista todos los objetos Conversionenergetica de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Conversionenergetica en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $conversionenergeticaDao =$FactoryDao->getconversionenergeticaDao(self::getDataBaseDefault());
     $result = $conversionenergeticaDao->listAll();
     $conversionenergeticaDao->close();
     return $result;
  }


}
//That`s all folks!