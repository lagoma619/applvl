<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\DomicilioService;
use App\Models\Domicilio;

class DomicilioController {

    public function buscarTodo() {
        
        $domicilioService = new DomicilioService();
        return response() -> json($domicilioService -> buscarTodo());
    }

    public function buscarPorCodigo(Request $request) {

        $domicilioService = new DomicilioService();
        return response() -> json($domicilioService -> buscarPorCodigo($request));
    }

    public function registrar(Request $request) {
        $domicilioService = new DomicilioService();
        return response() -> json($domicilioService -> registrar($request));
    }

    public function actualizar(Request $request) {
        $domicilioService = new DomicilioService();
        return response() -> json($domicilioService -> actualizar($request));
    }
}