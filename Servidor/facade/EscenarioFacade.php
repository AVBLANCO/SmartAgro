<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    No es una cola ni es una pila, es tu proyecto que no compila  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Escenario.php');
require_once realpath('../dao/interfaz/IEscenarioDao.php');
require_once realpath('../dto/Proyeccion.php');

class EscenarioFacade {

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
   * Crea un objeto Escenario a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idescenario
   * @param descripcionEscenario
   * @param proyeccion_idproyeccion
   * @param valorEscenario
   */
  public static function insert( $idescenario,  $descripcionEscenario,  $proyeccion_idproyeccion,  $valorEscenario){
      $escenario = new Escenario();
      $escenario->setIdescenario($idescenario); 
      $escenario->setDescripcionEscenario($descripcionEscenario); 
      $escenario->setProyeccion_idproyeccion($proyeccion_idproyeccion); 
      $escenario->setValorEscenario($valorEscenario); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $escenarioDao =$FactoryDao->getescenarioDao(self::getDataBaseDefault());
     $rtn = $escenarioDao->insert($escenario);
     $escenarioDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Escenario de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idescenario
   * @return El objeto en base de datos o Null
   */
  public static function select($idescenario){
      $escenario = new Escenario();
      $escenario->setIdescenario($idescenario); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $escenarioDao =$FactoryDao->getescenarioDao(self::getDataBaseDefault());
     $result = $escenarioDao->select($escenario);
     $escenarioDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Escenario  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idescenario
   * @param descripcionEscenario
   * @param proyeccion_idproyeccion
   * @param valorEscenario
   */
  public static function update($idescenario, $descripcionEscenario, $proyeccion_idproyeccion, $valorEscenario){
      $escenario = self::select($idescenario);
      $escenario->setDescripcionEscenario($descripcionEscenario); 
      $escenario->setProyeccion_idproyeccion($proyeccion_idproyeccion); 
      $escenario->setValorEscenario($valorEscenario); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $escenarioDao =$FactoryDao->getescenarioDao(self::getDataBaseDefault());
     $escenarioDao->update($escenario);
     $escenarioDao->close();
  }

  /**
   * Elimina un objeto Escenario de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idescenario
   */
  public static function delete($idescenario){
      $escenario = new Escenario();
      $escenario->setIdescenario($idescenario); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $escenarioDao =$FactoryDao->getescenarioDao(self::getDataBaseDefault());
     $escenarioDao->delete($escenario);
     $escenarioDao->close();
  }

  /**
   * Lista todos los objetos Escenario de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Escenario en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $escenarioDao =$FactoryDao->getescenarioDao(self::getDataBaseDefault());
     $result = $escenarioDao->listAll();
     $escenarioDao->close();
     return $result;
  }


}
//That`s all folks!