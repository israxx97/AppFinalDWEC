<link rel="stylesheet" type="text/css" href="webroot/css/vMiCuentaStyles.css">
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <!-- <a class="navbar-brand" href="#" onclick="return false">Ventana de usuario</a> -->
    <form name="formMiCuenta" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <input type="submit" class="btn btn-secondary my-2 my-sm-0 btn-sm" name="cancelar" value="Volver Login">
    </form>
</nav>
<div class="container">
    <p class="h2 text-center">Registro</p>
    <form name="formMiCuenta" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <div class="preview text-center">
            <div class="form-group">
                <label for="codUsuario">Código de Usuario:&nbsp;</label><font color="red">&nbsp;*</font>
                <input class="form-control" type="text" name="codUsuario" id="codUsuario" value="<?php
                if (isset($_REQUEST['codUsuario']) && is_null($a_errores['codUsuario'])) {
                    echo $_REQUEST['codUsuario'];
                }
                ?>" />
            </div><p><font color="red"><?php echo $a_errores['codUsuario']; ?></font></p>
            <div class="form-group">
                <label for="password">Contraseña de Usuario:&nbsp;</label><font color="red">&nbsp;*</font>
                <input class="form-control" type="password" name="password" id="password" value="<?php
                if (isset($_REQUEST['password']) && is_null($a_errores['password'])) {
                    echo $_REQUEST['password'];
                }
                ?>" />
            </div><p><font color="red"><?php echo $a_errores['password']; ?></font></p>
            <div class="form-group">
                <label for="descUsuario">Descripción de Usuario:&nbsp;</label><font color="red">&nbsp;*</font>
                <input class="form-control" type="text" name="descUsuario" id="descUsuario" value="<?php
                if (isset($_REQUEST['descUsuario']) && is_null($a_errores['descUsuario'])) {
                    echo $_REQUEST['descUsuario'];
                }
                ?>"/>
            </div><p><font color="red"><?php echo $a_errores['descUsuario']; ?></font></p>
            <p><font color="red"><?php echo $a_errores['yaExiste']; ?></font></p>
            <div class="form-group">
                <div class="custom-control custom-checkbox">
                    <input name="materialChecked2" id="materialChecked2" type="checkbox" class="custom-control-input" id="materialChecked2">
                    <label class="custom-control-label" for="materialChecked2" onclick="mostrarPass();">Mostrar contraseña</label>
                </div>
            </div>
            <div class="form-group">
                <input class="btn btn-primary btn-block" type="submit" name="enviar" value="Registrarse"/>
            </div>
        </div>
    </form>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('#materialChecked2').click(function () {
            if ($('#materialChecked2').is(':checked')) {
                $('#password').attr('type', 'text');
            } else {
                $('#password').attr('type', 'password');
            }
        });
    });
</script>