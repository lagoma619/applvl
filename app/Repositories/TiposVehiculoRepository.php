<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Models\TiposVehiculo;

class TiposVehiculoRepository {

    public function buscarTodo() {

        $tiposVehiculos = TiposVehiculo::all();
        return $tiposVehiculos;   
    }

    public function buscarPorCodigo(Request $request) {
        
        $tiposVehiculos = TiposVehiculo::where("cod_tipo_vehiculo", "=", $request->cod_tipo_vehiculo) 
        -> get();

        return $tiposVehiculos;
    }

    public function registrar(TiposVehiculo $tiposVehiculo) {

        $tiposVehiculo -> save(); 
        return $tiposVehiculo;
    }


}