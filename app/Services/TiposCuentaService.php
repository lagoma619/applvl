<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\TiposCuentaRepository;
use App\Models\TiposCuenta;
use App\Utilities\Utilidades;

class TiposCuentaService {

    public function buscarTodo() {

        $tiposCuentaRepository = new TiposCuentaRepository();
        $utilidades = new Utilidades();

        return $utilidades -> datosRespuestaValidation("buscarTodo", $tiposCuentaRepository -> buscarTodo());
    
    }

    public function buscarPorCodigo(Request $request) {
        
        $tiposCuentaRepository = new TiposCuentaRepository();
        $utilidades = new Utilidades();
        
        return $utilidades -> datosRespuestaValidation("buscarPorCodigo", $tiposCuentaRepository -> buscarPorCodigo($request));
    }

    public function registrar(Request $request) {

        $tiposCuenta = new TiposCuenta();
        
        $tiposCuenta -> cod_nombre = $request -> cod_nombre;
        $tiposCuenta -> cod_descripcion = $request -> cod_descripcion;
        
        $mensaje = $this -> validateData($tiposCuenta);
        
        $utilidades = new Utilidades();

        $tiposCuenta -> cod_tipos_cuenta = $utilidades -> generarCodigo();

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