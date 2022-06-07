<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Models\TiposCuenta;

class TiposCuentaRepository {

    public function getAll() {

        $tiposCuentas = TiposCuenta::all();
        return $tiposCuentas;   
    }

    public function getFindById(Request $request) {
        
        $tiposCuentas = TiposCuenta::where("cod_tipos_cuenta", "=", $request->cod_tipos_cuenta) 
        -> get();

        return $tiposCuentas;
    }

    public function save(TiposCuenta $tiposCuenta) {

        $tiposCuenta -> save(); 
        return "Registro exitoso";
    }


}