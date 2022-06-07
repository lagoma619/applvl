<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Models\TiposServicio;

class TiposServicioRepository {

    public function getAll() {

        $tiposServicios = TiposServicio::all();
        return $tiposServicios;   
    }

    public function getFindById(Request $request) {
        
        $tiposServicios = TiposServicio::where("cod_tipos_servicio", "=", $request->cod_tipos_servicio) 
        -> get();

        return $tiposServicios;
    }

    public function save(TiposServicio $tiposServicio) {

        $tiposServicio -> save(); 
        return "Registro exitoso";
    }


}