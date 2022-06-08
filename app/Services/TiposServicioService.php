<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\TiposServicioRepository;
use App\Models\TiposServicio;
use App\Utilidades\Utilidades;

class TiposServicioService {

    public function buscarTodo() {

        $tiposServicio = new TiposServicioRepository();
        return $tiposServicio -> buscarTodo();
    
    }

    public function buscarPorCodigo(Request $request) {
        
        $tiposServicio = new TiposServicioRepository();
        return $tiposServicio -> buscarPorCodigo($request);
    }

    public function registrar(Request $request) {

        $tiposServicio = new TiposServicio();
        $tiposServicio -> cod_tipos_servicio = $request -> cod_tipos_servicio;
        $tiposServicio -> cod_nombre = $request -> cod_nombre;
        $tiposServicio -> cod_descripcion = $request -> cod_descripcion;
        
        $mensaje = $this -> validateData($tiposServicio);

        $utilidades = new Utilidades();

        if (empty($mensaje)) {
            $tiposServicioRepository = new TiposServicioRepository();
            
            return $utilidades -> datosRespuestaValidation("Registro de datos", $tiposServicioRepository -> registrar($tiposServicio));
            
        } else {
            return $utilidades -> datosRespuestaValidation("Validación de datos", $mensaje);
        }
    }

    public function validateData(TiposServicio $tiposServicio) {

        if (is_null($tiposServicio -> cod_nombre) || empty($tiposServicio -> cod_nombre)) {
            return "Debe ingresar el nombre del tipo de servicio";
        }

        return "";
    }

}