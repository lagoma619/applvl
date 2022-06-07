<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\TiposCuentaService;
use App\Models\TiposCuenta;

class TiposCuentaController {

    public function getAll() {
        
        $tiposCuentaService = new TiposCuentaService();
        return $tiposCuentaService -> getAll();
    }

    public function getFindById(Request $request) {

        $tiposCuentaService = new TiposCuentaService();
        return $tiposCuentaService -> getFindById($request);
    }

    public function save(Request $request) {
        $tiposCuentaService = new TiposCuentaService();
        return response() -> json($tiposCuentaService -> save($request));
    }
}


