<?php

require_once 'config/configDB_ED.php';
require_once 'model/Errores.php';

abstract class DBPDO {

    public static function ejecutaConsulta($sentenciaSQL, $parametros) {
        try {
            $miDB = new PDO(HOST_DB_ED, USER_DB_ED, PASS_DB_ED);
            $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $statement = $miDB->prepare($sentenciaSQL);
            $statement->execute($parametros);
        } catch (PDOException $pdoe) {
            $statement = null;
            Errores::anadirError($pdoe->getCode(), $pdoe->getMessage(), $pdoe->getFile(), $pdoe->getLine());
            $_SESSION['pagina'] = 'error';
            header('Location: index.php');
        } finally {
            unset($miDB);
        }
        return $statement;
    }

}
