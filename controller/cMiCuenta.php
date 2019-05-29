<?php

$entradaOK = true;

$a_respuesta = [
    'descUsuario' => null
];

$a_errores = [
    'descUsuario' => null
];

if (isset($_REQUEST['cancelar'])) {
    $_SESSION['pagina'] = 'inicio';
    header('Location: index.php');
    exit;
}

if (isset($_REQUEST['eliminarCuenta'])) {
    $usuario = $_SESSION['usuario'];
    if ($usuario->borrarUsuario()) {
        unset($_SESSION['usuario']);
        session_destroy();
        $_SESSION['pagina'] = 'login';
        header('Location: index.php');
        exit;
    }
}

if (isset($_REQUEST['modificarPassword'])) {
    // $_SESSION['pagina'] = 'cambiarPassword';
    $_SESSION['paginaAnterior'] = $_SESSION['pagina'];
    $_SESSION['pagina'] = 'wip';
    header('Location: index.php');
    exit;
}

if (isset($_REQUEST['enviar'])) {
    $a_errores['descUsuario'] = validacionFormularios::comprobarAlfabetico($_REQUEST['descUsuario'], 255, 3, 1);
    foreach ($a_errores as $key => $error) {
        if ($error != null) {
            $entradaOK = false;
            $_REQUEST[$key] = '';
        }
    }
}

if (isset($_REQUEST['enviar']) && $entradaOK == true) {
    $a_respuesta['descUsuario'] = $_REQUEST['descUsuario'];
    $usuario = $_SESSION['usuario'];

    if ($a_respuesta['descUsuario'] != $usuario->getDescUsuario()) {
        $usuario = $usuario->modificarUsuario($_SESSION['usuario']->getPassword(), $a_respuesta['descUsuario'], null);
        $_SESSION['usuario'] = $usuario;
    }
    $_SESSION['pagina'] = 'inicio';
    header('Location: index.php');
} else {
    $_SESSION['pagina'] = 'miCuenta';
    require_once $vistas['layout'];
}
