<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    gravitaban alrededor del astro de la noche, y por primera vez podía la vista penetrar todos sus misterios.  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Usuario_has_hojaruta.php');
require_once realpath('../dao/interfaz/IUsuario_has_hojarutaDao.php');
require_once realpath('../dto/Usuario.php');
require_once realpath('../dto/Hojaruta.php');

class Usuario_has_hojarutaFacade {

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
   * Crea un objeto Usuario_has_hojaruta a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param usuario_idusuario
   * @param hojaRuta_idhojaRuta
   */
  public static function insert( $usuario_idusuario,  $hojaRuta_idhojaRuta){
      $usuario_has_hojaruta = new Usuario_has_hojaruta();
      $usuario_has_hojaruta->setUsuario_idusuario($usuario_idusuario); 
      $usuario_has_hojaruta->setHojaRuta_idhojaRuta($hojaRuta_idhojaRuta); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $usuario_has_hojarutaDao =$FactoryDao->getusuario_has_hojarutaDao(self::getDataBaseDefault());
     $rtn = $usuario_has_hojarutaDao->insert($usuario_has_hojaruta);
     $usuario_has_hojarutaDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Usuario_has_hojaruta de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param usuario_idusuario
   * @param hojaRuta_idhojaRuta
   * @return El objeto en base de datos o Null
   */
  public static function select($usuario_idusuario, $hojaRuta_idhojaRuta){
      $usuario_has_hojaruta = new Usuario_has_hojaruta();
      $usuario_has_hojaruta->setUsuario_idusuario($usuario_idusuario); 
      $usuario_has_hojaruta->setHojaRuta_idhojaRuta($hojaRuta_idhojaRuta); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $usuario_has_hojarutaDao =$FactoryDao->getusuario_has_hojarutaDao(self::getDataBaseDefault());
     $result = $usuario_has_hojarutaDao->select($usuario_has_hojaruta);
     $usuario_has_hojarutaDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Usuario_has_hojaruta  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param usuario_idusuario
   * @param hojaRuta_idhojaRuta
   */
  public static function update($usuario_idusuario, $hojaRuta_idhojaRuta){
      $usuario_has_hojaruta = self::select($usuario_idusuario, $hojaRuta_idhojaRuta);

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $usuario_has_hojarutaDao =$FactoryDao->getusuario_has_hojarutaDao(self::getDataBaseDefault());
     $usuario_has_hojarutaDao->update($usuario_has_hojaruta);
     $usuario_has_hojarutaDao->close();
  }

  /**
   * Elimina un objeto Usuario_has_hojaruta de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param usuario_idusuario
   * @param hojaRuta_idhojaRuta
   */
  public static function delete($usuario_idusuario, $hojaRuta_idhojaRuta){
      $usuario_has_hojaruta = new Usuario_has_hojaruta();
      $usuario_has_hojaruta->setUsuario_idusuario($usuario_idusuario); 
      $usuario_has_hojaruta->setHojaRuta_idhojaRuta($hojaRuta_idhojaRuta); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $usuario_has_hojarutaDao =$FactoryDao->getusuario_has_hojarutaDao(self::getDataBaseDefault());
     $usuario_has_hojarutaDao->delete($usuario_has_hojaruta);
     $usuario_has_hojarutaDao->close();
  }

  /**
   * Lista todos los objetos Usuario_has_hojaruta de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Usuario_has_hojaruta en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $usuario_has_hojarutaDao =$FactoryDao->getusuario_has_hojarutaDao(self::getDataBaseDefault());
     $result = $usuario_has_hojarutaDao->listAll();
     $usuario_has_hojarutaDao->close();
     return $result;
  }

  /**
   * Lista todos los objetos Usuario_has_hojaruta de la base de datos a partir de usuario_idusuario.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param usuario_idusuario
   * @return $result Array con los objetos en base de datos o Null
   */
  public static function listByUsuario_idusuario($usuario_idusuario){
      $usuario_has_hojaruta = new Usuario_has_hojaruta();
      $usuario_has_hojaruta->setUsuario_idusuario($usuario_idusuario); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $usuario_has_hojarutaDao =$FactoryDao->getusuario_has_hojarutaDao(self::getDataBaseDefault());
     $result = $usuario_has_hojarutaDao->listByUsuario_idusuario($usuario_has_hojaruta);
     $usuario_has_hojarutaDao->close();
     return $result;
  }

  /**
   * Lista todos los objetos Usuario_has_hojaruta de la base de datos a partir de hojaRuta_idhojaRuta.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param hojaRuta_idhojaRuta
   * @return $result Array con los objetos en base de datos o Null
   */
  public static function listByHojaRuta_idhojaRuta($hojaRuta_idhojaRuta){
      $usuario_has_hojaruta = new Usuario_has_hojaruta();
      $usuario_has_hojaruta->setHojaRuta_idhojaRuta($hojaRuta_idhojaRuta); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $usuario_has_hojarutaDao =$FactoryDao->getusuario_has_hojarutaDao(self::getDataBaseDefault());
     $result = $usuario_has_hojarutaDao->listByHojaRuta_idhojaRuta($usuario_has_hojaruta);
     $usuario_has_hojarutaDao->close();
     return $result;
  }


}
//That`s all folks!