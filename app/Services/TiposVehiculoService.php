<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\TiposVehiculoRepository;
use App\Models\TiposVehiculo;
use App\Utilities\Utilidades;

class TiposVehiculoService {

    public function buscarTodo() {

        $tiposVehiculo = new TiposVehiculoRepository();
        return $tiposVehiculo -> buscarTodo();
    
    }

    public function buscarPorCodigo(Request $request) {
        
        $tiposVehiculo = new TiposVehiculoRepository();
        return $tiposVehiculo -> buscarPorCodigo($request);
    }

    public function registrar(Request $request) {

        $tiposVehiculo = new TiposVehiculo();
        $tiposVehiculo -> cod_tipos_vehiculo = $request -> cod_tipos_vehiculo;
        $tiposVehiculo -> cod_nombre = $request -> cod_nombre;
        $tiposVehiculo -> cod_descripcion = $request -> cod_descripcion;
        
        $mensaje = $this -> validateData($tiposVehiculo);

        $utilidades = new Utilidades();

        if (empty($mensaje)) {
            $tiposVehiculoRepository = new TiposVehiculoRepository();
            
            return $utilidades -> datosRespuestaValidation("Registro de datos", $tiposVehiculoRepository -> registrar($tiposVehiculo));
            
        } else {
            return $utilidades -> datosRespuestaValidation("Validación de datos", $mensaje);
        }
    }

    public function validateData(TiposVehiculo $tiposVehiculo) {

        if (is_null($tiposVehiculo -> cod_nombre) || empty($tiposVehiculo -> cod_nombre)) {
            return "Debe ingresar el nombre del tipo de vehiculo";
        }

        return "";
    }

}