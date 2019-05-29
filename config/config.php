<?php

/*
 * Archivo de validación de los campos de los formularios.
 */
require_once 'core/validacionFormularios.php';
/*
 * Archivos de los modelos.
 */
require_once 'model/Usuario.php';
require_once 'model/Errores.php';
// require_once 'gafas/Gafas.php';

/*
 * Constantes usadas para las funciones de la validación de formularios.
 */
define("OBLIGATORIO", 1);
define("NOOBLIGATORIO", 0);
define("LONGMAX", 3);
define("LONGMIN", 3);
define("LONGMAXDESC", 255);
define("LONGMINDESC", 3);
define("LONGMAXUSUARIO", 45);
define("LONGMINUSUARIO", 3);
define("LONGMAXSOAP", 255);
define("LONGMINSOAP", 1);
define("LONGMAXPASS", 50);
define("LONGMINPASS", 4);
define("LONGMAXALFABETICO", 50);
define("LONGMINALFABETICO", 10);
define("MAXIMONUMERO", 10);
define("MINIMONUMERO", 0);
define("MAXIMOPRESUPUESTO", 100000);
define("MINIMOPRESUPUESTO", 1);
define("LONGMAXTEXTOLIBRE", 250);
define("LONGMINTEXTOLIBRE", 10);
define("REGISTROSPAGINA", 3);
define("RUTACASA", "http://localhost/index_03/index/ProyectoDWES/ProyectoTema06/codigoPHP/AplicacionFinalMVC/api/rest.json");
define("RUTAED", "http://192.168.20.19/DAW202/public_html/ProyectoDWES/ProyectoTema06/codigoPHP/AplicacionFinalMVC/api/rest.json");
define("RUTAEE", "http://192.168.20.18/DAW202/public_html/ProyectoDWES/ProyectoTema06/codigoPHP/AplicacionFinalMVC/api/rest.json");

/*
 * Array de controladores.
 */
$controladores = [
    'login' => 'controller/cLogin.php',
    'inicio' => 'controller/cInicio.php',
    'tecnologias' => 'controller/cTecnologias',
    'rss' => 'controller/cRSS',
    'registrarse' => 'controller/cRegistro.php',
    'miCuenta' => 'controller/cMiCuenta.php',
    'borrarCuenta' => 'controller/cBorrarCuenta.php',
    'cambiarPassword' => 'controller/cCambiarPassword.php',
    'mtoDepartamentos' => 'controller/cMtoDepartamentos.php',
    'altaDepartamento' => 'controller/cAltaDepartamento.php',
    'modificarDepartamento' => 'controller/cModificarDepartamento.php',
    'mostrarDepartamento' => 'controller/cMostrarDepartamento.php',
    'eliminarDepartamento' => 'controller/cEliminarDepartamento.php',
    'altaLogicaDepartamento' => 'controller/cAltaLogicaDepartamento.php',
    'bajaLogicaDepartamento' => 'controller/cBajaLogicaDepartamento.php',
    'importar' => 'controller/cImportar.php',
    'exportar' => 'controller/cExportar.php',
    'analisisOpiniones' => 'controller/cAnalisisOpiniones.php',
    'modificarOpiniones' => 'controller/cModificarOpiniones.php',
    'soap' => 'controller/cSOAP.php',
    'rest' => 'controller/cREST.php',
    'mtoCuestiones' => 'controller/cMtoCuestiones.php',
    'altaCuestion' => 'controller/cAltaCuestion.php',
    'modificarCuestion' => 'controller/cModificarCuestion.php',
    'eliminarCuestion' => 'controller/cEliminarCuestion.php',
    'mtoUsuarios' => 'controller/cMtoUsuarios.php',
    'modificarUsuario' => 'controller/cModificarUsuario.php',
    'eliminarUsuario' => 'controller/cEliminarUsuario.php',
    'wip' => 'controller/cWIP.php',
    'error' => 'controller/cError.php',
    'dom' => 'controller/cDom.php'
];

/*
 * Array de vistas.
 */
$vistas = [
    'layout' => 'view/layout.php',
    'login' => 'view/vLogin.php',
    'inicio' => 'view/vInicio.php',
    'tecnologias' => 'view/vTecnologias',
    'rss' => 'view/vRSS',
    'registrarse' => 'view/vRegistro.php',
    'miCuenta' => 'view/vMiCuenta.php',
    'borrarCuenta' => 'view/vBorrarCuenta.php',
    'cambiarPassword' => 'view/vCambiarPassword.php',
    'mtoDepartamentos' => 'view/vMtoDepartamentos.php',
    'altaDepartamento' => 'view/vAltaDepartamento.php',
    'modificarDepartamento' => 'view/vModificarDepartamento.php',
    'mostrarDepartamento' => 'view/vMostrarDepartamento.php',
    'eliminarDepartamento' => 'view/vEliminarDepartamento.php',
    'altaLogicaDepartamento' => 'view/vAltaLogicaDepartamento.php',
    'bajaLogicaDepartamento' => 'view/vBajaLogicaDepartamento.php',
    'importar' => 'view/vImportar.php',
    'exportar' => 'view/vExportar.php',
    'analisisOpiniones' => 'view/vAnalisisOpiniones.php',
    'modificarOpiniones' => 'view/vModificarOpiniones.php',
    'soap' => 'view/vSOAP.php',
    'rest' => 'view/vREST.php',
    'mtoCuestiones' => 'view/vMtoCuestiones.php',
    'altaCuestion' => 'view/vAltaCuestion.php',
    'modificarCuestion' => 'view/vModificarCuestion.php',
    'eliminarCuestion' => 'view/vEliminarCuestion.php',
    'mtoUsuarios' => 'view/vMtoUsuarios.php',
    'modificarUsuario' => 'view/vModificarUsuario.php',
    'eliminarUsuario' => 'view/vEliminarUsuario.php',
    'wip' => 'view/vWIP.php',
    'error' => 'view/vError.php',
    'dom' => 'view/vDom.php'
];
