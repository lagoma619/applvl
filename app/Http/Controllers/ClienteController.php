<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\ClienteService;
use App\Models\Cliente;

class ClienteController {

    public function getAll() {
        
        $clienteService = new ClienteService();
        return $clienteService -> getAll();
    }

    public function getFindById(Request $request) {

        $clienteService = new ClienteService();
        return $clienteService -> getFindById($request);
    }

    public function save(Request $request) {
        $clienteService = new ClienteService();
        return response() -> json($clienteService -> save($request));
    }
}