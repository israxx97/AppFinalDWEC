<?php

$entradaOK = true;

$a_respuesta = [
    'password1' => null,
    'password2' => null,
    'password3' => null
];

$a_errores = [
    'password1' => null,
    'password2' => null,
    'password3' => null,
    'passwordIgual' => null,
    'passwordNoIgual' => null,
    'passwordNoExiste' => null
];

$oldPassword = $_SESSION['usuario']->getPassword();

if (isset($_REQUEST['cancelar'])) {
    $_SESSION['pagina'] = 'miCuenta';
    header('Location: index.php');
    exit;
}

if (isset($_REQUEST['enviar'])) {
    $a_errores['password1'] = validacionFormularios::comprobarAlfabetico($_REQUEST['password1'], 256, 4, 1);
    $a_errores['password2'] = validacionFormularios::comprobarAlfabetico($_REQUEST['password2'], 256, 4, 1);
    $a_errores['password3'] = validacionFormularios::comprobarAlfabetico($_REQUEST['password3'], 256, 4, 1);

    foreach ($a_errores as $key => $error) {
        if ($error != null) {
            $entradaOK = false;
            $_REQUEST[$key] = '';
        }
    }

    if ($oldPassword != $_REQUEST['password1']) {
        
    }
}
