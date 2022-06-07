<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Models\Domicilio;

class DomicilioRepository {

    public function getAll() {

        $domicilios = Domicilio::all();
        return $domicilios;   
    }

    public function getFindById(Request $request) {
        
        $domicilios = Domicilio::where("cod_domicilio", "=", $request->cod_domicilio) 
        -> get();

        return $domicilios;
    }

    public function save(Domicilio $domicilio) {

        $domicilio -> save(); 
        return "Registro exitoso";
    }


}