<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Models\Persona;

class PersonaRepository {

    public function buscarTodo() {

        $personas = Persona::all();
        return $personas;   
    }

    public function buscarPorCodigo(Request $request) {
        
        $personas = Persona::where("cod_persona", "=", $request->cod_persona) 
        -> get();

        return $personas;
    }

    public function registrar(Persona $persona) {

        $persona -> save(); 
        return "Registro exitoso";
    }


}