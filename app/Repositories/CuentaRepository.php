<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Models\Cuenta;

class CuentaRepository {

    public function getAll() {

        $cuentas = Cuenta::all();
        return $cuentas;   
    }

    public function getFindById(Request $request) {
        
        $cuentas = Cuenta::where("cod_persona", "=", $request -> cod_persona) 
        -> get();

        return $cuentas;
    }

    public function getFindByCodeAndPassword(Request $request) {
        
        $cuentas = Cuenta::where([
            ["cod_persona", "=", $request -> cod_persona],
            ["contrasena", "=", $request -> contrasena]
        ]) -> get();
        
        return $cuentas;
        
    }


    public function save(Cuenta $cuenta) {

        $cuenta -> save(); 
        return "Registro exitoso";
    }


}