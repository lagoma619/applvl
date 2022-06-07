<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\CuentaService;
use App\Models\Cuenta;

class CuentaController {

    public function getAll() {
        
        $cuentaService = new CuentaService();
        return $cuentaService -> getAll();
    }

    public function getFindById(Request $request) {

        $cuentaService = new CuentaService();
        return $cuentaService -> getFindById($request);
    }

    public function getFindByCodeAndPassword(Request $request) {
        
        $cuentaService = new CuentaService();
        return $cuentaService -> getFindByCodeAndPassword($request);

    }

    public function save(Request $request) {
        $cuentaService = new CuentaService();
        return response() -> json($cuentaService -> save($request));
    }
}


