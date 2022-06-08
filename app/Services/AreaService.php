<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\AreaRepository;
use App\Models\Area;
use App\Utilidades\Constantes;
use App\Utilidades\Utilidades;

class AreaService {

    public function buscarTodo() {

        $area = new AreaRepository();
        return $area -> buscarTodo();
    
    }

    public function buscarPorCodigo(Request $request) {
        
        $area = new AreaRepository();
        return $area -> buscarPorCodigo($request);
    }

    public function registrar(Request $request) {

        $area = new Area();
        $area -> cod_area = $request -> cod_area;
        $area -> nombre = $request -> nombre;
        $area -> ubicacion = $request -> ubicacion;
        $area -> numero_telefono = $request -> numero_telefono;
        $area -> nombre_contacto = $request -> nombre_contacto;
        $area -> origen_destino_recurrente = $request -> origen_destino_recurrente;
        $area -> estado = Constantes::HABILITADO;
        $area -> cod_sede = $request -> cod_sede;
        
        $mensaje = $this -> validateData($area);
        
        $utilidades = new Utilidades();

        if (empty($mensaje)) {
            $areaRepository = new AreaRepository();
            
            return $utilidades -> datosRespuestaValidation("Registro de datos", $areaRepository -> registrar($area));
            
        } else {
            return $utilidades -> datosRespuestaValidation("Validación de datos", $mensaje);
        }
    }

    public function validateData(Area $area) {

        if (is_null($area -> nombre) || empty($area -> nombre)) {
            return "Debe ingresar el nombre del área";
        }

        return "";
    }

}