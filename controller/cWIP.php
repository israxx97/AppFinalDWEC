<?php

if (isset($_REQUEST['cancelar'])) {
    $_SESSION['pagina'] = $_SESSION['paginaAnterior'];
    header('Location: index.php');
    exit;
}
$_SESSION['pagina'] = 'wip';
require_once $vistas['layout'];
