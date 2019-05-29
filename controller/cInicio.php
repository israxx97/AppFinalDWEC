<?php

/**
 * cInicio.php
 * 
 * Este fichero es utilizado como controlador de la pantalla
 * principal una vez iniciada la sesión en la aplicación web.
 * 
 * @author Israel García Cabañeros <isragarcia97@gmail.com>
 * @since 11/04/2019
 * @version 0.1
 */
require_once 'api/REST.php';

$paramEstacion = '2755X';
$_SESSION['estacion'] = REST::datosDelTiempo($paramEstacion);

if (isset($_REQUEST['cerrarSession'])) {
    unset($_SESSION['usuario']);
    session_destroy();
    header('Location: index.php');
    exit;
}

if (isset($_REQUEST['editarPerfil'])) {
    $_SESSION['pagina'] = 'miCuenta';
    header('Location: index.php');
    exit;
}

if (isset($_REQUEST['mtoDepartamentos'])) {
    $_SESSION['pagina'] = 'mtoDepartamentos';
    /* $_SESSION['paginaAnterior'] = $_SESSION['pagina'];
      $_SESSION['pagina'] = 'wip'; */
    header('Location: index.php');
    exit;
}

if (isset($_REQUEST['rest'])) {
    $_SESSION['pagina'] = 'rest';
    header('Location: index.php');
    exit;
}

if (isset($_REQUEST['dom'])) {
    $_SESSION['pagina'] = 'dom';
    header('Location: index.php');
    exit;
}

if (isset($_REQUEST['mtoUsuarios'])) {
    // $_SESSION['pagina'] = 'mtoUsuarios';
    $_SESSION['paginaAnterior'] = $_SESSION['pagina'];
    $_SESSION['pagina'] = 'wip';
    header('Location: index.php');
    exit;
}

if (isset($_REQUEST['detalle'])) {
    $_SESSION['pagina'] = 'detalle';
    header('Location: index.php');
    exit;
}

if (!isset($_SESSION['usuario'])) { // Si no existe la sesión 'usuario' o esta se encuentra en null...
    header('Location: index.php'); // El encabezado de la página no redigira a index.php.
} else {
    require_once $vistas['layout']; // Si la sesión existe y tiene un valor distinto de null en el array asociativo de vistas requerirá el layout.
}

