<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\TiposServicioService;
use App\Models\TiposServicio;

class TiposServicioController {

    public function getAll() {
        
        $tiposServicioService = new TiposServicioService();
        return $tiposServicioService -> getAll();
    }

    public function getFindById(Request $request) {

        $tiposServicioService = new TiposServicioService();
        return $tiposServicioService -> getFindById($request);
    }

    public function save(Request $request) {
        $tiposServicioService = new TiposServicioService();
        return response() -> json($tiposServicioService -> save($request));
    }
}


