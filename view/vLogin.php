<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <form class="container" name="formMiCuenta" action="<?php echo $_SERVER['PHP_SELF']; ?>" action="POST">
        <ul class="nav nav-pills">
            <li class="nav-item">
                <input style="margin-right: 5px;" class="btn btn-outline-danger" type="button" name="cancelar" id="cancelar" value="Menú Principal" onclick="location.href = '../../index.html'"/>
            </li>
            <li class="nav-item">
                <input type="button" id="botonLogIn" class="btn btn-outline-success" data-toggle="modal" data-target="#ventanaModal" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation" name="botonLogIn" value="Log In"/>
            </li>
        </ul>
    </form>
</nav>
<div class="modal fade" id="ventanaModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="lineModalLabel">Acceso a la aplicación</h3>
            </div>
            <div class="modal-body">
                <form name="formLogin" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <div class="form-group">
                        <label for="username">Usuario&nbsp;<font color="red">*</font></label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Nombre de usuario" value="<?php
                        if (isset($_REQUEST['username']) && is_null($a_errores['username'])) {
                            echo $_REQUEST['username'];
                        }
                        ?>"/>
                    </div>
                    <p><font color="red"><?php echo $a_errores['username']; ?></font></p>
                    <div class="form-group">
                        <label for="password">Contraseña&nbsp;<font color="red">*</font></label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password de usuario" value="<?php
                        if (isset($_REQUEST['password']) && is_null($a_errores['password'])) {
                            echo $_REQUEST['password'];
                        }
                        ?>"/>
                    </div>
                    <p><font color="red"><?php echo $a_errores['password']; ?></font></p>
                    <p><font color="red"><?php echo $a_errores['noExiste']; ?></font></p>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input name="materialChecked2" id="materialChecked2" type="checkbox" class="custom-control-input" id="materialChecked2">
                            <label class="custom-control-label" for="materialChecked2" onclick="mostrarPass();">Mostrar contraseña</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="btn-group btn-group-justified" role="group" aria-label="group button">
                            <div class="btn-group" role="group">
                                <input type="submit" class="btn btn-default bg-primary" name="enviar" value="Entrar"> 
                            </div>
                        </div>
                        <div class="btn-group btn-group-justified" role="group" aria-label="group button">
                            <div class="btn-group" role="group">
                                <input type="submit" class="btn btn-default bg-primary" name="registrarse" value="Regístrate">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="carouselExampleIndicators" class="carousel slide container" data-interval="false">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="webroot/images/20190528_DiagramaDeClases.PNG" alt="First slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="webroot/images/20190528_EstructuraDeDirectorios.PNG" alt="Second slide">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
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
<script type="text/javascript">
    $(document).ready(function () {
<?php
foreach ($a_errores as $key => $error) {
    if ($error != null) {
        ?>
                $('#botonLogIn').click();
        <?php
    }
}
?>
    });
</script>