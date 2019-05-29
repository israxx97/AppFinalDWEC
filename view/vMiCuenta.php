<link rel="stylesheet" type="text/css" href="webroot/css/vMiCuentaStyles.css">
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <form style="margin-left: 100px;"name="formMiCuenta" action="<?php echo $_SERVER['PHP_SELF']; ?>" action="POST">
        <ul class="nav nav-pills">
            <li class="nav-item">
                <input style="margin-right: 5px;" type="submit" id="cancelar" class="btn btn-outline-success" name="cancelar" value="Volver Inicio"/>
            </li>
            <li class="nav-item">
                <input class="btn btn-outline-danger" type="button" name="eliminarCuenta" id="eliminarCuenta" value="Eliminar Cuenta"/>
            </li>
        </ul>
    </form>
</nav>
<div class="container">
    <p class="h2 text-center"><?php echo $_SESSION['usuario']->getDescUsuario(); ?></p>
    <form name="formMiCuenta" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <div class="preview text-left">
            <!-- <img class="preview-img" src="http://simpleicon.com/wp-content/uploads/account.png" alt="Preview Image" width="150" height="150"/>
            <div class="browse-button">
                <i class="fa fa-pencil-alt"></i>
                <input class="browse-input" type="file" name="UploadedFile" id="UploadedFile"/>
            </div> -->
            <!-- <span class="Error"></span> -->
            <div class="form-group">
                <label for="codUsuario">Código de Usuario:&nbsp;</label>
                <input style="background-color: #cccccc; color: black;" class="form-control" type="text" name="codUsuario" id="codUsuario" value="<?php
                echo $_SESSION['usuario']->getCodUsuario();
                ?>" disabled/>
            </div>
            <div class="form-group">
                <label for="perfilUsuario">Perfil de Usuario:&nbsp;</label>
                <input style="background-color: #cccccc; color: black;" class="form-control" type="text" name="perfilUsuario" id="perfilUsuario" value="<?php
                echo $_SESSION['usuario']->getPerfil();
                ?>" disabled/>
            </div>
            <div class="form-group">
                <label for="perfilUsuario">Contraseña de Usuario:&nbsp;</label>
                <input style="background-color: #cccccc; color: black;" class="form-control" type="password" name="password" id="password" value="<?php
                echo $_SESSION['usuario']->getPassword();
                ?>" disabled/>
            </div>
            <div class="form-group">
                <input class="btn btn-primary btn-block" type="submit" name="modificarPassword" value="Modificar contraseña"/>
            </div>
            <div class="form-group">
                <label for="perfilUsuario">Número de accesos:&nbsp;</label>
                <input style="background-color: #cccccc; color: black;" class="form-control" type="text" name="numAccesos" id="numAccesos" value="<?php
                echo $_SESSION['usuario']->getNumAccesos();
                ?>" disabled/>
            </div>
            <div class="form-group">
                <label for="perfilUsuario">Fecha y hora de la última conexión:&nbsp;</label>
                <input style="background-color: #cccccc; color: black;" class="form-control" type="text" name="perfilUsuario" id="perfilUsuario" value="<?php
                setlocale(LC_TIME, 'es_ES.UTF-8');
                date_default_timezone_set('Europe/Madrid');
                $fecha = date('d-m-Y, H:i:s', $_SESSION['usuario']->getFechaHoraUltimaConexion());
                echo $fecha;
                ?>" disabled/>
            </div>
            <div class="form-group">
                <label for="descUsuario">Descripción de Usuario:&nbsp;</label><font color="red">&nbsp;*</font>
                <input class="form-control" type="text" name="descUsuario" id="descUsuario" value="<?php
                if (isset($_REQUEST['descUsuario']) && is_null($a_errores['descUsuario'])) {
                    echo $_REQUEST['descUsuario'];
                } else {
                    echo $_SESSION['usuario']->getDescUsuario();
                }
                ?>"/>
            </div><font color="red"><?php echo $a_errores['descUsuario']; ?></font>
            <div class="form-group">
                <input class="btn btn-primary btn-block" type="submit" name="enviar" value="Modificar descripción"/>
            </div>
        </div>
    </form>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('#eliminarCuenta').click(function () {
            if (confirm('La cuenta <?php echo $_SESSION['usuario']->getDescUsuario(); ?> se borrará permanentemente. ¿Estas seguro que deseas borrarla?')) {
                $('#eliminarCuenta').attr('type', 'submit');
                alert('La cuenta se ha borrado con éxito.');
            } else {
                alert('La cuenta no se ha borrado.');
            }
        });
    });
</script>