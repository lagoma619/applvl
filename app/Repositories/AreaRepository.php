<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Models\Area;

class AreaRepository {

    public function getAll() {

        $areas = Area::all();
        return $areas;   
    }

    public function getFindById(Request $request) {
        
        $areas = Area::where("cod_area", "=", $request->cod_area) 
        -> get();

        return $areas;
    }

    public function save(Area $area) {

        $area -> save(); 
        return "Registro exitoso";
    }


}