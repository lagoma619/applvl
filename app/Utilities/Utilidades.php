<?php 

namespace App\Utilidades;

class Utilidades {


    public function datosRespuestaValidation($tipoValidacion, $mensaje) {

        $datosRespuesta = new DatosRespuesta();
        $datosRespuesta -> setTipoMensaje($tipoValidacion);
        $datosRespuesta -> setMensaje($mensaje);

        return $datosRespuesta;

    }

}