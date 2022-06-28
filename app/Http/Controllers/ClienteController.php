<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\ClienteService;
use App\Models\Cliente;

class ClienteController {

    public function buscarTodo() {
        
        $clienteService = new ClienteService();
        return response() -> json($clienteService -> buscarTodo());
    }

    public function buscarPorCodigo(Request $request) {

        $clienteService = new ClienteService();
        return response() -> json($clienteService -> buscarPorCodigo($request));
    }

    public function buscarPorNombre(Request $request) {

        $clienteService = new ClienteService();
        return response() -> json($clienteService -> buscarPorNombre($request));
    }

    public function registrar(Request $request) {
        $clienteService = new ClienteService();
        return response() -> json($clienteService -> registrar($request));
    }
}