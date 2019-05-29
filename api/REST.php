<?php

require_once 'model/RestPDO.php';

class REST {
    /*
     * FUNCIONES RELACIONADAS CON LA API PROPIA.
     */

    public static function getGafasPorId($idGafas) {
        /*
         * Para el servidor de casa en raíz.
         */
        // $gafasJson = file_get_contents('http://192.168.3.140/ApiREST/gafas/' . $idGafas);
        /*
         * Para el XAMPP en raíz.
         */
        // $gafasJson = file_get_contents('http://localhost/ApiREST/gafas/' . $idGafas);
        /*
         * Para clase en raíz.
         */
        $gafasJson = file_get_contents('http://192.168.20.19/DAW202/public_html/ApiREST/gafas/' . $idGafas);
        /*
         * Para hacerlo en esta aplicación.
         */
        // $gafasJson = file_get_contents('http://localhost/index_03/index/ProyectoDWES/ProyectoTema06/codigoPHP/AplicacionFinalMVC/' . $idGafas);
        $gafas = json_decode($gafasJson, true);

        return $gafas;
    }

    /*
     * FUNCIONES RELACIONADAS CON LA API AJENA DE CERVEZAS.
     */

    public static function buscarCristalPorId($idGlass) {
        $key = 'cb97c4b2998ecfc7c7d7b73082001331';
        $cristalJson = file_get_contents('https://sandbox-api.brewerydb.com/v2/glass/' . $idGlass . '/?key=' . $key);
        $cristales = json_decode($cristalJson, true);

        if ($cristales['data']['id'] == null) {
            $respuesta = 'No existen datos con ese id.';
        } else {
            $respuesta = "<b>Id: </b>" . $cristales['data']['id'] . "<br>" .
                    "<b>Name: </b>" . $cristales['data']['name'] . "<br>" .
                    "<b>Fecha de creación: </b>" . $cristales['data']['createDate'];
        }
        return $respuesta;
    }

    /*
     * FUNCIONES RELACIONADAS CON LA API AJENA DE AEMET.
     */

    public static function buscarCristalPorNombre($idGlass) {
        $key = 'cb97c4b2998ecfc7c7d7b73082001331';
        $cristalJson = file_get_contents('https://sandbox-api.brewerydb.com/v2/glass/' . $idGlass . '/?key=' . $key);
        $cristales = json_decode($cristalJson, true);

        $respuesta = "<b>Id: </b>" . $cristales['data']['id'] . "<br>" .
                "<b>Name: </b>" . $cristales['data']['name'] . "<br>" .
                "<b>Fecha de creación: </b>" . $cristales['data']['createDate'];

        return $respuesta;
    }

    public static function datosDelTiempo($estacion) {
        $key = 'eyJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJpc3JhZ2FyY2lhOTdAZ21haWwuY29tIiwianRpIjoiNjYwMTRhYjAtMDBiYi00NTNiLTk2MWEtNjQ0ODVhMzViOGE0IiwiaXNzIjoiQUVNRVQiLCJpYXQiOjE1NTczMTA1NjMsInVzZXJJZCI6IjY2MDE0YWIwLTAwYmItNDUzYi05NjFhLTY0NDg1YTM1YjhhNCIsInJvbGUiOiIifQ.UjU0Dw1Qz32Q_zSPHVefr1tsCct_4BKGz7rKj088_8s';
        $estacionJson = file_get_contents('https://opendata.aemet.es/opendata/api/observacion/convencional/datos/estacion/' . $estacion . '/?api_key=' . $key);
        $estaciones = json_decode($estacionJson, true);

        $estacionJson2 = file_get_contents($estaciones['datos']);
        $datos = json_decode($estacionJson2, true);

        $aux = count($datos);

        return $datos[$aux - 1];
    }

}
