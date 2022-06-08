<?php 

namespace App\Utilidades;

class DatosRespuesta {

    public $tipoMensaje;
    public $mensaje;

    public function getTipoMensaje() {
        return $this -> tipoMensaje;
    }

    public function setTipoMensaje($tipoMensaje) {
        $this -> tipoMensaje = $tipoMensaje;
    }
    
    public function getMensaje() {
        return $this -> mensaje;
    }

    public function setMensaje($mensaje) {
        $this -> mensaje = $mensaje;
    }

}

