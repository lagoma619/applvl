<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\ClienteRepository;
use App\Models\Cliente;
use App\Utilities\Constantes;
use App\Utilities\Utilidades;

class ClienteService {

    public function buscarTodo() {

        $cliente = new ClienteRepository();
        return $cliente -> buscarTodo();
    
    }

    public function buscarPorCodigo(Request $request) {
        
        $cliente = new ClienteRepository();
        return $cliente -> buscarPorCodigo($request);
    }

    public function buscarPorNombre(Request $request) {
        
        $cliente = new ClienteRepository();
        return $cliente -> buscarPorNombre($request);
    }
    public function registrar(Request $request) {

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
        $cliente -> estado = Constantes::HABILITADO;
        
        $mensaje = $this -> validateData($cliente);
        
        $utilidades = new Utilidades();
        
        if (empty($mensaje)) {
            $clienteRepository = new ClienteRepository();

            return $utilidades -> datosRespuestaValidation("Registro de datos", $clienteRepository -> registrar($cliente));
            
        } else {
            return $utilidades -> datosRespuestaValidation("Validación de datos", $mensaje);
        }
    }

    public function validateData(Cliente $cliente) {

        if (is_null($cliente -> nombre) || empty($cliente -> nombre)) {
            return "Debe ingresar el nombre del área";
        }

        return "";
    }

}