<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Models\Domicilio;

class DomicilioRepository {

    public function buscarTodo() {

        $domicilios = Domicilio::all();
        return $domicilios;   
    }

    public function buscarPorCodigo(Request $request) {
        
        $domicilios = Domicilio::where("cod_domicilio", "=", $request->cod_domicilio) 
        -> get();

        return $domicilios;
    }

    public function registrar(Domicilio $domicilio) {

        $domicilio -> save(); 
        return $domicilio;
    }

    public function actualizar(Domicilio $domicilio) {

        $domicilio -> save(); 
        return $domicilio;
    }


}