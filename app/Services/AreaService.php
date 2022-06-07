<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\AreaRepository;
use App\Models\Area;

class AreaService {

    public function getAll() {

        $area = new AreaRepository();
        return $area -> getAll();
    
    }

    public function getFindById(Request $request) {
        
        $area = new AreaRepository();
        return $area -> getFindById($request);
    }

    public function save(Request $request) {

        $area = new Area();
        $area -> cod_area = $request -> cod_area;
        $area -> nombre = $request -> nombre;
        $area -> ubicacion = $request -> ubicacion;
        $area -> numero_telefono = $request -> numero_telefono;
        $area -> nombre_contacto = $request -> nombre_contacto;
        $area -> origen_destino_recurrente = $request -> origen_destino_recurrente;
        $area -> estado = $request -> estado;
        $area -> cod_sede = $request -> cod_sede;
        
        $mensaje = $this -> validateData($area);

        if (empty($mensaje)) {
            $areaRepository = new AreaRepository();
            return $areaRepository -> save($area);
        } else {
            return $mensaje;
        }
    }

    public function validateData(Area $area) {

        if (is_null($area -> nombre) || empty($area -> nombre)) {
            return "Debe ingresar el nombre del área";
        }

        return "";
    }

}