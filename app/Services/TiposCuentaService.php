<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\TiposCuentaRepository;
use App\Models\TiposCuenta;
use App\Utilities\Utilidades;

class TiposCuentaService {

    public function buscarTodo() {

        $tiposCuenta = new TiposCuentaRepository();
        return $tiposCuenta -> buscarTodo();
    
    }

    public function buscarPorCodigo(Request $request) {
        
        $tiposCuenta = new TiposCuentaRepository();
        return $tiposCuenta -> buscarPorCodigo($request);
    }

    public function registrar(Request $request) {

        $tiposCuenta = new TiposCuenta();
        $tiposCuenta -> cod_tipos_cuenta = $request -> cod_tipos_cuenta;
        $tiposCuenta -> cod_nombre = $request -> cod_nombre;
        $tiposCuenta -> cod_descripcion = $request -> cod_descripcion;
        
        $mensaje = $this -> validateData($tiposCuenta);
        
        $utilidades = new Utilidades();

        if (empty($mensaje)) {
            $tiposCuentaRepository = new TiposCuentaRepository();
            
            return $utilidades -> datosRespuestaValidation("Registro de datos", $tiposCuentaRepository -> registrar($tiposCuenta));
            
        } else {
            return $utilidades -> datosRespuestaValidation("Validación de datos", $mensaje);
        }
    }

    public function validateData(TiposCuenta $tiposCuenta) {

        if (is_null($tiposCuenta -> cod_nombre) || empty($tiposCuenta -> cod_nombre)) {
            return "Debe ingresar el nombre del tipo de cuenta";
        }

        return "";
    }

}