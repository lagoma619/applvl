<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\ClienteRepository;
use App\Models\Cliente;
use App\Utilities\Constantes;
use App\Utilities\Utilidades;

class ClienteService {

    public function buscarTodo() {

        $clienteRepository = new ClienteRepository();
        $utilidades = new Utilidades();

        return $utilidades -> datosRespuestaValidation("buscarTodo", $clienteRepository -> buscarTodo());
    
    }

    public function buscarPorCodigo(Request $request) {
        
        $clienteRepository = new ClienteRepository();
        $utilidades = new Utilidades();

        return $utilidades -> datosRespuestaValidation("buscarPorCodigo", $clienteRepository -> buscarPorCodigo($request));
    }

    public function buscarPorNombre(Request $request) {
        
        $clienteRepository = new ClienteRepository();
        $utilidades = new Utilidades();

        return $utilidades -> datosRespuestaValidation("buscarPorCodigo", $clienteRepository -> buscarPorNombre($request));
    }
    public function registrar(Request $request) {

        $cliente = new Cliente();
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
        
        $cliente -> cod_cliente = $utilidades -> generarCodigo();

        if (empty($mensaje)) {
            $clienteRepository = new ClienteRepository();

            return $utilidades -> datosRespuestaValidation("Registro de datos", $clienteRepository -> registrar($cliente));
            
        } else {
            return $utilidades -> datosRespuestaValidation("Validación de datos", $mensaje);
        }
    }

    public function validateData(Cliente $cliente) {

        if (is_null($cliente -> nombre) || empty($cliente -> nombre)) {
            return "Debe ingresar el nombre del cliente";
        } else if (is_null($cliente -> correo_electronico) || empty($cliente -> correo_electronico)) {
            return "Debe ingresar el correo electrónico del cliente";
        } else if (is_null($cliente -> numero_telefono) || empty($cliente -> numero_telefono)) {
            return "Debe ingresar el numero de teléfono del cliente";
        } else if (is_null($cliente -> direccion) || empty($cliente -> direccion)) {
            return "Debe ingresar la dirección del cliente";
        } else if (is_null($cliente -> horario_cliente) || empty($cliente -> horario_cliente)) {
            return "Debe ingresar el horario del cliente";
        } else if (is_null($cliente -> nombre_comercial) || empty($cliente -> nombre_comercial)) {
            return "Debe ingresar el nombre comercial del cliente";
        } else if (is_null($cliente -> pagina_web) || empty($cliente -> pagina_web)) {
            return "Debe ingresar la página web del cliente";
        } else if (is_null($cliente -> contacto) || empty($cliente -> contacto)) {
            return "Debe ingresar un contacto del cliente";
        } else if (is_null($cliente -> notas) || empty($cliente -> notas)) {
            return "Debe ingresar las notas del cliente";
        } 

        return "";
    }

}