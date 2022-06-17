<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Models\Sede;

class SedeRepository {

    public function buscarTodo() {

        $sedes = Sede::all();
        return $sedes;   
    }

    public function buscarPorCodigo(Request $request) {
        
        $sedes = Sede::where("cod_sede", "=", $request->cod_sede) 
        -> get();

        return $sedes;
    }

    public function registrar(Sede $sede) {

        $sede -> save(); 
        return $sede;
    }


}