<?php

/**
 * cLogin.php
 * 
 * Este fichero es utilizado como controlador de la pantalla
 * de login, este controlador entrará en funcionamiento si no
 * se ha iniciado la sesión en la aplicación web.
 * 
 * @author Israel García Cabañeros <isragarcia97@gmail.com>
 * @since 11/04/2019
 * @version 0.1
 */
/*
 * Lo que haremos en este fichero es que se controle a que botón
 * pulsa el usuario, este puede salir de la aplicación, acceder 
 * al inicio de la aplicación si la entrada es correcta o registrarse
 * si aún no tiene una cuenta.
 */
$entradaOK = true;

$a_respuesta = [
    'username' => null,
    'password' => null
];

$a_errores = [
    'username' => null,
    'password' => null,
    'noExiste' => null
];

if (isset($_REQUEST['registrarse'])) {
    $_SESSION['pagina'] = 'registrarse';
    header('Location: index.php');
    exit;
}

if (isset($_REQUEST['enviar'])) {
    $a_errores['username'] = validacionFormularios::comprobarAlfabetico($_POST['username'], LONGMAXUSUARIO, LONGMINUSUARIO, OBLIGATORIO);
    $a_errores['password'] = validacionFormularios::comprobarAlfabetico($_POST['password'], LONGMAXPASS, LONGMINPASS, OBLIGATORIO);
    foreach ($a_errores as $key => $error) {
        if ($error != null) {
            $entradaOK = false;
            $_REQUEST[$key] = '';
        }
    }
}

if (isset($_REQUEST['enviar']) && $entradaOK) {
    $a_respuesta['username'] = $_REQUEST['username'];
    $a_respuesta['password'] = $_REQUEST['password'];
    $usuario = Usuario::validarUsuario($a_respuesta['username'], $a_respuesta['password']);

    if (is_null($usuario)) {
        $a_errores['noExiste'] = 'Usuario y/o contraseña incorrectos.';
    } else {
        $_SESSION['usuario'] = $usuario;
        $_SESSION['pagina'] = 'inicio';
        $_SESSION['visitas'] = $usuario->registrarUltimaConexion();
        header('Location: index.php');
        exit;
    }
}

$_SESSION['pagina'] = 'login';
require_once $vistas['layout'];
