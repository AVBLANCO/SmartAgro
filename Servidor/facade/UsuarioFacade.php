<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Antes que me hubiera apasionado por mujer alguna, jugué mi corazón al azar y me lo ganó la Violencia.  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Usuario.php');
require_once realpath('../dao/interfaz/IUsuarioDao.php');
require_once realpath('../dto/Persona.php');
require_once realpath('../dto/Finca.php');

class UsuarioFacade {

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
   * Crea un objeto Usuario a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idusuario
   * @param nombreUsuario
   * @param passwordUsuario
   * @param persona_idpersona
   * @param finca_idfinca
   */
  public static function insert( $idusuario,  $nombreUsuario,  $passwordUsuario,  $persona_idpersona,  $finca_idfinca){
      $usuario = new Usuario();
      $usuario->setIdusuario($idusuario); 
      $usuario->setNombreUsuario($nombreUsuario); 
      $usuario->setPasswordUsuario($passwordUsuario); 
      $usuario->setPersona_idpersona($persona_idpersona); 
      $usuario->setFinca_idfinca($finca_idfinca); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $usuarioDao =$FactoryDao->getusuarioDao(self::getDataBaseDefault());
     $rtn = $usuarioDao->insert($usuario);
     $usuarioDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Usuario de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idusuario
   * @return El objeto en base de datos o Null
   */
  public static function select($idusuario){
      $usuario = new Usuario();
      $usuario->setIdusuario($idusuario); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $usuarioDao =$FactoryDao->getusuarioDao(self::getDataBaseDefault());
     $result = $usuarioDao->select($usuario);
     $usuarioDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Usuario  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idusuario
   * @param nombreUsuario
   * @param passwordUsuario
   * @param persona_idpersona
   * @param finca_idfinca
   */
  public static function update($idusuario, $nombreUsuario, $passwordUsuario, $persona_idpersona, $finca_idfinca){
      $usuario = self::select($idusuario);
      $usuario->setNombreUsuario($nombreUsuario); 
      $usuario->setPasswordUsuario($passwordUsuario); 
      $usuario->setPersona_idpersona($persona_idpersona); 
      $usuario->setFinca_idfinca($finca_idfinca); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $usuarioDao =$FactoryDao->getusuarioDao(self::getDataBaseDefault());
     $usuarioDao->update($usuario);
     $usuarioDao->close();
  }

  /**
   * Elimina un objeto Usuario de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idusuario
   */
  public static function delete($idusuario){
      $usuario = new Usuario();
      $usuario->setIdusuario($idusuario); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $usuarioDao =$FactoryDao->getusuarioDao(self::getDataBaseDefault());
     $usuarioDao->delete($usuario);
     $usuarioDao->close();
  }

  /**
   * Lista todos los objetos Usuario de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Usuario en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $usuarioDao =$FactoryDao->getusuarioDao(self::getDataBaseDefault());
     $result = $usuarioDao->listAll();
     $usuarioDao->close();
     return $result;
  }


}
//That`s all folks!