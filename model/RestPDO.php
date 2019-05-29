<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'model/DBPDO.php';
require_once 'model/RestDB.php';

/**
 * Description of RestPDO
 *
 * @author israel
 */
class RestPDO implements RestDB {

    public static function getGafasPorId($idGafas) {
        $a_gafas = [];
        $sql = 'SELECT * FROM T05_Gafas WHERE T05_IdGafas = ?';
        $statement = DBPDO::ejecutaConsulta($sql, [$idGafas]);

        if ($statement->rowCount() != 0) {
            $resultado = $statement->fetchObject();
            $a_gafas['T05_IdGafas'] = $resultado->T05_IdGafas;
            $a_gafas['T05_Name'] = $resultado->T05_Name;
            $a_gafas['T05_Modelo'] = $resultado->T05_Modelo;
        }
        return $a_gafas;
    }

    public static function getGafas() {
        $a_gafa = [];
        $a_gafas = [];
        $contador = 0;
        $sql = 'SELECT * FROM T05_Gafas';
        $statement = DBPDO::ejecutaConsulta($sql, []);

        if ($statement->rowCount() != 0) {
            while ($resultado = $statement->fetchObject()) {
                $a_gafas['T05_IdGafas'] = $resultado->T05_IdGafas;
                $a_gafas['T05_Name'] = $resultado->T05_Name;
                $a_gafas['T05_Modelo'] = $resultado->T05_Modelo;
                $a_gafa[$contador] = $a_gafas;
                $contador++;
            }
        }

        return $a_gafa;
    }

}
