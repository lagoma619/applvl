<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\TiposServicioRepository;
use App\Models\TiposServicio;
use App\Utilities\Utilidades;

class TiposServicioService {

    public function buscarTodo() {

        $tiposServicioRepository = new TiposServicioRepository();
        $utilidades = new Utilidades();

        return $utilidades -> datosRespuestaValidation("buscarTodo", $tiposServicioRepository -> buscarTodo());
    
    }

    public function buscarPorCodigo(Request $request) {
        
        $tiposServicioRepository = new TiposServicioRepository();
        $utilidades = new Utilidades();

        return $utilidades -> datosRespuestaValidation("buscarPorCodigo", $tiposServicioRepository -> buscarPorCodigo($request));
    }

    public function registrar(Request $request) {

        $tiposServicio = new TiposServicio();
        $tiposServicio -> nombre = $request -> nombre;
        $tiposServicio -> descripcion = $request -> descripcion;
        
        $mensaje = $this -> validateData($tiposServicio);

        $utilidades = new Utilidades();

        $tiposServicio -> cod_tipo_servicio = $utilidades -> generarCodigo();

        if (empty($mensaje)) {
            $tiposServicioRepository = new TiposServicioRepository();
            
            return $utilidades -> datosRespuestaValidation("Registro de datos", $tiposServicioRepository -> registrar($tiposServicio));
            
        } else {
            return $utilidades -> datosRespuestaValidation("Validación de datos", $mensaje);
        }
    }

    public function validateData(TiposServicio $tiposServicio) {

        if (is_null($tiposServicio -> nombre) || empty($tiposServicio -> nombre)) {
            return "Debe ingresar el nombre del tipo de servicio";
        }

        return "";
    }

}