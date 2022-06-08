<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\SedeRepository;
use App\Models\Sede;
use App\Utilidades\Constantes;
use App\Utilidades\Utilidades;

class SedeService {

    public function buscarTodo() {

        $sede = new SedeRepository();
        return $sede -> buscarTodo();
    
    }

    public function buscarPorCodigo(Request $request) {
        
        $sede = new SedeRepository();
        return $sede -> buscarPorCodigo($request);
    }

    public function registrar(Request $request) {

        $sede = new Sede();
        $sede -> cod_sede = $request -> cod_sede;
        $sede -> nombres = $request -> nombres;
        $sede -> direccion = $request -> direccion;
        $sede -> numero_telefono = $request -> numero_telefono;
        $sede -> nombre_contacto = $request -> nombre_contacto;
        $sede -> origen_destino_recurrente = $request -> origen_destino_recurrente;
        $sede -> estado = Constantes::HABILITADO;
        $sede -> cod_cliente = $request -> cod_cliente;
     
        $mensaje = $this -> validateData($sede);

        $utilidades = new Utilidades();

        if (empty($mensaje)) {
            $sedeRepository = new SedeRepository();
            
            return $utilidades -> datosRespuestaValidation("Registro de datos", $sedeRepository -> registrar($sede));
            
        } else {
            return $utilidades -> datosRespuestaValidation("Validación de datos", $mensaje);
        }
    }

    public function validateData(Sede $sede) {

        if (is_null($sede -> nombre) || empty($sede -> nombre)) {
            return "Debe ingresar el nombre del sede";
        }

        return "";
    }

}