<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\TiposVehiculoRepository;
use App\Models\TiposVehiculo;
use App\Utilities\Utilidades;

class TiposVehiculoService {

    public function buscarTodo() {

        $tiposVehiculoRepository = new TiposVehiculoRepository();
        $utilidades = new Utilidades();

        return $utilidades -> datosRespuestaValidation("buscarTodo", $tiposVehiculoRepository -> buscarTodo());
    }

    public function buscarPorCodigo(Request $request) {
        
        $tiposVehiculoRepository = new TiposVehiculoRepository();
        $utilidades = new Utilidades();

        return $utilidades -> datosRespuestaValidation("buscarPorCodigo", $tiposVehiculoRepository -> buscarPorCodigo($request));
        
    }

    public function registrar(Request $request) {

        $tiposVehiculo = new TiposVehiculo();
        $tiposVehiculo -> nombre = $request -> nombre;
        $tiposVehiculo -> descripcion = $request -> descripcion;
        
        $mensaje = $this -> validateData($tiposVehiculo);

        $utilidades = new Utilidades();

        $tiposVehiculo -> cod_tipo_vehiculo = $utilidades -> generarCodigo();

        if (empty($mensaje)) {
            $tiposVehiculoRepository = new TiposVehiculoRepository();
            
            return $utilidades -> datosRespuestaValidation("Registro de datos", $tiposVehiculoRepository -> registrar($tiposVehiculo));
            
        } else {
            return $utilidades -> datosRespuestaValidation("Validación de datos", $mensaje);
        }
    }

    public function validateData(TiposVehiculo $tiposVehiculo) {

        if (is_null($tiposVehiculo -> nombre) || empty($tiposVehiculo -> nombre)) {
            return "Debe ingresar el nombre del tipo de vehiculo";
        }

        return "";
    }

}