<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\TiposVehiculoService;
use App\Models\TiposVehiculo;

class TiposVehiculoController {

    public function getAll() {
        
        $tiposVehiculoService = new TiposVehiculoService();
        return $tiposVehiculoService -> getAll();
    }

    public function getFindById(Request $request) {

        $tiposVehiculoService = new TiposVehiculoService();
        return $tiposVehiculoService -> getFindById($request);
    }

    public function save(Request $request) {
        $tiposVehiculoService = new TiposVehiculoService();
        return response() -> json($tiposVehiculoService -> save($request));
    }
}


