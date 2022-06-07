<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\DomicilioRepository;
use App\Models\Domicilio;

class DomicilioService {

    public function getAll() {

        $domicilio = new DomicilioRepository();
        return $domicilio -> getAll();
    
    }

    public function getFindById(Request $request) {
        
        $domicilio = new DomicilioRepository();
        return $domicilio -> getFindById($request);
    }

    public function save(Request $request) {

        $domicilio = new Domicilio();
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

        if (empty($mensaje)) {
            $domicilioRepository = new DomicilioRepository();
            return $domicilioRepository -> save($domicilio);
        } else {
            return $mensaje;
        }
    }

    public function validateData(Domicilio $domicilio) {

        if (is_null($domicilio -> asignado_a) || empty($domicilio -> asignado_a)) {
            return "Debe ingresar la persona asignada";
        }

        return "";
    }

}