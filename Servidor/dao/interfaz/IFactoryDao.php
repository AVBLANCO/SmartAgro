<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Recuerda, cuando enciendas la molotov, debes arrojarla  \\

include_once realpath('../dao/entities/AgroclimatologiaDao.php');
include_once realpath('../dao/entities/BalancehidricoDao.php');
include_once realpath('../dao/entities/BiologiasueloDao.php');
include_once realpath('../dao/entities/ConversionenergeticaDao.php');
include_once realpath('../dao/entities/CostoDao.php');
include_once realpath('../dao/entities/EscenarioDao.php');
include_once realpath('../dao/entities/EvotranspiracionDao.php');
include_once realpath('../dao/entities/FincaDao.php');
include_once realpath('../dao/entities/FisicasueloDao.php');
include_once realpath('../dao/entities/HistoricoDao.php');
include_once realpath('../dao/entities/HojarutaDao.php');
include_once realpath('../dao/entities/LaborDao.php');
include_once realpath('../dao/entities/LecturabalancehidricoDao.php');
include_once realpath('../dao/entities/LecturabiologiasueloDao.php');
include_once realpath('../dao/entities/LecturaconversionenergeticaDao.php');
include_once realpath('../dao/entities/LecturaevotranspiracionDao.php');
include_once realpath('../dao/entities/LecturafisicasueloDao.php');
include_once realpath('../dao/entities/LecturamanejointegradoenfermedadesDao.php');
include_once realpath('../dao/entities/LecturamanejoplagaDao.php');
include_once realpath('../dao/entities/LecturaquimicasueloDao.php');
include_once realpath('../dao/entities/LoteDao.php');
include_once realpath('../dao/entities/ManejointegradoenfermedadesDao.php');
include_once realpath('../dao/entities/ManejointegradoplagasDao.php');
include_once realpath('../dao/entities/MetaDao.php');
include_once realpath('../dao/entities/MetricabalancehidricoDao.php');
include_once realpath('../dao/entities/MetricabiologiasueloDao.php');
include_once realpath('../dao/entities/MetricaconversionenergeticaDao.php');
include_once realpath('../dao/entities/MetricaevotranspiracionDao.php');
include_once realpath('../dao/entities/MetricamanejointegradoenfermedadesDao.php');
include_once realpath('../dao/entities/MetricamanejoplagasDao.php');
include_once realpath('../dao/entities/MetricaquimicasueloDao.php');
include_once realpath('../dao/entities/MetricassueloDao.php');
include_once realpath('../dao/entities/MiagroempresaDao.php');
include_once realpath('../dao/entities/MipeDao.php');
include_once realpath('../dao/entities/PersonaDao.php');
include_once realpath('../dao/entities/ProyeccionDao.php');
include_once realpath('../dao/entities/QuimicasueloDao.php');
include_once realpath('../dao/entities/RolDao.php');
include_once realpath('../dao/entities/SistemaDao.php');
include_once realpath('../dao/entities/SueloDao.php');
include_once realpath('../dao/entities/UsuarioDao.php');
include_once realpath('../dao/entities/Usuario_has_hojarutaDao.php');


interface IFactoryDao {
	
     /**
     * Devuelve una instancia de AgroclimatologiaDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de AgroclimatologiaDao
     */
     public function getAgroclimatologiaDao($dbName);
     /**
     * Devuelve una instancia de BalancehidricoDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de BalancehidricoDao
     */
     public function getBalancehidricoDao($dbName);
     /**
     * Devuelve una instancia de BiologiasueloDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de BiologiasueloDao
     */
     public function getBiologiasueloDao($dbName);
     /**
     * Devuelve una instancia de ConversionenergeticaDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de ConversionenergeticaDao
     */
     public function getConversionenergeticaDao($dbName);
     /**
     * Devuelve una instancia de CostoDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de CostoDao
     */
     public function getCostoDao($dbName);
     /**
     * Devuelve una instancia de EscenarioDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de EscenarioDao
     */
     public function getEscenarioDao($dbName);
     /**
     * Devuelve una instancia de EvotranspiracionDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de EvotranspiracionDao
     */
     public function getEvotranspiracionDao($dbName);
     /**
     * Devuelve una instancia de FincaDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de FincaDao
     */
     public function getFincaDao($dbName);
     /**
     * Devuelve una instancia de FisicasueloDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de FisicasueloDao
     */
     public function getFisicasueloDao($dbName);
     /**
     * Devuelve una instancia de HistoricoDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de HistoricoDao
     */
     public function getHistoricoDao($dbName);
     /**
     * Devuelve una instancia de HojarutaDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de HojarutaDao
     */
     public function getHojarutaDao($dbName);
     /**
     * Devuelve una instancia de LaborDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de LaborDao
     */
     public function getLaborDao($dbName);
     /**
     * Devuelve una instancia de LecturabalancehidricoDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de LecturabalancehidricoDao
     */
     public function getLecturabalancehidricoDao($dbName);
     /**
     * Devuelve una instancia de LecturabiologiasueloDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de LecturabiologiasueloDao
     */
     public function getLecturabiologiasueloDao($dbName);
     /**
     * Devuelve una instancia de LecturaconversionenergeticaDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de LecturaconversionenergeticaDao
     */
     public function getLecturaconversionenergeticaDao($dbName);
     /**
     * Devuelve una instancia de LecturaevotranspiracionDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de LecturaevotranspiracionDao
     */
     public function getLecturaevotranspiracionDao($dbName);
     /**
     * Devuelve una instancia de LecturafisicasueloDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de LecturafisicasueloDao
     */
     public function getLecturafisicasueloDao($dbName);
     /**
     * Devuelve una instancia de LecturamanejointegradoenfermedadesDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de LecturamanejointegradoenfermedadesDao
     */
     public function getLecturamanejointegradoenfermedadesDao($dbName);
     /**
     * Devuelve una instancia de LecturamanejoplagaDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de LecturamanejoplagaDao
     */
     public function getLecturamanejoplagaDao($dbName);
     /**
     * Devuelve una instancia de LecturaquimicasueloDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de LecturaquimicasueloDao
     */
     public function getLecturaquimicasueloDao($dbName);
     /**
     * Devuelve una instancia de LoteDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de LoteDao
     */
     public function getLoteDao($dbName);
     /**
     * Devuelve una instancia de ManejointegradoenfermedadesDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de ManejointegradoenfermedadesDao
     */
     public function getManejointegradoenfermedadesDao($dbName);
     /**
     * Devuelve una instancia de ManejointegradoplagasDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de ManejointegradoplagasDao
     */
     public function getManejointegradoplagasDao($dbName);
     /**
     * Devuelve una instancia de MetaDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de MetaDao
     */
     public function getMetaDao($dbName);
     /**
     * Devuelve una instancia de MetricabalancehidricoDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de MetricabalancehidricoDao
     */
     public function getMetricabalancehidricoDao($dbName);
     /**
     * Devuelve una instancia de MetricabiologiasueloDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de MetricabiologiasueloDao
     */
     public function getMetricabiologiasueloDao($dbName);
     /**
     * Devuelve una instancia de MetricaconversionenergeticaDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de MetricaconversionenergeticaDao
     */
     public function getMetricaconversionenergeticaDao($dbName);
     /**
     * Devuelve una instancia de MetricaevotranspiracionDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de MetricaevotranspiracionDao
     */
     public function getMetricaevotranspiracionDao($dbName);
     /**
     * Devuelve una instancia de MetricamanejointegradoenfermedadesDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de MetricamanejointegradoenfermedadesDao
     */
     public function getMetricamanejointegradoenfermedadesDao($dbName);
     /**
     * Devuelve una instancia de MetricamanejoplagasDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de MetricamanejoplagasDao
     */
     public function getMetricamanejoplagasDao($dbName);
     /**
     * Devuelve una instancia de MetricaquimicasueloDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de MetricaquimicasueloDao
     */
     public function getMetricaquimicasueloDao($dbName);
     /**
     * Devuelve una instancia de MetricassueloDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de MetricassueloDao
     */
     public function getMetricassueloDao($dbName);
     /**
     * Devuelve una instancia de MiagroempresaDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de MiagroempresaDao
     */
     public function getMiagroempresaDao($dbName);
     /**
     * Devuelve una instancia de MipeDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de MipeDao
     */
     public function getMipeDao($dbName);
     /**
     * Devuelve una instancia de PersonaDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de PersonaDao
     */
     public function getPersonaDao($dbName);
     /**
     * Devuelve una instancia de ProyeccionDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de ProyeccionDao
     */
     public function getProyeccionDao($dbName);
     /**
     * Devuelve una instancia de QuimicasueloDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de QuimicasueloDao
     */
     public function getQuimicasueloDao($dbName);
     /**
     * Devuelve una instancia de RolDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de RolDao
     */
     public function getRolDao($dbName);
     /**
     * Devuelve una instancia de SistemaDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de SistemaDao
     */
     public function getSistemaDao($dbName);
     /**
     * Devuelve una instancia de SueloDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de SueloDao
     */
     public function getSueloDao($dbName);
     /**
     * Devuelve una instancia de UsuarioDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de UsuarioDao
     */
     public function getUsuarioDao($dbName);
     /**
     * Devuelve una instancia de Usuario_has_hojarutaDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Usuario_has_hojarutaDao
     */
     public function getUsuario_has_hojarutaDao($dbName);

}
//That`s all folks!