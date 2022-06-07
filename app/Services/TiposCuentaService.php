<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\TiposCuentaRepository;
use App\Models\TiposCuenta;

class TiposCuentaService {

    public function getAll() {

        $tiposCuenta = new TiposCuentaRepository();
        return $tiposCuenta -> getAll();
    
    }

    public function getFindById(Request $request) {
        
        $tiposCuenta = new TiposCuentaRepository();
        return $tiposCuenta -> getFindById($request);
    }

    public function save(Request $request) {

        $tiposCuenta = new TiposCuenta();
        $tiposCuenta -> cod_tipos_cuenta = $request -> cod_tipos_cuenta;
        $tiposCuenta -> cod_nombre = $request -> cod_nombre;
        $tiposCuenta -> cod_descripcion = $request -> cod_descripcion;
        
        $mensaje = $this -> validateData($tiposCuenta);

        if (empty($mensaje)) {
            $tiposCuentaRepository = new TiposCuentaRepository();
            return $tiposCuentaRepository -> save($tiposCuenta);
        } else {
            return $mensaje;
        }
    }

    public function validateData(TiposCuenta $tiposCuenta) {

        if (is_null($tiposCuenta -> cod_nombre) || empty($tiposCuenta -> cod_nombre)) {
            return "Debe ingresar el nombre del tipo de cuenta";
        }

        return "";
    }

}