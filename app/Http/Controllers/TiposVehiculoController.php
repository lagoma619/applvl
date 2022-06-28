<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\TiposVehiculoService;
use App\Models\TiposVehiculo;

class TiposVehiculoController {

    public function buscarTodo() {
        
        $tiposVehiculoService = new TiposVehiculoService();
        return response() -> json($tiposVehiculoService -> buscarTodo());
    }

    public function buscarPorCodigo(Request $request) {

        $tiposVehiculoService = new TiposVehiculoService();
        return response() -> json($tiposVehiculoService -> buscarPorCodigo($request));
    }

    public function registrar(Request $request) {
        $tiposVehiculoService = new TiposVehiculoService();
        return response() -> json($tiposVehiculoService -> registrar($request));
    }
}


