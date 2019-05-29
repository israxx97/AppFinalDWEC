<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <form class="container" name="formREST" action="<?php echo $_SERVER['PHP_SELF']; ?>" action="POST">
        <ul class="nav nav-pills">
            <li class="nav-item">
                <input style="margin-right: 5px;" class="btn btn-outline-danger" type="submit" name="cancelar" id="cancelar" value="Volver inicio"/>
            </li>
        </ul>
    </form>
</nav>
<form class="container" name="formREST" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <p class="h3">Api REST Propio</p>
    <div class="form-group">
        <label class="h4" for="seleccionarGafas">Selecciona un tipo de gafas</label><br>
        <select class="col-lg-3" name="seleccionarGafas" id="seleccionarGafas" class="form-control">
            <option value="1" <?php echo (isset($_REQUEST['seleccionarGafas']) && $_REQUEST['seleccionarGafas'] == '1' ? 'selected' : ''); ?>>ROLLER TR90 BLACK EDITION</option>
            <option value="2" <?php echo (isset($_REQUEST['seleccionarGafas']) && $_REQUEST['seleccionarGafas'] == '2' ? 'selected' : ''); ?>>DUNAR MILKY DEMI / BLACK</option>
            <option value="3" <?php echo (isset($_REQUEST['seleccionarGafas']) && $_REQUEST['seleccionarGafas'] == '3' ? 'selected' : ''); ?>>ROLLER TR90 CAREY G15</option>
            <option value="4" <?php echo (isset($_REQUEST['seleccionarGafas']) && $_REQUEST['seleccionarGafas'] == '4' ? 'selected' : ''); ?>>ULTRA LIGHT CLIP-ON V1</option>
            <option value="5" <?php echo (isset($_REQUEST['seleccionarGafas']) && $_REQUEST['seleccionarGafas'] == '5' ? 'selected' : ''); ?>>ROSEVELT II BLACK / BLACK</option>
            <option value="6" <?php echo (isset($_REQUEST['seleccionarGafas']) && $_REQUEST['seleccionarGafas'] == '6' ? 'selected' : ''); ?>>AMERICA II CAREY G-15</option>
            <option value="7" <?php echo (isset($_REQUEST['seleccionarGafas']) && $_REQUEST['seleccionarGafas'] == '7' ? 'selected' : ''); ?>>MALIBU BLACK / BLACK</option>
            <option value="8" <?php echo (isset($_REQUEST['seleccionarGafas']) && $_REQUEST['seleccionarGafas'] == '8' ? 'selected' : ''); ?>>ORION III RED GRAD BROWN</option>
        </select>
        <input type="submit" id="buscarGafasSelect" name="buscarGafasSelect" value="Enviar"/>
    </div>
    <?php
    if ($_SESSION['gafasRespuestaSelect'] != '') {
        ?>
        <b>Id: </b><?php echo $_SESSION['gafasRespuestaSelect']['T05_IdGafas']; ?><br>
        <b>Nombre: </b><?php echo $_SESSION['gafasRespuestaSelect']['T05_Name']; ?><br>
        <b>Modelo: </b><?php echo $_SESSION['gafasRespuestaSelect']['T05_Modelo']; ?><br><br>
        <?php
    }
    ?>
</form>
<hr style="border: 0.3px solid white;" class="container">
<div class="container">
    <p>Funciona pidiéndole los datos al servidor, este a su vez le pide los datos a otro servidor donde se encuentra la Api y esta devuelve los datos solicitados, en este caso pasándole el ID de un producto en forma de nombre le devuelve al usuario el ID de estas, su nombre, y si es para hombre, mujer o unisex.</p>
</div>
