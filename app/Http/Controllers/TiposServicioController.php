<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\TiposServicioService;
use App\Models\TiposServicio;

class TiposServicioController {

    public function buscarTodo() {
        
        $tiposServicioService = new TiposServicioService();
        return response() -> json($tiposServicioService -> buscarTodo());
    }

    public function buscarPorCodigo(Request $request) {

        $tiposServicioService = new TiposServicioService();
        return response() -> json($tiposServicioService -> buscarPorCodigo($request));
    }

    public function registrar(Request $request) {
        $tiposServicioService = new TiposServicioService();
        return response() -> json($tiposServicioService -> registrar($request));
    }
}


