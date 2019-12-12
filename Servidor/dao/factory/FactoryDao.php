<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Don´t call me gringo you f%&ing beanner  \\

include_once realpath('../dao/conexion/Conexion.php');
include_once realpath('../dao/interfaz/IFactoryDao.php');

class FactoryDao implements IFactoryDao{
	
     private $conn;
     public static $NULL_GESTOR = -1;
    public static $MYSQL_FACTORY = 0;
    public static $POSTGRESQL_FACTORY = 1;
    public static $ORACLE_FACTORY = 2;
    public static $DERBY_FACTORY = 3;

     public function __construct($gestor){
        $this->conn=new Conexion($gestor);
     }
     /**
     * Devuelve una instancia de AgroclimatologiaDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de AgroclimatologiaDao
     */
     public function getAgroclimatologiaDao($dbName){
        return new AgroclimatologiaDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de BalancehidricoDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de BalancehidricoDao
     */
     public function getBalancehidricoDao($dbName){
        return new BalancehidricoDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de BiologiasueloDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de BiologiasueloDao
     */
     public function getBiologiasueloDao($dbName){
        return new BiologiasueloDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de ConversionenergeticaDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de ConversionenergeticaDao
     */
     public function getConversionenergeticaDao($dbName){
        return new ConversionenergeticaDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de CostoDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de CostoDao
     */
     public function getCostoDao($dbName){
        return new CostoDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de EscenarioDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de EscenarioDao
     */
     public function getEscenarioDao($dbName){
        return new EscenarioDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de EvotranspiracionDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de EvotranspiracionDao
     */
     public function getEvotranspiracionDao($dbName){
        return new EvotranspiracionDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de FincaDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de FincaDao
     */
     public function getFincaDao($dbName){
        return new FincaDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de FisicasueloDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de FisicasueloDao
     */
     public function getFisicasueloDao($dbName){
        return new FisicasueloDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de HistoricoDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de HistoricoDao
     */
     public function getHistoricoDao($dbName){
        return new HistoricoDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de HojarutaDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de HojarutaDao
     */
     public function getHojarutaDao($dbName){
        return new HojarutaDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de LaborDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de LaborDao
     */
     public function getLaborDao($dbName){
        return new LaborDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de LecturabalancehidricoDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de LecturabalancehidricoDao
     */
     public function getLecturabalancehidricoDao($dbName){
        return new LecturabalancehidricoDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de LecturabiologiasueloDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de LecturabiologiasueloDao
     */
     public function getLecturabiologiasueloDao($dbName){
        return new LecturabiologiasueloDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de LecturaconversionenergeticaDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de LecturaconversionenergeticaDao
     */
     public function getLecturaconversionenergeticaDao($dbName){
        return new LecturaconversionenergeticaDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de LecturaevotranspiracionDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de LecturaevotranspiracionDao
     */
     public function getLecturaevotranspiracionDao($dbName){
        return new LecturaevotranspiracionDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de LecturafisicasueloDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de LecturafisicasueloDao
     */
     public function getLecturafisicasueloDao($dbName){
        return new LecturafisicasueloDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de LecturamanejointegradoenfermedadesDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de LecturamanejointegradoenfermedadesDao
     */
     public function getLecturamanejointegradoenfermedadesDao($dbName){
        return new LecturamanejointegradoenfermedadesDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de LecturamanejoplagaDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de LecturamanejoplagaDao
     */
     public function getLecturamanejoplagaDao($dbName){
        return new LecturamanejoplagaDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de LecturaquimicasueloDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de LecturaquimicasueloDao
     */
     public function getLecturaquimicasueloDao($dbName){
        return new LecturaquimicasueloDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de LoteDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de LoteDao
     */
     public function getLoteDao($dbName){
        return new LoteDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de ManejointegradoenfermedadesDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de ManejointegradoenfermedadesDao
     */
     public function getManejointegradoenfermedadesDao($dbName){
        return new ManejointegradoenfermedadesDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de ManejointegradoplagasDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de ManejointegradoplagasDao
     */
     public function getManejointegradoplagasDao($dbName){
        return new ManejointegradoplagasDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de MetaDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de MetaDao
     */
     public function getMetaDao($dbName){
        return new MetaDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de MetricabalancehidricoDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de MetricabalancehidricoDao
     */
     public function getMetricabalancehidricoDao($dbName){
        return new MetricabalancehidricoDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de MetricabiologiasueloDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de MetricabiologiasueloDao
     */
     public function getMetricabiologiasueloDao($dbName){
        return new MetricabiologiasueloDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de MetricaconversionenergeticaDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de MetricaconversionenergeticaDao
     */
     public function getMetricaconversionenergeticaDao($dbName){
        return new MetricaconversionenergeticaDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de MetricaevotranspiracionDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de MetricaevotranspiracionDao
     */
     public function getMetricaevotranspiracionDao($dbName){
        return new MetricaevotranspiracionDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de MetricamanejointegradoenfermedadesDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de MetricamanejointegradoenfermedadesDao
     */
     public function getMetricamanejointegradoenfermedadesDao($dbName){
        return new MetricamanejointegradoenfermedadesDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de MetricamanejoplagasDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de MetricamanejoplagasDao
     */
     public function getMetricamanejoplagasDao($dbName){
        return new MetricamanejoplagasDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de MetricaquimicasueloDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de MetricaquimicasueloDao
     */
     public function getMetricaquimicasueloDao($dbName){
        return new MetricaquimicasueloDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de MetricassueloDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de MetricassueloDao
     */
     public function getMetricassueloDao($dbName){
        return new MetricassueloDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de MiagroempresaDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de MiagroempresaDao
     */
     public function getMiagroempresaDao($dbName){
        return new MiagroempresaDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de MipeDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de MipeDao
     */
     public function getMipeDao($dbName){
        return new MipeDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de PersonaDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de PersonaDao
     */
     public function getPersonaDao($dbName){
        return new PersonaDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de ProyeccionDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de ProyeccionDao
     */
     public function getProyeccionDao($dbName){
        return new ProyeccionDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de QuimicasueloDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de QuimicasueloDao
     */
     public function getQuimicasueloDao($dbName){
        return new QuimicasueloDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de RolDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de RolDao
     */
     public function getRolDao($dbName){
        return new RolDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de SistemaDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de SistemaDao
     */
     public function getSistemaDao($dbName){
        return new SistemaDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de SueloDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de SueloDao
     */
     public function getSueloDao($dbName){
        return new SueloDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de UsuarioDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de UsuarioDao
     */
     public function getUsuarioDao($dbName){
        return new UsuarioDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de Usuario_has_hojarutaDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Usuario_has_hojarutaDao
     */
     public function getUsuario_has_hojarutaDao($dbName){
        return new Usuario_has_hojarutaDao($this->conn->obtener($dbName));
    }

}
//That`s all folks!