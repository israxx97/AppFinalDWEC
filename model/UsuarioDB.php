<?php

interface UsuarioDB {

    public static function validarUsuario($codUsuario, $password);

    public static function altaUsuario($codUsuario, $password, $descUsuario);

    public function modificarUsuario($codUsuario, $password, $descUsuario);

    public function registrarUltimaConexion($codUsuario);

    public static function validarCodNoExiste($codUsuario);

    public static function buscaUsuariosPorDesc($descUsuario);

    public function creaOpinion();

    public function modificaOpinion();

    public function borraOpinion();
}
