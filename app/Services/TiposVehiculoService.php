<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\TiposVehiculoRepository;
use App\Models\TiposVehiculo;

class TiposVehiculoService {

    public function getAll() {

        $tiposVehiculo = new TiposVehiculoRepository();
        return $tiposVehiculo -> getAll();
    
    }

    public function getFindById(Request $request) {
        
        $tiposVehiculo = new TiposVehiculoRepository();
        return $tiposVehiculo -> getFindById($request);
    }

    public function save(Request $request) {

        $tiposVehiculo = new TiposVehiculo();
        $tiposVehiculo -> cod_tipos_vehiculo = $request -> cod_tipos_vehiculo;
        $tiposVehiculo -> cod_nombre = $request -> cod_nombre;
        $tiposVehiculo -> cod_descripcion = $request -> cod_descripcion;
        
        $mensaje = $this -> validateData($tiposVehiculo);

        if (empty($mensaje)) {
            $tiposVehiculoRepository = new TiposVehiculoRepository();
            return $tiposVehiculoRepository -> save($tiposVehiculo);
        } else {
            return $mensaje;
        }
    }

    public function validateData(TiposVehiculo $tiposVehiculo) {

        if (is_null($tiposVehiculo -> cod_nombre) || empty($tiposVehiculo -> cod_nombre)) {
            return "Debe ingresar el nombre del tipo de vehiculo";
        }

        return "";
    }

}