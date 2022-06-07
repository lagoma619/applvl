<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\ClienteRepository;
use App\Models\Cliente;

class ClienteService {

    public function getAll() {

        $cliente = new ClienteRepository();
        return $cliente -> getAll();
    
    }

    public function getFindById(Request $request) {
        
        $cliente = new ClienteRepository();
        return $cliente -> getFindById($request);
    }

    public function save(Request $request) {

        $cliente = new Cliente();
        $cliente -> cod_cliente = $request -> cod_cliente;
        $cliente -> nombre = $request -> nombre;
        $cliente -> correo_electronico = $request -> correo_electronico;
        $cliente -> numero_telefono = $request -> numero_telefono;
        $cliente -> direccion = $request -> direccion;
        $cliente -> tipo_documento = $request -> tipo_documento;
        $cliente -> nit = $request -> nit;
        $cliente -> horario_cliente = $request -> horario_cliente;
        $cliente -> nombre_comercial = $request -> nombre_comercial;
        $cliente -> pagina_web = $request -> pagina_web;
        $cliente -> contacto = $request -> contacto;
        $cliente -> notas = $request -> notas;
        $cliente -> estado = $request -> estado;
        $cliente -> cod_cuenta = $request -> cod_cuenta;
        
        $mensaje = $this -> validateData($cliente);

        if (empty($mensaje)) {
            $clienteRepository = new ClienteRepository();
            return $clienteRepository -> save($cliente);
        } else {
            return $mensaje;
        }
    }

    public function validateData(Cliente $cliente) {

        if (is_null($cliente -> nombre) || empty($cliente -> nombre)) {
            return "Debe ingresar el nombre del área";
        }

        return "";
    }

}