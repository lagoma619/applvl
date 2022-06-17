<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Models\Cuenta;

class CuentaRepository {

    public function buscarTodo() {

        $cuentas = Cuenta::all();
        return $cuentas;   
    }

    public function buscarPorCodigo(Request $request) {
        
        $cuentas = Cuenta::where("cod_persona", "=", $request -> cod_persona) 
        -> get();

        return $cuentas;
    }

    public function buscarPorCodigoYContrasena(Request $request) {
        
        $cuentas = Cuenta::where([
            ["cod_persona", "=", $request -> cod_persona],
            ["contrasena", "=", $request -> contrasena]
        ]) -> get();
        
        return $cuentas;
        
    }


    public function registrar(Cuenta $cuenta) {

        $cuenta -> save(); 

        return $cuenta;
    }


}