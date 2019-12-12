<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    El coronel necesitó setenta y cinco años -los setenta y cinco años de su vida, minuto a minuto- para llegar a ese instante. Se sintió puro, explícito, invencible, en el momento de responder:  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Rol.php');
require_once realpath('../dao/interfaz/IRolDao.php');
require_once realpath('../dto/Usuario.php');

class RolFacade {

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
   * Crea un objeto Rol a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idrol
   * @param descripcion
   * @param usuario_idusuario
   */
  public static function insert( $idrol,  $descripcion,  $usuario_idusuario){
      $rol = new Rol();
      $rol->setIdrol($idrol); 
      $rol->setDescripcion($descripcion); 
      $rol->setUsuario_idusuario($usuario_idusuario); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $rolDao =$FactoryDao->getrolDao(self::getDataBaseDefault());
     $rtn = $rolDao->insert($rol);
     $rolDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Rol de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idrol
   * @return El objeto en base de datos o Null
   */
  public static function select($idrol){
      $rol = new Rol();
      $rol->setIdrol($idrol); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $rolDao =$FactoryDao->getrolDao(self::getDataBaseDefault());
     $result = $rolDao->select($rol);
     $rolDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Rol  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idrol
   * @param descripcion
   * @param usuario_idusuario
   */
  public static function update($idrol, $descripcion, $usuario_idusuario){
      $rol = self::select($idrol);
      $rol->setDescripcion($descripcion); 
      $rol->setUsuario_idusuario($usuario_idusuario); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $rolDao =$FactoryDao->getrolDao(self::getDataBaseDefault());
     $rolDao->update($rol);
     $rolDao->close();
  }

  /**
   * Elimina un objeto Rol de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idrol
   */
  public static function delete($idrol){
      $rol = new Rol();
      $rol->setIdrol($idrol); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $rolDao =$FactoryDao->getrolDao(self::getDataBaseDefault());
     $rolDao->delete($rol);
     $rolDao->close();
  }

  /**
   * Lista todos los objetos Rol de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Rol en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $rolDao =$FactoryDao->getrolDao(self::getDataBaseDefault());
     $result = $rolDao->listAll();
     $rolDao->close();
     return $result;
  }


}
//That`s all folks!