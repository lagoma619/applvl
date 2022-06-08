<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\CuentaService;
use App\Models\Cuenta;

class CuentaController {

    public function buscarTodo() {
        
        $cuentaService = new CuentaService();
        return $cuentaService -> buscarTodo();
    }

    public function buscarPorCodigo(Request $request) {

        $cuentaService = new CuentaService();
        return $cuentaService -> buscarPorCodigo($request);
    }

    public function buscarPorCodigoYContrasena(Request $request) {
        
        $cuentaService = new CuentaService();
        
        return response() -> json([
            'data' => $cuentaService -> buscarPorCodigoYContrasena($request)]);

    }

    public function registrar(Request $request) {
        $cuentaService = new CuentaService();
        return response() -> json($cuentaService -> registrar($request));
    }
}


