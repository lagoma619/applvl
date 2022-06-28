<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteRepository {

    public function buscarTodo() {

        $clientes = Cliente::all();
        return $clientes;   
    }

    public function buscarPorCodigo(Request $request) {
        
        $clientes = Cliente::where("cod_cliente", "=", $request->cod_cliente) 
        -> get();

        return $clientes;
    }

    public function buscarPorNombre(Request $request) {
        
        $clientes = Cliente::where("nombre", "=", $request->nombre) 
        -> get();

        return $clientes;
    }

    public function registrar(Cliente $cliente) {

        $cliente -> save(); 
        return $cliente;
    }


}