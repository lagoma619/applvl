<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\SedeService;
use App\Models\Sede;

class SedeController {

    public function buscarTodo() {
        $sedeService = new SedeService();
        return response() -> json($sedeService -> buscarTodo());
    }

    public function buscarPorCodigo(Request $request) {
        $sedeService = new SedeService();
        return response() -> json($sedeService -> buscarPorCodigo($request));
    }

    public function registrar(Request $request) {
        $sedeService = new SedeService();
        return response() -> json($sedeService -> registrar($request));
    }
}