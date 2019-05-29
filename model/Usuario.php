<?php

require_once 'UsuarioPDO.php';

/**
 * Usuario.php
 * 
 * Clase que contiene los getter y setter y las funciones que usarán las funciones
 * de UsuarioPDO.php.
 * 
 * @author Israel García <isragarcia97@gmail.com>
 * @since 25/04/2019
 * @version v.1
 */
class Usuario {

    /**
     * @var type $codUsuario
     */
    private $codUsuario;

    /**
     * @var type $password
     */
    private $password;

    /**
     * @var type $descUsuario
     */
    private $descUsuario;

    /**
     * @var type $numAccesos
     */
    private $numAccesos;

    /**
     * @var type $fechaHoraUltimaConexion
     */
    private $fechaHoraUltimaConexion;

    /**
     * @var type $perfil
     */
    private $perfil;

    /**
     * @var type $listaOpinionesUsuario
     */
    private $listaOpinionesUsuario;

    /**
     * __construct($codUsuario, $password, $descUsuario, $numAccesos, $fechaHoraUltimaConexion, $perfil)
     * 
     * Función del constructor usado para crear un nuevo objeto de esta clase.
     * 
     * @param type $codUsuario
     * @param type $password
     * @param type $descUsuario
     * @param type $numAccesos
     * @param type $fechaHoraUltimaConexion
     * @param type $perfil
     */
    public function __construct($codUsuario, $password, $descUsuario, $numAccesos, $fechaHoraUltimaConexion, $perfil) {
        $this->codUsuario = $codUsuario;
        $this->password = $password;
        $this->descUsuario = $descUsuario;
        $this->numAccesos = $numAccesos;
        $this->fechaHoraUltimaConexion = $fechaHoraUltimaConexion;
        $this->perfil = $perfil;
    }

    /**
     * getCodUsuario()
     * 
     * Función que recoge el valor de $codUsuario y puede ser usado fuera de 
     * la clase Usuario.php.
     * 
     * @return type $codUsuario
     */
    public function getCodUsuario() {
        return $this->codUsuario;
    }

    /**
     * setCodUsuario($codUsuario)
     * 
     * Función que modifica el valor de $codUsuario y puede ser usado puera
     * de la clase Usuario.php.
     * 
     * @param type $codUsuario
     */
    public function setCodUsuario($codUsuario) {
        $this->codUsuario = $codUsuario;
    }

    /**
     * getPassword()
     * 
     * Función que recoge el valor de $password y puede ser usado fuera de 
     * la clase Usuario.php.
     * 
     * @return type $password
     */
    public function getPassword() {
        return $this->password;
    }

    /**
     * setPassword($password)
     * 
     * Función que modifica el valor de $password y puede ser usado puera
     * de la clase Usuario.php.
     * 
     * @param type $password
     */
    public function setPassword($password) {
        $this->password = $password;
    }

    /**
     * getDescUsuario()
     * 
     * Función que recoge el valor de $descUsuario y puede ser usado fuera de 
     * la clase Usuario.php.
     * 
     * @return type $descUsuario
     */
    public function getDescUsuario() {
        return $this->descUsuario;
    }

    /**
     * setDescUsuario($descUsuario)
     * 
     * Función que modifica el valor de $descUsuario y puede ser usado puera
     * de la clase Usuario.php.
     * 
     * @param type $descUsuario
     */
    public function setDescUsuario($descUsuario) {
        $this->descUsuario = $descUsuario;
    }

    /**
     * getNumAccesos()
     * 
     * Función que recoge el valor de $numAccesos y puede ser usado fuera de 
     * la clase Usuario.php.
     * 
     * @return type $numAccesos
     */
    public function getNumAccesos() {
        return $this->numAccesos;
    }

    /**
     * setNumAccesos($numAccesos)
     * 
     * Función que modifica el valor de $numAccesos y puede ser usado puera
     * de la clase Usuario.php.
     * 
     * @param type $numAccesos
     */
    public function setNumAccesos($numAccesos) {
        $this->numAccesos = $numAccesos;
    }

    /**
     * getFechaHoraUltimaConexion()
     * 
     * Función que recoge el valor de $fechaHoraUltimaConexion y puede ser usado fuera de 
     * la clase Usuario.php.
     * 
     * @return type $fechaHoraUltimaConexion
     */
    public function getFechaHoraUltimaConexion() {
        return $this->fechaHoraUltimaConexion;
    }

    /**
     * setFechaHoraUltimaConexion($fechaHoraUltimaConexion
     * 
     * Función que modifica el valor de $fechaHoraUltimaConexion y puede ser usado puera
     * de la clase Usuario.php.
     * 
     * @param type $fechaHoraUltimaConexion
     */
    public function setFechaHoraUltimaConexion($fechaHoraUltimaConexion) {
        $this->fechaHoraUltimaConexion = $fechaHoraUltimaConexion;
    }

    /**
     * getPerfil()
     * 
     * Función que recoge el valor de $perfil y puede ser usado fuera de 
     * la clase Usuario.php.
     * 
     * @return type $perfil
     */
    public function getPerfil() {
        return $this->perfil;
    }

    /**
     * setPerfil($perfil)
     * 
     * Función que modifica el valor de $perfil y puede ser usado puera
     * de la clase Usuario.php.
     * 
     * @param type $perfil
     */
    public function setPerfil($perfil) {
        $this->perfil = $perfil;
    }

    /**
     * getListaOpinionesUsuario()
     * 
     * Función que recoge el valor de $listaOpinionesUsuario y puede ser usado fuera de 
     * la clase Usuario.php.
     * 
     * @return type $listaOpinionesUsuario
     */
    public function getListaOpinionesUsuario() {
        return $this->listaOpinionesUsuario;
    }

    /**
     * setListaOpinionesUsuario($listaOpinionesUsuario)
     * 
     * Función que modifica el valor de $listaOpinionesUsuario y puede ser usado puera
     * de la clase Usuario.php.
     * 
     * @param type $listaOpinionesUsuario
     */
    public function setListaOpinionesUsuario($listaOpinionesUsuario) {
        $this->listaOpinionesUsuario = $listaOpinionesUsuario;
    }

    /**
     * validarUsuario($codUsuario, $password)
     * 
     * Usa la función validarUsuario de la clase UsuarioPDO.php para rellenar o no el array,
     * si el array no está vacio después de validar el usuario en UsuarioPDO.php, crea el objeto
     * $usuario de tipo Usuario con los campos.
     * 
     * @param type $codUsuario
     * @param type $password
     * @return \Usuario
     */
    public static function validarUsuario($codUsuario, $password) {
        $usuario = null;
        $a_usuario = UsuarioPDO::validarUsuario($codUsuario, $password);
        if (!empty($a_usuario)) {
            $usuario = new Usuario($codUsuario, $password, $a_usuario['T01_DescUsuario'], $a_usuario['T01_NumAccesos'], $a_usuario['T01_FechaHoraUltimaConexion'], $a_usuario['T01_Perfil']);
        }
        return $usuario;
    }

    /**
     * altaUsuario($codUsuario, $password, $descUsuario)
     * 
     * Usa la función altaUsuario de la clase UsuarioPDO.php para rellenar o no el array,
     * si el array no está vacío despúes de validar el usuario en UsuarioPDO.php
     * 
     * @param type $codUsuario
     * @param type $password
     * @param type $descUsuario
     * @return \Usuario
     */
    public static function altaUsuario($codUsuario, $password, $descUsuario) {
        $usuario = null;
        $a_usuario = UsuarioPDO::altaUsuario($codUsuario, $password, $descUsuario);
        if (!empty($a_usuario)) {
            $usuario = new Usuario($codUsuario, $password, $descUsuario, $a_usuario['T01_NumAccesos'], $a_usuario['T01_FechaHoraUltimaConexion'], $a_usuario['T01_Perfil']);
        }
        return $usuario;
    }

    public function modificarUsuario($password, $descUsuario, $perfil) {
        $codUsuario = $this->getCodUsuario();
        $usuario = null;
        if ($perfil == null) {
            $a_usuario = UsuarioPDO::modificarUsuario($codUsuario, $password, $descUsuario);
        } else {
            $a_usuario = UsuarioPDO::modificarCuenta($codUsuario, $password, $descUsuario, $perfil);
        }

        if (!empty($a_usuario)) {
            $usuario = new Usuario($a_usuario['T01_CodUsuario'], $a_usuario['T01_Password'], $a_usuario['T01_DescUsuario'], $a_usuario['T01_NumAccesos'], $a_usuario['T01_FechaHoraUltimaConexion'], $a_usuario['T01_Perfil']);
        }
        return $usuario;
    }

    public function borrarUsuario() {
        $codUsuario = $this->getCodUsuario();
        $borrado = UsuarioPDO::borrarUsuario($codUsuario);
        return $borrado;
    }

    public function registrarUltimaConexion() {
        setlocale(LC_TIME, 'es_ES.UTF-8');
        date_default_timezone_set('Europe/Madrid');
        $codUsuario = $this->getCodUsuario();
        $a_fechaAccesos = UsuarioPDO::registrarUltimaConexion($codUsuario);
        $fecha = date('d-m-Y, H:i:s', $a_fechaAccesos['T01_FechaHoraUltimaConexion']);
        $numAccesos = $a_fechaAccesos['T01_NumAccesos'];

        if ($this->getNumAccesos() == 0) {
            $ultimaConexion = 'Bienvenid@ por primera vez, ' . $this->getDescUsuario() . '.';
        } else {
            $ultimaConexion = 'Hola de nuevo ' . $this->getDescUsuario() . ', número de visitas anteriores ' . $this->getNumAccesos() . '.<br>Última vez ' . $fecha . '.';
        }
        return $ultimaConexion;
    }

    public static function validarCodNoExiste($codUsuario) {
        $existe = UsuarioPDO::validarCodNoExiste($codUsuario);
        return $existe;
    }

    public static function buscaUsuariosPorDesc($descUsuario, $pagina, $registrosPagina) {
        
    }

    public function creaOpinion() {
        
    }

    public function modificaOpinion() {
        
    }

    public function borraOpinion() {
        
    }

    public static function buscaUsuariosPorCodigo($codUsuario) {
        
    }

    public static function contarUsuariosPorDesc($descUsuario) {
        
    }

}
