<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\SedeRepository;
use App\Models\Sede;

class SedeService {

    public function getAll() {

        $sede = new SedeRepository();
        return $sede -> getAll();
    
    }

    public function getFindById(Request $request) {
        
        $sede = new SedeRepository();
        return $sede -> getFindById($request);
    }

    public function save(Request $request) {

        $sede = new Sede();
        $sede -> cod_sede = $request -> cod_sede;
        $sede -> nombres = $request -> nombres;
        $sede -> direccion = $request -> direccion;
        $sede -> numero_telefono = $request -> numero_telefono;
        $sede -> nombre_contacto = $request -> nombre_contacto;
        $sede -> origen_destino_recurrente = $request -> origen_destino_recurrente;
        $sede -> estado = $request -> estado;
        $sede -> cod_cliente = $request -> cod_cliente;
     
        $mensaje = $this -> validateData($sede);

        if (empty($mensaje)) {
            $sedeRepository = new SedeRepository();
            return $sedeRepository -> save($sede);
        } else {
            return $mensaje;
        }
    }

    public function validateData(Sede $sede) {

        if (is_null($sede -> nombre) || empty($sede -> nombre)) {
            return "Debe ingresar el nombre del sede";
        }

        return "";
    }

}