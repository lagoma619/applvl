<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Models\Sede;

class SedeRepository {

    public function getAll() {

        $sedes = Sede::all();
        return $sedes;   
    }

    public function getFindById(Request $request) {
        
        $sedes = Sede::where("cod_sede", "=", $request->cod_sede) 
        -> get();

        return $sedes;
    }

    public function save(Sede $sede) {

        $sede -> save(); 
        return "Registro exitoso";
    }


}