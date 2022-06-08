<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\DomicilioService;
use App\Models\Domicilio;

class DomicilioController {

    public function buscarTodo() {
        
        $domicilioService = new DomicilioService();
        return $domicilioService -> buscarTodo();
    }

    public function buscarPorCodigo(Request $request) {

        $domicilioService = new DomicilioService();
        return $domicilioService -> buscarPorCodigo($request);
    }

    public function registrar(Request $request) {
        $domicilioService = new DomicilioService();
        return response() -> json($domicilioService -> registrar($request));
    }
}