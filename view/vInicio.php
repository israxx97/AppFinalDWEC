<style>
    #calendar {
        font-family:Arial;
        font-size:12px;
    }
    #calendar caption {
        text-align:left;
        padding:5px 10px;
        background-color:#003366;
        color:#fff;
        font-weight:bold;
        font-size:medium;
    }
    #calendar caption div:nth-child(1) {float:left;}
    #calendar caption div:nth-child(2) {float:right;}
    #calendar caption div:nth-child(2) a {cursor:pointer;}
    #calendar th {
        background-color:#006699;
        color:#fff;
        width:40px;
    }
    #calendar td {
        text-align:right;
        padding:2px 5px;
        background-color:silver;
    }
    #calendar .hoy {
        background-color:red;
    }
</style>
<style>
    .outer_face {
        position: relative;
        width: 200px; /* width of clock */
        height: 200px; /* height of clock */
        border-radius: 200px; /* clock round corner radius */
        background: white;
        box-shadow: inset 0 0 10px gray;
        border: 0 solid gray; /* thickness of outer border */
    }

    .outer_face::before, .outer_face::after, .outer_face .marker { /* time markers syle */
        content: "";
        position: absolute;
        width: 8px; /* width of 12-6 and 3-9 markers */
        height: 100%;
        background: black;
        z-index: 0;
        left: 50%;
        margin-left: -4px; /* set this value of 1/2 marker width */
        top: 0
    }

    .outer_face::after {
        -moz-transform: rotate(90deg);
        -ms-transform: rotate(90deg);
        -webkit-transform: rotate(90deg);
        transform: rotate(90deg)
    }

    .outer_face .marker {
        background: gray;
        width: 6px; /* width of all other markers */
        margin-left: -3px /* set this value of 1/2 marker width */
    }

    .outer_face .marker.oneseven {
        -moz-transform: rotate(30deg);
        -ms-transform: rotate(30deg);
        -webkit-transform: rotate(30deg);
        transform: rotate(30deg)
    }

    .outer_face .marker.twoeight {
        -moz-transform: rotate(60deg);
        -ms-transform: rotate(60deg);
        -webkit-transform: rotate(60deg);
        transform: rotate(60deg)
    }

    .outer_face .marker.fourten {
        -moz-transform: rotate(120deg);
        -ms-transform: rotate(120deg);
        -webkit-transform: rotate(120deg);
        transform: rotate(120deg)
    }

    .outer_face .marker.fiveeleven {
        -moz-transform: rotate(150deg);
        -ms-transform: rotate(150deg);
        -webkit-transform: rotate(150deg);
        transform: rotate(150deg)
    }

    .inner_face {
        position: relative;
        width: 88%;
        height: 88%;
        background: white;
        -moz-border-radius: 1000px;
        -webkit-border-radius: 1000px;
        border-radius: 1000px;
        z-index: 1000;
        left: 6%; /* set this value of 1/2 width value*/
        top: 6% /* set this value of 1/2 height value*/
    }

    .inner_face::before {
        /* clock center circle small */
        content: "";
        width: 18px; /* width of inner circle */
        height: 18px; /* height of inner circle */
        border-radius: 18px;
        margin-left: -9px; /* set this value of 1/2 width value*/
        margin-top: -9px; /* set this value of 1/2 height value*/
        background: black;
        position: absolute;
        top: 50%;
        left: 50%;
        box-shadow: 0 0 30px blue;
    }

    .inner_face::after {
        position: absolute;
        width: 100%;
        font: normal 0.8em Arial;
        color: gray;
        text-align: center;
        top: 85%
    }

    .hand, .hand.hour {
        position: absolute;
        width: 4px; /* width of hour hand */
        height: 30%; /* height of hour hand */
        top: 20%; /* set top to 50% - height */
        left: 50%;
        margin-left: -2px; /* set this value to 1/2 width */
        background: black;
        -moz-transform: rotate(0deg);
        -ms-transform: rotate(0deg);
        -webkit-transform: rotate(0deg);
        transform: rotate(0deg);
        -moz-transform-origin: bottom;
        -ms-transform-origin: bottom;
        -webkit-transform-origin: bottom;
        transform-origin: bottom;
        z-index: -1;
        -moz-box-shadow: 0 0 3px gray;
        -webkit-box-shadow: 0 0 3px gray;
        box-shadow: 0 0 3px gray
    }

    .hand.minute {
        height: 45%; /* height of min hand */
        top: 5%; /* set top to 50% - height */
        width: 5px; /* width of min hand */
        margin-left: -2.5px; /* set this value to 1/2 width */
    }

    .hand.second {
        height: 50%; /* height of sec hand */
        width: 2px; /* width of sec hand */
        margin-left: -1px; /* set this value to 1/2 width */
        top: 0;
        background: red
    }
</style>
<link rel="stylesheet" type="text/css" href="webroot/css/vInicioStyles.css">
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <form class="container" name="formInicio" action="<?php echo $_SERVER['PHP_SELF']; ?>" action="POST">
        <ul class="nav nav-pills container">
            <li class="nav-item">
                <input type="submit" id="cerrarSession" style="margin-right: 5px;" class="btn btn-outline-danger" name="cerrarSession" value="Log Out"/>
            </li>
            <li class="nav-item">
                <input type="submit" id="editarPerfil" style="margin-right: 5px;" class="btn btn-outline-info" name="editarPerfil" value="Editar Perfil"/>
            </li>
            <li class="nav-item">
                <input type="submit" id="rest" style="margin-right: 5px;" class="btn btn-outline-info" name="rest" value="REST"/>
            </li>
            <li class="nav-item">
                <input type="submit" id="dom" style="margin-right: 5px;" class="btn btn-outline-warning" name="dom" value="WebSQL"/>
            </li>
        </ul>
    </form>
</nav>
<p class="container"><?php echo $_SESSION['visitas'] ?></p>
<div class="card mb-3 col-lg-4 float-right">
    <h3 class="card-header">El tiempo en <?php echo ucwords(strtolower($_SESSION['estacion']['ubi'])); ?></h3>
    <div class="card-body">
        <p class="card-text"><?php echo '<b>Longitud/latitud: </b>' . $_SESSION['estacion']['lon'] . 'º, ' . $_SESSION['estacion']['lat'] . 'º' ?></p>
        <p class="card-text"><?php echo '<b>Altitud: </b>' . $_SESSION['estacion']['alt'] . 'm' ?></p>
        <p class="card-text"><?php echo '<b>Último dato registrado: </b>' . $_SESSION['estacion']['fint']; ?></p>
        <p class="card-text"><?php echo '<b>Precipitaciones: </b>' . $_SESSION['estacion']['prec'] . 'L/m²' ?></p>
        <p class="card-text"><?php echo '<b>Temperatura mínima: </b>' . $_SESSION['estacion']['tamin'] . 'ºC' ?></p>
        <p class="card-text"><?php echo '<b>Temperatura actual: </b>' . $_SESSION['estacion']['ta'] . 'ºC' ?></p>
        <p class="card-text"><?php echo '<b>Temperatura máxima: </b>' . $_SESSION['estacion']['tamax'] . 'ºC' ?></p>
        <p class="card-text"><?php echo '<b>Velocidad media del viento: </b>' . $_SESSION['estacion']['vv'] . 'm/s' ?></p>
    </div>
    <div class="card-body">
        <table id="calendar">
            <caption></caption>
            <thead>
                <tr>
                    <th>Lun</th>
                    <th>Mar</th>
                    <th>Mie</th>
                    <th>Jue</th>
                    <th>Vie</th>
                    <th>Sab</th>
                    <th>Dom</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    <div class="card-body">
        <div id="liveclock" class="outer_face">
            <div class="marker oneseven"></div>
            <div class="marker twoeight"></div>
            <div class="marker fourten"></div>
            <div class="marker fiveeleven"></div>

            <div class="inner_face">
                <div class="hand hour"></div>
                <div class="hand minute"></div>
                <div class="hand second"></div>
            </div>
        </div>
    </div>
</div>
<div class="album py-5 bg-light col-lg-8 float-left">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-6 shadow-sm">
                    <a href="https://github.com/israxx97/AppFinalDWEC" target="_blank">
                        <div class="redimensionar1"></div>
                    </a>
                    <div class="card-body">
                        <p class="card-text">Git Hub</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-6 shadow-sm">
                    <a href="http://DAW-USGIT.sauces.local/" target="_blank">
                        <div class="redimensionar8"></div>
                    </a>
                    <div class="card-body">
                        <p class="card-text">Git Lab</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-6 shadow-sm">
                    <a href="https://getbootstrap.com/" target="_blank">
                        <div class="redimensionar3"></div>
                    </a>
                    <div class="card-body">
                        <p class="card-text">Bootstrap</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card mb-6 shadow-sm">
                    <a href="https://jquery.com/" target="_blank">
                        <div class="redimensionar4"></div>
                    </a>
                    <div class="card-body">
                        <p class="card-text">jQuery</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-6 shadow-sm">
                    <a href="" target="_blank" onclick="return false">
                        <div class="redimensionar5"></div>
                    </a>
                    <div class="card-body">
                        <p class="card-text">RSS</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-6 shadow-sm">
                    <a href="https://netbeans.apache.org/" target="_blank">
                        <div class="redimensionar6"></div>
                    </a>
                    <div class="card-body">
                        <p class="card-text">NetBeans</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-6 shadow-sm">
                    <a href="https://www.apachefriends.org/es/index.html" target="_blank">
                        <div class="redimensionar7"></div>
                    </a>
                    <div class="card-body">
                        <p class="card-text">XAMPP</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var actual = new Date();
    function mostrarCalendario(year, month)
    {
        var now = new Date(year, month - 1, 1);
        var last = new Date(year, month, 0);
        var primerDiaSemana = (now.getDay() == 0) ? 7 : now.getDay();
        var ultimoDiaMes = last.getDate();
        var dia = 0;
        var resultado = "<tr bgcolor='silver'>";
        var diaActual = 0;
        console.log(ultimoDiaMes);

        var last_cell = primerDiaSemana + ultimoDiaMes;

        // hacemos un bucle hasta 42, que es el máximo de valores que puede
        // haber... 6 columnas de 7 dias
        for (var i = 1; i <= 42; i++)
        {
            if (i == primerDiaSemana)
            {
                // determinamos en que dia empieza
                dia = 1;
            }
            if (i < primerDiaSemana || i >= last_cell)
            {
                // celda vacia
                resultado += "<td>&nbsp;</td>";
            } else {
                // mostramos el dia
                if (dia == actual.getDate() && month == actual.getMonth() + 1 && year == actual.getFullYear())
                    resultado += "<td class='hoy'>" + dia + "</td>";
                else
                    resultado += "<td>" + dia + "</td>";
                dia++;
            }
            if (i % 7 == 0)
            {
                if (dia > ultimoDiaMes)
                    break;
                resultado += "</tr><tr>\n";
            }
        }
        resultado += "</tr>";

        var meses = Array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

        // Calculamos el siguiente mes y año
        nextMonth = month + 1;
        nextYear = year;
        if (month + 1 > 12)
        {
            nextMonth = 1;
            nextYear = year + 1;
        }

        // Calculamos el anterior mes y año
        prevMonth = month - 1;
        prevYear = year;
        if (month - 1 < 1)
        {
            prevMonth = 12;
            prevYear = year - 1;
        }

        document.getElementById("calendar").getElementsByTagName("caption")[0].innerHTML = "<div>" + meses[month - 1] + " / " + year + "</div><div><a onclick='mostrarCalendario(" + prevYear + "," + prevMonth + ")'>&lt;</a> <a onclick='mostrarCalendario(" + nextYear + "," + nextMonth + ")'>&gt;</a></div>";
        document.getElementById("calendar").getElementsByTagName("tbody")[0].innerHTML = resultado;
    }

    mostrarCalendario(actual.getFullYear(), actual.getMonth() + 1);
</script>

<script type="text/javascript">
    var $hands = $('#liveclock div.hand')

    window.requestAnimationFrame = window.requestAnimationFrame
            || window.mozRequestAnimationFrame
            || window.webkitRequestAnimationFrame
            || window.msRequestAnimationFrame
            || function (f) {
                setTimeout(f, 60)
            }


    function updateclock() {
        var curdate = new Date()
        var hour_as_degree = (curdate.getHours() + curdate.getMinutes() / 60) / 12 * 360
        var minute_as_degree = curdate.getMinutes() / 60 * 360
        var second_as_degree = (curdate.getSeconds() + curdate.getMilliseconds() / 1000) / 60 * 360
        $hands.filter('.hour').css({transform: 'rotate(' + hour_as_degree + 'deg)'})
        $hands.filter('.minute').css({transform: 'rotate(' + minute_as_degree + 'deg)'})
        $hands.filter('.second').css({transform: 'rotate(' + second_as_degree + 'deg)'})
        requestAnimationFrame(updateclock)
    }

    requestAnimationFrame(updateclock)
</script>

