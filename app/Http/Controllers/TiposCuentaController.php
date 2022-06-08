<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\TiposCuentaService;
use App\Models\TiposCuenta;

class TiposCuentaController {

    public function buscarTodo() {
        
        $tiposCuentaService = new TiposCuentaService();
        return $tiposCuentaService -> buscarTodo();
    }

    public function buscarPorCodigo(Request $request) {

        $tiposCuentaService = new TiposCuentaService();
        return $tiposCuentaService -> buscarPorCodigo($request);
    }

    public function registrar(Request $request) {
        $tiposCuentaService = new TiposCuentaService();
        return response() -> json($tiposCuentaService -> registrar($request));
    }
}


