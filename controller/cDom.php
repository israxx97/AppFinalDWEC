<?php

if (isset($_REQUEST['cancelar'])) {
    $_SESSION['pagina'] = 'inicio';
    header('Location: index.php');
} else {
    $_SESSION['pagina'] = 'dom';
    require_once $vistas['layout'];
}
