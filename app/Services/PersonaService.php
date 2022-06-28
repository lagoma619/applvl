<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\PersonaRepository;
use App\Models\Persona;
use App\Utilities\Utilidades;

class PersonaService {

    public function buscarTodo() {

        $personaRepository = new PersonaRepository();
        $utilidades = new Utilidades();

        return $utilidades -> datosRespuestaValidation("buscarTodo", $personaRepository -> buscarTodo());
    
    }

    public function buscarPorCodigo(Request $request) {
        
        $personaRepository = new PersonaRepository();
        $utilidades = new Utilidades();
        
        return $utilidades -> datosRespuestaValidation("buscarPorCodigo", $personaRepository -> buscarPorCodigo($request));
    }

    public function registrar(Request $request) {

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
        
        $utilidades = new Utilidades();

        if (empty($mensaje)) {
            $personaRepository = new PersonaRepository();
            
            return $utilidades -> datosRespuestaValidation("Registro de datos", $personaRepository -> registrar($persona));
            
        } else {
            return $utilidades -> datosRespuestaValidation("Validación de datos", $mensaje);
        }
    }

    public function validateData(Persona $persona) {

        if (is_null($persona -> cod_persona) || empty($persona -> cod_persona)) {
            return "Debe ingresar el número de documento de la persona";
        }

        return "";
    }

}