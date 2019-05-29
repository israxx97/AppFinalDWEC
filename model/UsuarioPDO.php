<?php

require_once 'DBPDO.php';
require_once 'UsuarioDB.php'; // Si no se incluye, da error al hacer el implements UsuarioDB

/**
 * UsuarioPDO.php
 * 
 * Clase que contiene las funciones que implementa de la interface
 * UsuarioDB, y que se encargan de ejecutar los querys que recogerán
 * la información de la base de datos.
 * 
 * @author Israel García <isragarcia97@gmail.com>
 * @since 25/04/2019
 * @version v.1
 */
class UsuarioPDO implements UsuarioDB {

    /**
     * validarUsuario($codUsuario, $password)
     * 
     * Función estática que busca en la base de datos si existe un usuario que 
     * coincida con el código y la contraseña.
     * 
     * @author Israel García <isragarcia97@gmail.com>
     * @since 25/04/2019
     * @version v.1
     * @param type $codUsuario
     * @param type $password
     * @return type $a_usuario
     */
    public static function validarUsuario($codUsuario, $password) {
        $a_usuario = [];
        $sql = 'SELECT * FROM T01_Usuarios WHERE T01_CodUsuario = ? AND T01_Password = SHA2(?, 256)';
        $statement = DBPDO::ejecutaConsulta($sql, [$codUsuario, $password]);

        if ($statement->rowCount() == 1) {
            $resultado = $statement->fetchObject();
            $a_usuario['T01_CodUsuario'] = $resultado->T01_CodUsuario;
            $a_usuario['T01_Password'] = $resultado->T01_Password;
            $a_usuario['T01_DescUsuario'] = $resultado->T01_DescUsuario;
            $a_usuario['T01_NumAccesos'] = $resultado->T01_NumAccesos;
            $a_usuario['T01_FechaHoraUltimaConexion'] = $resultado->T01_FechaHoraUltimaConexion;
            $a_usuario['T01_Perfil'] = $resultado->T01_Perfil;
        }
        return $a_usuario;
    }

    /**
     * altaUsuario($codUsuario, $password, $descUsuario)
     * 
     * Función estática que inserta en la base de datos una nueva tupla con los datos
     * de un nuevo usuario.
     * 
     * @author Israel García <isragarcia97@gmail.com>
     * @since 25/04/2019
     * @version v.1
     * @param type $codUsuario
     * @param type $password
     * @param type $descUsuario
     * @return type $a_usuario
     */
    public static function altaUsuario($codUsuario, $password, $descUsuario) {
        $a_usuario = [];
        $fecha = new DateTime();
        $sql = "INSERT INTO T01_Usuarios (T01_CodUsuario, T01_Password, T01_DescUsuario, T01_FechaHoraUltimaConexion, T01_NumAccesos, T01_Perfil, T01_ImagenUsuario) VALUES (?, SHA2(?, 256), ?, ?, 0, 'usuario', NULL)";
        $statement = DBPDO::ejecutaConsulta($sql, [$codUsuario, $password, $descUsuario, $fecha->getTimestamp()]);

        if ($statement->rowCount() == 1) {
            $a_usuario['T01_CodUsuario'] = $codUsuario;
            $a_usuario['T01_Password'] = $password;
            $a_usuario['T01_DescUsuario'] = $descUsuario;
            $a_usuario['T01_FechaHoraUltimaConexion'] = $fecha->getTimestamp();
            $a_usuario['T01_Perfil'] = 'usuario';
            $a_usuario['T01_ImagenUsuario'] = 'NULL';
        }
        return $a_usuario;
    }

    /**
     * modificarUsuario($codUsuario, $password, $descUsuario)
     * 
     * Función que se utiliza para modificar la descripción, o la contraseña en la base
     * de datos.
     * 
     * @author Israel García <isragarcia97@gmail.com>
     * @since 25/04/2019
     * @version v.1
     * @param type $codUsuario
     * @param type $password
     * @param type $descUsuario
     * @return type
     */
    public function modificarUsuario($codUsuario, $password, $descUsuario) {
        $a_usuario = [];

        if ($descUsuario == null) {
            $sql = 'UPDATE T01_Usuarios SET T01_Password = SHA2(?) WHERE T01_CodUsuario = ?';
            $statement = DBPDO::ejecutaConsulta($sql, [$password, $codUsuario]);
        } else {
            $sql = 'UPDATE T01_Usuarios SET T01_DescUsuario = ? WHERE T01_CodUsuario = ?';
            $statement = DBPDO::ejecutaConsulta($sql, [$descUsuario, $codUsuario]);
        }

        if ($statement->rowCount() == 1) {
            $sql = 'SELECT * FROM T01_Usuarios WHERE T01_CodUsuario = ?';
            $statement = DBPDO::ejecutaConsulta($sql, [$codUsuario]);

            if ($statement->rowCount() == 1) {
                $resultado = $statement->fetchObject();
                $a_usuario['T01_CodUsuario'] = $resultado->T01_CodUsuario;
                $a_usuario['T01_Password'] = $resultado->T01_Password;
                $a_usuario['T01_DescUsuario'] = $resultado->T01_DescUsuario;
                $a_usuario['T01_NumAccesos'] = $resultado->T01_NumAccesos;
                $a_usuario['T01_FechaHoraUltimaConexion'] = $resultado->T01_FechaHoraUltimaConexion;
                $a_usuario['T01_Perfil'] = $resultado->T01_Perfil;
            }
        }
        return $a_usuario;
    }

    public function modificarCuenta($codUsuario, $password, $descUsuario, $perfil) {
        
    }

    /**
     * borrarUsuario($codUsuario)
     * 
     * Función que borra la tupla que contenga como clave primaria el código de usuario 
     * que reciba.
     * 
     * @author Israel García <isragarcia97@gmail.com>
     * @since 25/04/2019
     * @version v.1
     * @param type $codUsuario
     * @return boolean
     */
    public function borrarUsuario($codUsuario) {
        $borrado = false;
        $sql = 'DELETE FROM T01_Usuarios WHERE T01_CodUsuario = ?';
        $statement = DBPDO::ejecutaConsulta($sql, [$codUsuario]);
        if ($statement->rowCount() == 1) {
            $borrado = true;
        }
        return $borrado;
    }

    /**
     * registrarUltimaConexion($codUsuario)
     * 
     * Función que suma 1 y modifica la fecha y hora de la última conexión del usuario
     * con el que nos hayamos logueado, por lo tanto, que coincida con el código de 
     * usuario.
     *  
     * @author Israel García <isragarcia97@gmail.com>
     * @since 25/04/2019
     * @version v.1
     * @param type $codUsuario
     * @return typtype
     */
    public function registrarUltimaConexion($codUsuario) {
        $a_fechaAccesos = [];
        $fecha = new DateTime();
        $sql = 'SELECT * FROM T01_Usuarios WHERE T01_CodUsuario = ?';
        $statement = DBPDO::ejecutaConsulta($sql, [$codUsuario]);

        if ($statement->rowCount() == 1) {
            $resultado = $statement->fetchObject();
            $a_fechaAccesos['T01_NumAcceos'] = $resultado->T01_NumAccesos;
            $a_fechaAccesos['T01_FechaHoraUltimaConexion'] = $resultado->T01_FechaHoraUltimaConexion;
            $a_fechaAccesos['T01_DescUsuario'] = $resultado->T01_DescUsuario;
        }
        $sql1 = 'UPDATE T01_Usuarios SET T01_NumAccesos = T01_NumAccesos + 1, T01_FechaHoraUltimaConexion = ? WHERE T01_CodUsuario = ?';
        $statement1 = DBPDO::ejecutaConsulta($sql1, [$fecha->getTimestamp(), $codUsuario]);
        return $a_fechaAccesos;
    }

    /**
     * validarCodNoExiste($codUsuario)
     * 
     * Función estática que usaremos para buscar en la base de datos si existe ya
     * un usuario con un código determinado a la hora de registrarnos en la página.
     * 
     * @author Israel García <isragarcia97@gmail.com>
     * @since 25/04/2019
     * @version v.1
     * @param type $codUsuario
     * @return boolean
     */
    public static function validarCodNoExiste($codUsuario) {
        $existe = false;
        $sql = 'SELECT * FROM T01_Usuarios WHERE T01_CodUsuario = ?';
        $statement = DBPDO::ejecutaConsulta($sql, [$codUsuario]);

        if ($statement->rowCount() == 1) {
            $existe = true;
        }
        return $existe;
    }

    public static function buscaUsuariosPorDesc($codUsuario) {
        
    }

    public static function buscaUsuariosPorDescripcion($descUsuario, $pagina, $registrosPagina) {
        
    }

    public static function contarUsuariosPorDesc($descUsuario) {
        
    }

    public function creaOpinion() {
        
    }

    public function modificaOpinion() {
        
    }

    public function borraOpinion() {
        
    }

}
