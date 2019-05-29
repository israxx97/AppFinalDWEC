<link rel="stylesheet" type="text/css" href="webroot/css/vMiCuentaStyles.css">
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <!-- <a class="navbar-brand" href="#" onclick="return false">Ventana de usuario</a> -->
    <form name="formMiCuenta" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <input type="submit" class="btn btn-secondary my-2 my-sm-0 btn-sm" name="cancelar" value="Volver al perfil">
    </form>
</nav>
<div class="container">
    <p class="h2 text-center">Modificar contraseña</p>
    <form name="formMiCuenta" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <div class="preview text-center">
            <img class="preview-img" src="http://simpleicon.com/wp-content/uploads/account.png" alt="Preview Image" width="150" height="150"/>
            <div class="browse-button">
                <i class="fa fa-pencil-alt"></i>
                <input class="browse-input" type="file" name="UploadedFile" id="UploadedFile"/>
            </div>
            <!-- <span class="Error"></span> -->
            <div class="form-group">
                <label for="password1">Escribe la contraseña actual:&nbsp;</label><font color="red">&nbsp;*</font>
                <input class="form-control" type="text" name="password1" id="password1" value="<?php
                if (isset($_REQUEST['password1']) && is_null($a_errores['password1'])) {
                    echo $_REQUEST['password1'];
                }
                ?>"/>
            </div><font color="red"><?php echo $a_errores['password1']; ?></font>
            <div class="form-group">
                <label for="password2">Escribe la nueva contraseña:&nbsp;</label><font color="red">&nbsp;*</font>
                <input class="form-control" type="text" name="password2" id="password2" value="<?php
                if (isset($_REQUEST['password2']) && is_null($a_errores['password2'])) {
                    echo $_REQUEST['password2'];
                }
                ?>"/>
            </div><font color="red"><?php echo $a_errores['password2']; ?></font>
            <div class="form-group">
                <label for="password3">Repite la nueva contraseña:&nbsp;</label><font color="red">&nbsp;*</font>
                <input class="form-control" type="text" name="password3" id="password3" value="<?php
                if (isset($_REQUEST['password3']) && is_null($a_errores['password3'])) {
                    echo $_REQUEST['password3'];
                }
                ?>"/>
            </div><font color="red"><?php echo $a_errores['password3']; ?></font>
            <div class="form-group">
                <input class="btn btn-primary btn-block" type="submit" name="enviar" value="Modificar contraseña"/>
            </div>
        </div>
    </form>
</div>
