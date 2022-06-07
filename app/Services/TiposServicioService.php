<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\TiposServicioRepository;
use App\Models\TiposServicio;

class TiposServicioService {

    public function getAll() {

        $tiposServicio = new TiposServicioRepository();
        return $tiposServicio -> getAll();
    
    }

    public function getFindById(Request $request) {
        
        $tiposServicio = new TiposServicioRepository();
        return $tiposServicio -> getFindById($request);
    }

    public function save(Request $request) {

        $tiposServicio = new TiposServicio();
        $tiposServicio -> cod_tipos_servicio = $request -> cod_tipos_servicio;
        $tiposServicio -> cod_nombre = $request -> cod_nombre;
        $tiposServicio -> cod_descripcion = $request -> cod_descripcion;
        
        $mensaje = $this -> validateData($tiposServicio);

        if (empty($mensaje)) {
            $tiposServicioRepository = new TiposServicioRepository();
            return $tiposServicioRepository -> save($tiposServicio);
        } else {
            return $mensaje;
        }
    }

    public function validateData(TiposServicio $tiposServicio) {

        if (is_null($tiposServicio -> cod_nombre) || empty($tiposServicio -> cod_nombre)) {
            return "Debe ingresar el nombre del tipo de servicio";
        }

        return "";
    }

}