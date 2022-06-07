<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\PersonaRepository;
use App\Models\Persona;

class PersonaService {

    public function getAll() {

        $persona = new PersonaRepository();
        return $persona -> getAll();
    
    }

    public function getFindById(Request $request) {
        
        $persona = new PersonaRepository();
        return $persona -> getFindById($request);
    }

    public function save(Request $request) {

        $persona = new Persona();
        $persona -> cod_persona = $request -> cod_persona;
        $persona -> tipo_documento = $request -> tipo_documento;
        $persona -> nombres = $request -> nombres;
        $persona -> apellidos = $request -> apellidos;
        $persona -> correo_electronico = $request -> correo_electronico;
        $persona -> numero_celular = $request -> numero_celular;
        $persona -> direccion = $request -> direccion;
        $persona -> fecha_nacimiento = $request -> fecha_nacimiento;
        $persona -> sexo = $request -> sexo;
        

        $mensaje = $this -> validateData($persona);

        if (empty($mensaje)) {
            $personaRepository = new PersonaRepository();
            return $personaRepository -> save($persona);
        } else {
            return $mensaje;
        }
    }

    public function validateData(Persona $persona) {

        if (is_null($persona -> cod_persona) || empty($persona -> cod_persona)) {
            return "Debe ingresar el número de documento de la persona";
        }

        return "";
    }

}