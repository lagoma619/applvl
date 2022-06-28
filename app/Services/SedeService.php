<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\SedeRepository;
use App\Models\Sede;
use App\Utilities\Constantes;
use App\Utilities\Utilidades;

class SedeService {

    public function buscarTodo() {

        $sedeRepository = new SedeRepository();
        $utilidades = new Utilidades();
        
        return $utilidades -> datosRespuestaValidation("buscarTodo", $sedeRepository -> buscarTodo());
    
    }

    public function buscarPorCodigo(Request $request) {
        
        $sedeRepository = new SedeRepository();
        $utilidades = new Utilidades();
        
        return $utilidades -> datosRespuestaValidation("buscarPorCodigo", $sedeRepository -> buscarPorCodigo($request));
    }

    public function registrar(Request $request) {

        $sede = new Sede();
        $sede -> nombres = $request -> nombres;
        $sede -> direccion = $request -> direccion;
        $sede -> numero_telefono = $request -> numero_telefono;
        $sede -> nombre_contacto = $request -> nombre_contacto;
        $sede -> origen_destino_recurrente = $request -> origen_destino_recurrente;
        $sede -> estado = Constantes::HABILITADO;
        $sede -> cod_cliente = $request -> cod_cliente;
     
        $mensaje = $this -> validateData($sede);

        $utilidades = new Utilidades();

        $sede -> cod_sede = $utilidades -> generarCodigo();

        if (empty($mensaje)) {
            $sedeRepository = new SedeRepository();
            
            return $utilidades -> datosRespuestaValidation("Registro de datos", $sedeRepository -> registrar($sede));
            
        } else {
            return $utilidades -> datosRespuestaValidation("Validación de datos", $mensaje);
        }
    }

    public function validateData(Sede $sede) {

        if (is_null($sede -> nombres) || empty($sede -> nombres)) {
            return "Debe ingresar el nombre de la sede";
        } else if (is_null($sede -> direccion) || empty($sede -> direccion)) {
            return "Debe ingresar la dirección de la sede";
        } else if (is_null($sede -> numero_telefono) || empty($sede -> numero_telefono)) {
            return "Debe ingresar el número de teléfono de la sede";
        } else if (is_null($sede -> nombre_contacto) || empty($sede -> nombre_contacto)) {
            return "Debe ingresar el nombre de contacto de la sede";
        }

        return "";
    }

}