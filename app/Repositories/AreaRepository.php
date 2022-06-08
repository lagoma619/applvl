<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Models\Area;

class AreaRepository {

    public function buscarTodo() {

        $areas = Area::all();
        return $areas;   
    }

    public function buscarPorCodigo(Request $request) {
        
        $areas = Area::where("cod_area", "=", $request->cod_area) 
        -> get();

        return $areas;
    }

    public function registrar(Area $area) {

        $area -> registrar(); 
        return "Registro exitoso";
    }


}