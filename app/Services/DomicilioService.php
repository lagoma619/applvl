<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\DomicilioRepository;
use App\Models\Domicilio;
use App\Utilities\Constantes;
use App\Utilities\Utilidades;

class DomicilioService {

    public function buscarTodo() {

        $domicilioRepository = new DomicilioRepository();
        $utilidades = new Utilidades();

        return $utilidades -> datosRespuestaValidation("buscarTodo", $domicilioRepository -> buscarTodo());
            
    
    }

    public function buscarPorCodigo(Request $request) {
        
        $domicilioRepository = new DomicilioRepository();
        $utilidades = new Utilidades();

        return $utilidades -> datosRespuestaValidation("buscarPorCodigo", $domicilioRepository -> buscarPorCodigo($request));
    }

    public function registrar(Request $request) {

        $domicilio = new Domicilio();
        $domicilio -> asignado_a = $request -> asignado_a;
        $domicilio -> origen = $request -> origen;
        $domicilio -> destino = $request -> destino;
        $domicilio -> descripcion = $request -> descripcion;
        $domicilio -> fecha_inicio = $request -> fecha_inicio;
        $domicilio -> estado = Constantes::HABILITADO;
        $domicilio -> fecha_fin = $request -> fecha_fin;
        $domicilio -> notas = $request -> notas;
        $domicilio -> entrega_efectivo = $request -> entrega_efectivo;
        $domicilio -> cod_cliente = $request -> cod_cliente;
        $domicilio -> cod_tipo_vehiculo = $request -> cod_tipo_vehiculo;
        $domicilio -> cod_tipo_servicio = $request -> cod_tipo_servicio;

        $mensaje = $this -> validateData($domicilio);
        
        $utilidades = new Utilidades();

        $domicilio -> cod_domicilio = $utilidades -> generarCodigo();

        if (empty($mensaje)) {
            $domicilioRepository = new DomicilioRepository();
            
            return $utilidades -> datosRespuestaValidation("Registro de datos", $domicilioRepository -> registrar($domicilio));
            
        } else {
            return $utilidades -> datosRespuestaValidation("Validación de datos", $mensaje);
        }
    }

    public function actualizar(Request $request) {
        
        $domicilioRepository = new DomicilioRepository();

        $domicilio = $domicilioRepository -> buscarPorCodigo($request);

        $domicilio -> cod_domicilio = $request -> cod_domicilio;
        $domicilio -> asignado_a = $request -> asignado_a;
        $domicilio -> origen = $request -> origen;
        $domicilio -> destino = $request -> destino;
        $domicilio -> descripcion = $request -> descripcion;
        $domicilio -> fecha_inicio = $request -> fecha_inicio;
        $domicilio -> estado = $request -> estado;
        $domicilio -> fecha_fin = $request -> fecha_fin;
        $domicilio -> notas = $request -> notas;
        $domicilio -> entrega_efectivo = $request -> entrega_efectivo;
        $domicilio -> cod_cliente = $request -> cod_cliente;
        $domicilio -> cod_tipo_vehiculo = $request -> cod_tipo_vehiculo;
        $domicilio -> cod_tipo_servicio = $request -> cod_tipo_servicio;

        $mensaje = $this -> validateData($domicilio);
        
        $utilidades = new Utilidades();

        if (empty($mensaje)) {
            
            return $utilidades -> datosRespuestaValidation("Registro de datos", $domicilioRepository -> actualizar($domicilio));
            
        } else {
            return $utilidades -> datosRespuestaValidation("Validación de datos", $mensaje);
        }
    }

    public function validateData(Domicilio $domicilio) {

        if (is_null($domicilio -> asignado_a) || empty($domicilio -> asignado_a)) {
            return "Debe ingresar la persona asignada";
        } else if (is_null($domicilio -> origen) || empty($domicilio -> origen)) {
            return "Debe ingresar el origen del servicio";
        } else if (is_null($domicilio -> destino) || empty($domicilio -> destino)) {
            return "Debe ingresar el destino del servicio";
        } else if (is_null($domicilio -> descripcion) || empty($domicilio -> descripcion)) {
            return "Debe ingresar una descripción del servicio";
        } else if (is_null($domicilio -> estado) || empty($domicilio -> estado)) {
            return "Debe ingresar el estado del servicio";
        } else if (is_null($domicilio -> notas) || empty($domicilio -> notas)) {
            return "Debe ingresar una nota del servicio";
        } else if (is_null($domicilio -> cod_cliente) || empty($domicilio -> cod_cliente)) {
            return "Debe ingresar el cliente para el servicio";
        } else if (is_null($domicilio -> cod_tipo_vehiculo) || empty($domicilio -> cod_tipo_vehiculo)) {
            return "Debe ingresar el tipo de vehiculo para el servicio";
        } else if (is_null($domicilio -> cod_tipo_servicio) || empty($domicilio -> cod_tipo_servicio)) {
            return "Debe ingresar el tipo de servicio";
        }

        return "";
    }

}