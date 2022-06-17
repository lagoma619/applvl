<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\AreaRepository;
use App\Models\Area;
use App\Utilities\Constantes;
use App\Utilities\Utilidades;

class AreaService {

    public function buscarTodo() {

        $areaRepository = new AreaRepository();
        $utilidades = new Utilidades();

        return $utilidades -> datosRespuestaValidation("buscarTodo", $areaRepository -> buscarTodo());
    
    }

    public function buscarPorCodigo(Request $request) {
        
        $areaRepository = new AreaRepository();
        $utilidades = new Utilidades();

        return $utilidades -> datosRespuestaValidation("buscarPorCodigo", $areaRepository -> buscarPorCodigo($request));
    }

    public function registrar(Request $request) {

        $area = new Area();
        $area -> nombre = $request -> nombre;
        $area -> ubicacion = $request -> ubicacion;
        $area -> numero_telefono = $request -> numero_telefono;
        $area -> nombre_contacto = $request -> nombre_contacto;
        $area -> origen_destino_recurrente = $request -> origen_destino_recurrente;
        $area -> estado = Constantes::HABILITADO;
        $area -> cod_sede = $request -> cod_sede;
        
        $mensaje = $this -> validateData($area);
        
        $utilidades = new Utilidades();
        
        $area -> cod_area = $utilidades -> generarCodigo();

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
        } else if (is_null($area -> ubicacion) || empty($area -> ubicacion)) {
            return "Debe ingresar la ubicación del área";
        } else if (is_null($area -> numero_telefono) || empty($area -> numero_telefono)) {
            return "Debe ingresar el número de teléfono del área";
        } else if (is_null($area -> nombre_contacto) || empty($area -> nombre_contacto)) {
            return "Debe ingresar el nombre de contacto del área";
        }

        return "";
    }

}