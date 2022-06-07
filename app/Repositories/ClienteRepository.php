<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteRepository {

    public function getAll() {

        $clientes = Cliente::all();
        return $clientes;   
    }

    public function getFindById(Request $request) {
        
        $clientes = Cliente::where("cod_cliente", "=", $request->cod_cliente) 
        -> get();

        return $clientes;
    }

    public function save(Cliente $cliente) {

        $cliente -> save(); 
        return "Registro exitoso";
    }


}