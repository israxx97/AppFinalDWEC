<link rel="stylesheet" type="text/css" href="webroot/css/vMiCuentaStyles.css">
<script type="text/javascript">
    /* $(document).ready(function () {
     var usuario;
     var password;
     
     usuario = prompt('Introduce un usuario.');
     password = prompt('Introduce una password.');
     
     alert('Usuario y contraseña guardados en Session Storage.');
     window.open('index.php');
     sessionStorage.setItem(usuario, password);
     }); */

    function validarCodigo() {
        var codigoDepartamento;
        var auxCodigo;
        var patternCodigo = /^[a-zA-Z]{3}$/g;
        var enviar = false;
        codigoDepartamento = document.getElementById('codigoDepartamento').value;
        auxCodigo = patternCodigo.test(String(codigoDepartamento));

        if (auxCodigo === true) {
            enviar = true;
        }
        return enviar;
    }

    function validarNombre() {
        var nombreDepartamento;
        var auxNombre;
        var patternNombre = /^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{3,48}$/g;
        var enviar = false;
        nombreDepartamento = document.getElementById('nombreDepartamento').value;
        auxNombre = patternNombre.test(String(nombreDepartamento));

        if (auxNombre === true) {
            enviar = true;
        }
        return enviar;
    }

    function validarVolumen() {
        var volumenNegocio;
        var auxVolumen;
        var patternVolumen = /^[0-9]{1,10}$/g;
        var enviar = false;
        volumenNegocio = document.getElementById('volumenNegocio').value;
        auxVolumen = patternVolumen.test(String(volumenNegocio));

        if (auxVolumen === true) {
            enviar = true;
        }
        return enviar;
    }

    function validarCampos() {
        var enviar = false;

        if (validarCodigo() == true && validarNombre() == true && validarVolumen() == true) {
            enviar = true;
            $('#enviar').attr('type', 'submit');

        } else {
            console.log('Incorrecto.');
        }

        if (validarCodigo() == false) {
            $('#errorCodigo').text('Código no válido.');
        } else {
            $('#errorCodigo').text('');
        }

        if (validarNombre() == false) {
            $('#errorNombre').text('Nombre no válido.');
        } else {
            $('#errorNombre').text('');
        }

        if (validarVolumen() == false) {
            $('#errorVolumen').text('Volumen no válido.');
        } else {
            $('#errorVolumen').text('');
        }
        return enviar;
    }

    var db;
    db = openDatabase('Departamentos', '0.1', 'Mantenimiento de departametos', 2 * 1024 * 1024);

    if (db) {
        db.transaction(function (transaction) {
            transaction.executeSql('CREATE TABLE IF NOT EXISTS T01_Departamentos(codDepartamento text, nombreDepartamento text, volumenNegocio text)');
        });
    }

    function insertarDepartamento(codDepartamento, nombreDepartamento, volumenNegocio) {
        if (validarCampos() == true) {
            db.transaction(function (transaction) {
                transaction.executeSql('INSERT INTO T01_Departamentos VALUES(?, ?, ?)', [codDepartamento, nombreDepartamento, volumenNegocio]);
            });
        }
    }

    function limpiarTodo(tabla) {
        db.transaction(function (transaction) {
            transaction.executeSql('DELETE FROM T01_Departamentos WHERE 1', [], tabla);
        });
    }

    $(document).ready(function () {
        // CÓDIGO
        $('#codigoDepartamento').mouseover(function () {
            var generarDialogo = document.getElementById("dialogoUno");
            generarDialogo.innerHTML += "<dialog open>Necesarias 3 letras.</dialog>";
            $('#dialogoUno').css('display', '');
        });

        $('#codigoDepartamento').mouseout(function () {
            $('#dialogoUno').css('display', 'none');
        });

        // NOMBRE
        $('#nombreDepartamento').mouseover(function () {
            var generarDialogo = document.getElementById("dialogoDos");
            generarDialogo.innerHTML += "<dialog open>Necesarias de 3 a 48 letras.</dialog>";
            $('#dialogoDos').css('display', '');
        });

        $('#nombreDepartamento').mouseout(function () {
            $('#dialogoDos').css('display', 'none');
        });

        // VOLUMEN
        $('#volumenNegocio').mouseover(function () {
            var generarDialogo = document.getElementById("dialogoTres");
            generarDialogo.innerHTML += "<dialog open>Necesario entero de 1 a 10 cifras.</dialog>";
            $('#dialogoTres').css('display', '');
        });

        $('#volumenNegocio').mouseout(function () {
            $('#dialogoTres').css('display', 'none');
        });

        $('#limpiar').click(function () {
            if (confirm('Todos los campos serán borrados, ¿Estás segur@ de querer hacerlo?')) {
                limpiarTodo();
                $('#limpiar').attr('type', 'submit');
                alert('Se han eliminado los registros.');
            } else {
                alert('No se han eliminado los registros.');
            }
        });

        // DIALOG.
        setTimeout(function () {
            var generarRSS = document.getElementById("generarRSS");
            generarRSS.innerHTML += "<dialog open>Nuevos productos en <a href='https://www.asus.com/es/' target='_blank'>asus</a>.</dialog>";
        }, 2000);

        $('#generarRSS').click(function () {
            $('#generarRSS').css('display', 'none');
        });
    });
</script>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <!-- <a class="navbar-brand" href="#" onclick="return false">Ventana de usuario</a> -->
    <form class="container" name="formDom" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <input type="submit" style="margin-right: 5px;" class="btn btn-outline-danger" name="cancelar" value="Volver">
    </form>
</nav>
<div id="contenedorForm" class="container">
    <p class="h2 text-center">WebSQL + Pattern</p>
    <form name="formDom" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <div class="preview text-left">
            <div class="form-group">
                <label for="codigoDepartamento">Código del departamento: </label>
                <input class="form-control" type="text" name="codigoDepartamento" id="codigoDepartamento" onclick="mostrarDialogoCodigo()"/>
            </div>
            <!-- DIÁLOGO CÓDIGO -->
            <div id="dialogoUno" class="form-group"></div>

            <div style="color: rgb(255, 0, 0);" class="form-group" id="errorCodigo"></div>
            <div class="form-group">
                <label for="nombreDepartamento">Nombre del departamento: </label>
                <input class="form-control" type="text" name="nombreDepartamento" id="nombreDepartamento"/>
            </div>
            <!-- DIÁLOGO NOMBRE -->
            <div id="dialogoDos" class="form-group"></div>

            <div style="color: rgb(255, 0, 0);" class="form-group" id="errorNombre"></div>
            <div class="form-group">
                <label for="volumenNegocio">Volumen de negocio: </label>
                <input class="form-control" type="text" name="volumenNegocio" id="volumenNegocio"/>
            </div>
            <!-- DIÁLOGO VOLUMEN -->
            <div id="dialogoTres" class="form-group"></div>

            <div style="color: rgb(255, 0, 0);" class="form-group" id="errorVolumen"></div>
            <div style="color: rgb(255, 0, 0);" class="form-group" id="yaExiste"></div>
            <div class="form-group">
                <input class="btn btn-primary btn-block" type="button" name="enviar" id="enviar" value="Enviar" onclick="insertarDepartamento(codigoDepartamento.value, nombreDepartamento.value, volumenNegocio.value)">
                <input class="btn btn-danger btn-block" type="button" name="limpiar" id="limpiar" value="Limpiar todos los datos">
            </div>
        </div>
    </form>
</div>
<div id="generarRSS" style="position: absolute; bottom: 120px; right: 50px; width: 300px;"></div>
