<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\PersonaService;
use App\Models\Persona;

class PersonaController {

    public function buscarTodo() {
        
        $personaService = new PersonaService();
        return $personaService -> buscarTodo();
    }

    public function buscarPorCodigo(Request $request) {

        $personaService = new PersonaService();
        return $personaService -> buscarPorCodigo($request);
    }

    public function registrar(Request $request) {
        $personaService = new PersonaService();
        return response() -> json($personaService -> registrar($request));
    }
}


