<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\PersonaService;
use App\Models\Persona;

class PersonaController {

    public function getAll() {
        
        $personaService = new PersonaService();
        return $personaService -> getAll();
    }

    public function getFindById(Request $request) {

        $personaService = new PersonaService();
        return $personaService -> getFindById($request);
    }

    public function save(Request $request) {
        $personaService = new PersonaService();
        return response() -> json($personaService -> save($request));
    }
}


