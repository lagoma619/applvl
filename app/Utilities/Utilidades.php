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

    public function generarCodigo() {

        $fecha = date("d-m-Y (H:i:s)", time());
        $consecutivo = str_replace("-", "", $fecha);
        $consecutivo = str_replace(" ", "", $consecutivo);
        $consecutivo = str_replace("(", "", $consecutivo);
        $consecutivo = str_replace(")", "", $consecutivo);
        $consecutivo = str_replace(":", "", $consecutivo);

        return $consecutivo;
        
    }

}