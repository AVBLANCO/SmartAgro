<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Alguna vez Anarchy se llamó Molotov ( u.u) *Nostalgia  \\
include_once realpath('AgroclimatologiaController.php');
include_once realpath('BalancehidricoController.php');
include_once realpath('BiologiasueloController.php');
include_once realpath('ConversionenergeticaController.php');
include_once realpath('CostoController.php');
include_once realpath('EscenarioController.php');
include_once realpath('EvotranspiracionController.php');
include_once realpath('FincaController.php');
include_once realpath('FisicasueloController.php');
include_once realpath('HistoricoController.php');
include_once realpath('HojarutaController.php');
include_once realpath('LaborController.php');
include_once realpath('LecturabalancehidricoController.php');
include_once realpath('LecturabiologiasueloController.php');
include_once realpath('LecturaconversionenergeticaController.php');
include_once realpath('LecturaevotranspiracionController.php');
include_once realpath('LecturafisicasueloController.php');
include_once realpath('LecturamanejointegradoenfermedadesController.php');
include_once realpath('LecturamanejoplagaController.php');
include_once realpath('LecturaquimicasueloController.php');
include_once realpath('LoteController.php');
include_once realpath('ManejointegradoenfermedadesController.php');
include_once realpath('ManejointegradoplagasController.php');
include_once realpath('MetaController.php');
include_once realpath('MetricabalancehidricoController.php');
include_once realpath('MetricabiologiasueloController.php');
include_once realpath('MetricaconversionenergeticaController.php');
include_once realpath('MetricaevotranspiracionController.php');
include_once realpath('MetricamanejointegradoenfermedadesController.php');
include_once realpath('MetricamanejoplagasController.php');
include_once realpath('MetricaquimicasueloController.php');
include_once realpath('MetricassueloController.php');
include_once realpath('MiagroempresaController.php');
include_once realpath('MipeController.php');
include_once realpath('PersonaController.php');
include_once realpath('ProyeccionController.php');
include_once realpath('QuimicasueloController.php');
include_once realpath('RolController.php');
include_once realpath('SistemaController.php');
include_once realpath('SueloController.php');
include_once realpath('UsuarioController.php');
include_once realpath('Usuario_has_hojarutaController.php');

$ruta = strip_tags($_POST['ruta']);
    	$rtn = "";
    	switch ($ruta) {
           case 'AgroclimatologiaInsert':
    			$rtn = AgroclimatologiaController::insert();
    			break;
    		case 'AgroclimatologiaList':
    			$rtn = AgroclimatologiaController::listAll();
    			break;
           case 'BalancehidricoInsert':
    			$rtn = BalancehidricoController::insert();
    			break;
    		case 'BalancehidricoList':
    			$rtn = BalancehidricoController::listAll();
    			break;
           case 'BiologiasueloInsert':
    			$rtn = BiologiasueloController::insert();
    			break;
    		case 'BiologiasueloList':
    			$rtn = BiologiasueloController::listAll();
    			break;
           case 'ConversionenergeticaInsert':
    			$rtn = ConversionenergeticaController::insert();
    			break;
    		case 'ConversionenergeticaList':
    			$rtn = ConversionenergeticaController::listAll();
    			break;
           case 'CostoInsert':
    			$rtn = CostoController::insert();
    			break;
    		case 'CostoList':
    			$rtn = CostoController::listAll();
    			break;
           case 'EscenarioInsert':
    			$rtn = EscenarioController::insert();
    			break;
    		case 'EscenarioList':
    			$rtn = EscenarioController::listAll();
    			break;
           case 'EvotranspiracionInsert':
    			$rtn = EvotranspiracionController::insert();
    			break;
    		case 'EvotranspiracionList':
    			$rtn = EvotranspiracionController::listAll();
    			break;
           case 'FincaInsert':
    			$rtn = FincaController::insert();
    			break;
    		case 'FincaList':
    			$rtn = FincaController::listAll();
    			break;
           case 'FisicasueloInsert':
    			$rtn = FisicasueloController::insert();
    			break;
    		case 'FisicasueloList':
    			$rtn = FisicasueloController::listAll();
    			break;
           case 'HistoricoInsert':
    			$rtn = HistoricoController::insert();
    			break;
    		case 'HistoricoList':
    			$rtn = HistoricoController::listAll();
    			break;
           case 'HojarutaInsert':
    			$rtn = HojarutaController::insert();
    			break;
    		case 'HojarutaList':
    			$rtn = HojarutaController::listAll();
    			break;
           case 'LaborInsert':
    			$rtn = LaborController::insert();
    			break;
    		case 'LaborList':
    			$rtn = LaborController::listAll();
    			break;
           case 'LecturabalancehidricoInsert':
    			$rtn = LecturabalancehidricoController::insert();
    			break;
    		case 'LecturabalancehidricoList':
    			$rtn = LecturabalancehidricoController::listAll();
    			break;
           case 'LecturabiologiasueloInsert':
    			$rtn = LecturabiologiasueloController::insert();
    			break;
    		case 'LecturabiologiasueloList':
    			$rtn = LecturabiologiasueloController::listAll();
    			break;
           case 'LecturaconversionenergeticaInsert':
    			$rtn = LecturaconversionenergeticaController::insert();
    			break;
    		case 'LecturaconversionenergeticaList':
    			$rtn = LecturaconversionenergeticaController::listAll();
    			break;
           case 'LecturaevotranspiracionInsert':
    			$rtn = LecturaevotranspiracionController::insert();
    			break;
    		case 'LecturaevotranspiracionList':
    			$rtn = LecturaevotranspiracionController::listAll();
    			break;
           case 'LecturafisicasueloInsert':
    			$rtn = LecturafisicasueloController::insert();
    			break;
    		case 'LecturafisicasueloList':
    			$rtn = LecturafisicasueloController::listAll();
    			break;
           case 'LecturamanejointegradoenfermedadesInsert':
    			$rtn = LecturamanejointegradoenfermedadesController::insert();
    			break;
    		case 'LecturamanejointegradoenfermedadesList':
    			$rtn = LecturamanejointegradoenfermedadesController::listAll();
    			break;
           case 'LecturamanejoplagaInsert':
    			$rtn = LecturamanejoplagaController::insert();
    			break;
    		case 'LecturamanejoplagaList':
    			$rtn = LecturamanejoplagaController::listAll();
    			break;
           case 'LecturaquimicasueloInsert':
    			$rtn = LecturaquimicasueloController::insert();
    			break;
    		case 'LecturaquimicasueloList':
    			$rtn = LecturaquimicasueloController::listAll();
    			break;
           case 'LoteInsert':
    			$rtn = LoteController::insert();
    			break;
    		case 'LoteList':
    			$rtn = LoteController::listAll();
    			break;
           case 'ManejointegradoenfermedadesInsert':
    			$rtn = ManejointegradoenfermedadesController::insert();
    			break;
    		case 'ManejointegradoenfermedadesList':
    			$rtn = ManejointegradoenfermedadesController::listAll();
    			break;
           case 'ManejointegradoplagasInsert':
    			$rtn = ManejointegradoplagasController::insert();
    			break;
    		case 'ManejointegradoplagasList':
    			$rtn = ManejointegradoplagasController::listAll();
    			break;
           case 'MetaInsert':
    			$rtn = MetaController::insert();
    			break;
    		case 'MetaList':
    			$rtn = MetaController::listAll();
    			break;
           case 'MetricabalancehidricoInsert':
    			$rtn = MetricabalancehidricoController::insert();
    			break;
    		case 'MetricabalancehidricoList':
    			$rtn = MetricabalancehidricoController::listAll();
    			break;
           case 'MetricabiologiasueloInsert':
    			$rtn = MetricabiologiasueloController::insert();
    			break;
    		case 'MetricabiologiasueloList':
    			$rtn = MetricabiologiasueloController::listAll();
    			break;
           case 'MetricaconversionenergeticaInsert':
    			$rtn = MetricaconversionenergeticaController::insert();
    			break;
    		case 'MetricaconversionenergeticaList':
    			$rtn = MetricaconversionenergeticaController::listAll();
    			break;
           case 'MetricaevotranspiracionInsert':
    			$rtn = MetricaevotranspiracionController::insert();
    			break;
    		case 'MetricaevotranspiracionList':
    			$rtn = MetricaevotranspiracionController::listAll();
    			break;
           case 'MetricamanejointegradoenfermedadesInsert':
    			$rtn = MetricamanejointegradoenfermedadesController::insert();
    			break;
    		case 'MetricamanejointegradoenfermedadesList':
    			$rtn = MetricamanejointegradoenfermedadesController::listAll();
    			break;
           case 'MetricamanejoplagasInsert':
    			$rtn = MetricamanejoplagasController::insert();
    			break;
    		case 'MetricamanejoplagasList':
    			$rtn = MetricamanejoplagasController::listAll();
    			break;
           case 'MetricaquimicasueloInsert':
    			$rtn = MetricaquimicasueloController::insert();
    			break;
    		case 'MetricaquimicasueloList':
    			$rtn = MetricaquimicasueloController::listAll();
    			break;
           case 'MetricassueloInsert':
    			$rtn = MetricassueloController::insert();
    			break;
    		case 'MetricassueloList':
    			$rtn = MetricassueloController::listAll();
    			break;
           case 'MiagroempresaInsert':
    			$rtn = MiagroempresaController::insert();
    			break;
    		case 'MiagroempresaList':
    			$rtn = MiagroempresaController::listAll();
    			break;
           case 'MipeInsert':
    			$rtn = MipeController::insert();
    			break;
    		case 'MipeList':
    			$rtn = MipeController::listAll();
    			break;
           case 'PersonaInsert':
    			$rtn = PersonaController::insert();
    			break;
    		case 'PersonaList':
    			$rtn = PersonaController::listAll();
    			break;
           case 'ProyeccionInsert':
    			$rtn = ProyeccionController::insert();
    			break;
    		case 'ProyeccionList':
    			$rtn = ProyeccionController::listAll();
    			break;
           case 'QuimicasueloInsert':
    			$rtn = QuimicasueloController::insert();
    			break;
    		case 'QuimicasueloList':
    			$rtn = QuimicasueloController::listAll();
    			break;
           case 'RolInsert':
    			$rtn = RolController::insert();
    			break;
    		case 'RolList':
    			$rtn = RolController::listAll();
    			break;
           case 'SistemaInsert':
    			$rtn = SistemaController::insert();
    			break;
    		case 'SistemaList':
    			$rtn = SistemaController::listAll();
    			break;
           case 'SueloInsert':
    			$rtn = SueloController::insert();
    			break;
    		case 'SueloList':
    			$rtn = SueloController::listAll();
    			break;
           case 'UsuarioInsert':
    			$rtn = UsuarioController::insert();
    			break;
    		case 'UsuarioList':
    			$rtn = UsuarioController::listAll();
    			break;
           case 'Usuario_has_hojarutaInsert':
    			$rtn = Usuario_has_hojarutaController::insert();
    			break;
    		case 'Usuario_has_hojarutaList':
    			$rtn = Usuario_has_hojarutaController::listAll();
    			break;
    		default:
    			$rtn="404 Ruta no encontrada.";
    			break;
    	}

echo $rtn;

//That`s all folks!