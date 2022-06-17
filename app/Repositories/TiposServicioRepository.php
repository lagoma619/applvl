<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Models\TiposServicio;

class TiposServicioRepository {

    public function buscarTodo() {

        $tiposServicios = TiposServicio::all();
        return $tiposServicios;   
    }

    public function buscarPorCodigo(Request $request) {
        
        $tiposServicios = TiposServicio::where("cod_tipo_servicio", "=", $request->cod_tipo_servicio) 
        -> get();

        return $tiposServicios;
    }

    public function registrar(TiposServicio $tiposServicio) {

        $tiposServicio -> save(); 
        return $tiposServicio;
    }


}