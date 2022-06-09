<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\CuentaRepository;
use App\Models\Cuenta;
use App\Utilities\Constantes;
use App\Utilities\DatosRespuesta;
use App\Utilities\Utilidades;

class CuentaService {

    const HABILITADO = "Habilitado";
    const DESHABILITADO = "Deshabilitado";
    const REGLA_CONTRASENA = "//^[A-Za-z0-9_-]{6,10}$//";

    public function buscarTodo() {

        $cuenta = new CuentaRepository();
        return $cuenta -> buscarTodo();
    
    }


    public function buscarPorCodigo(Request $request) {
        
        $cuenta = new CuentaRepository();
        return $cuenta -> buscarPorCodigo($request);
    }


    public function buscarPorCodigoYContrasena(Request $request) {
        
        if (is_null($request -> contrasena) || empty($request -> contrasena)) {
            $mensaje =  "Debe ingresar una contraseña";

        } else if (is_null($request -> cod_persona) || empty($request -> cod_persona)) {
            $mensaje = "Debe ingresar su número de identificación";

        } else {
            $cuentaRepository = new CuentaRepository();
            return $cuentaRepository -> buscarPorCodigoYContrasena($request);

            //echo "cuentas->contrasena " + $cuentaRepository;
            
            //if (hash_equals($cuentaRepository->contrasena, $request->contrasena)) {
            //    return $cuentaRepository;
            //} else {
            //    $cuentas = null;
            //return $cuentaRepository;
            //}
        }

        $utilidades = new Utilidades();
        $datosRespuesta = $utilidades -> datosRespuestaValidation("Validacion de datos", $mensaje);
        
        return $datosRespuesta;

    }


    public function registrar(Request $request) {
        
        $cuenta = new Cuenta();
        $cuenta -> cod_cuenta = $request -> cod_cuenta;
        $cuenta -> contrasena = $request -> contrasena;
        $cuenta -> estado = Constantes::HABILITADO;
        $cuenta -> notas = $request -> notas;
        $cuenta -> cod_persona = $request -> cod_persona;
        $cuenta -> cod_tipos_cuenta = $request -> cod_tipos_cuenta;
        $cuenta -> cod_cliente = $request -> cod_cliente;
        
        $mensaje = $this -> validateData($cuenta);
        
        $utilidades = new Utilidades();

        if (empty($mensaje)) {
            $cuentaRepository = new CuentaRepository();
            
            return $utilidades -> datosRespuestaValidation("Registro de datos", $cuentaRepository -> registrar($cuenta));
            
        } else {
            return $utilidades -> datosRespuestaValidation("Validación de datos", $mensaje);
        }
    }
    

    public function validateData(Cuenta $cuenta) {

        if (is_null($cuenta -> contrasena) || empty($cuenta -> contrasena)) {
            return "Debe ingresar una contraseña";
        } else if (!(preg_match(Constantes::REGLA_CONTRASENA_LETRAS_1, $cuenta -> contrasena)
            && preg_match(Constantes::REGLA_CONTRASENA_LETRAS_2, $cuenta -> contrasena)
            && preg_match(Constantes::REGLA_CONTRASENA_NUMEROS, $cuenta -> contrasena))) {
            return "La contraseña debe tener letras y números";
        } else if (!preg_match(Constantes::REGLA_CONTRASENA_LONGITUD, $cuenta -> contrasena)) {
            return "La contraseña debe tener mínimo seis caracteres";
        } else if (is_null($cuenta -> notas) || empty($cuenta -> notas)) {
            return "Debe ingresar una nota";
        }

        return "";
    }

}