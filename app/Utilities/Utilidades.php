<?php 

namespace App\Utilities;

use App\Utilities\DatosRespuesta;

class Utilidades {


    public function datosRespuestaValidation($tipoValidacion, $mensaje) {

        $datosRespuesta = new DatosRespuesta();
        $datosRespuesta -> setTipoMensaje($tipoValidacion);
        $datosRespuesta -> setMensaje($mensaje);

        return $datosRespuesta;

    }

}