<?php

class Errores {

    private $codError;
    private $mensajeError;
    private $fechaHoraError;
    private $ficheroError;
    private $lineaError;

    function __construct($codError, $mensajeError, $fechaHoraError, $ficheroError, $lineaError) {
        $this->codError = $codError;
        $this->mensajeError = $mensajeError;
        $this->fechaHoraError = $fechaHoraError;
        $this->ficheroError = $ficheroError;
        $this->lineaError = $lineaError;
    }

    public function getCodError() {
        return $this->codError;
    }

    public function setCodError($codError) {
        $this->codError = $codError;
    }

    public function getMensajeError() {
        return $this->mensajeError;
    }

    public function setMensajeError($mensajeError) {
        $this->mensajeError = $mensajeError;
    }

    public function getFechaHoraError() {
        return $this->fechaHoraError;
    }

    public function setFechaHoraError($fechaHoraError) {
        $this->fechaHoraError = $fechaHoraError;
    }

    public function getFicheroError() {
        return $this->ficheroError;
    }

    public function setFicheroError($ficheroError) {
        $this->ficheroError = $ficheroError;
    }

    public function getLineaError() {
        return $this->lineaError;
    }

    public function setLineaError($lineaError) {
        $this->lineaError = $lineaError;
    }

    public static function anadirError($codError, $mensajeError, $ficheroError, $lineaError) {
        setlocale(LC_TIME, 'es_ES.UTF-8');
        date_default_timezone_set('Europe/Madrid');
        $fecha = date('d-m-Y, H:i:s');
        $archivo = 'tmp/errores.txt';
        $file = fopen($archivo, 'a');
        fwrite($file, "Fecha del error: " . $fecha . "\n" . "Fichero del error: " . $ficheroError . "\n" . "Linea del error: " . $lineaError . "\n" . "Código del error: " . $codError . "\n" . "Mensaje del error: " . $mensajeError . "\n\r");
    }

}
