<?php

$entradaOK = true;

$a_respuesta = [
    'codUsuario' => null,
    'descUsuario' => null,
    'password' => null
];

$a_errores = [
    'codUsuario' => null,
    'descUsuario' => null,
    'password' => null,
    'yaExiste' => null
];

if (isset($_REQUEST['cancelar'])) {
    $_SESSION['pagina'] = 'login';
    header('Location: index.php');
} else {
    if (isset($_REQUEST['enviar'])) {
        $a_errores['codUsuario'] = validacionFormularios::comprobarAlfabetico($_REQUEST['codUsuario'], 50, 3, 1);
        $a_errores['descUsuario'] = validacionFormularios::comprobarAlfabetico($_REQUEST['descUsuario'], 255, 3, 1);
        $a_errores['password'] = validacionFormularios::comprobarAlfabetico($_REQUEST['password'], 256, 4, 1);

        foreach ($a_errores as $key => $error) {
            if ($error != null) {
                $entradaOK = false;
                $_REQUEST[$key] = '';
            }
        }

        if (Usuario::validarCodNoExiste($_REQUEST['codUsuario'])) {
            $a_errores['yaExiste'] = 'El usuario con ese código ya existe.';
            $entradaOK = false;
        }
    }

    if (isset($_REQUEST['enviar']) && $entradaOK) {
        $a_respuesta['codUsuario'] = $_REQUEST['codUsuario'];
        $a_respuesta['descUsuario'] = $_REQUEST['descUsuario'];
        $a_respuesta['password'] = $_REQUEST['password'];
        $usuario = Usuario::altaUsuario($a_respuesta['codUsuario'], $a_respuesta['password'], $a_respuesta['descUsuario']);
        $_SESSION['usuario'] = $usuario;
        $_SESSION['visitas'] = $usuario->registrarUltimaConexion();
        $_SESSION['pagina'] = 'inicio';
        header('Location: index.php');
    } else {
        $_SESSION['pagina'] = 'registrarse';
        require_once $vistas['layout'];
    }
}
