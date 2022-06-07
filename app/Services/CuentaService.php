<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\CuentaRepository;
use App\Models\Cuenta;

class CuentaService {

    public function getAll() {

        $cuenta = new CuentaRepository();
        return $cuenta -> getAll();
    
    }


    public function getFindById(Request $request) {
        
        $cuenta = new CuentaRepository();
        return $cuenta -> getFindById($request);
    }


    public function getFindByCodeAndPassword(Request $request) {
        
        if (is_null($request -> contrasena) || empty($request -> contrasena)) {
            return "Debe ingresar una contraseña";

        } else if (is_null($request -> cod_persona) || empty($request -> cod_persona)) {
            return "Debe ingresar su número de identificación";

        } else {
            $cuentaRepository = new CuentaRepository();
            return $cuentaRepository -> getFindByCodeAndPassword($request);

            //echo "cuentas->contrasena " + $cuentaRepository;
            
            //if (hash_equals($cuentaRepository->contrasena, $request->contrasena)) {
            //    return $cuentaRepository;
            //} else {
            //    $cuentas = null;
            //return $cuentaRepository;
            //}
        }
    }


    public function save(Request $request) {

        $cuenta = new Cuenta();
        $cuenta -> cod_cuenta = $request -> cod_cuenta;
        $cuenta -> contrasena = $request -> contrasena;
        $cuenta -> estado = "Activo";
        $cuenta -> notas = $request -> notas;
        $cuenta -> cod_persona = $request -> cod_persona;
        $cuenta -> cod_tipos_cuenta = $request -> cod_tipos_cuenta;
        
        $mensaje = $this -> validateData($cuenta);

        if (empty($mensaje)) {
            $cuentaRepository = new CuentaRepository();
            return $cuentaRepository -> save($cuenta);
        } else {
            return $mensaje;
        }
    }
    

    public function validateData(Cuenta $cuenta) {

        if (is_null($cuenta -> contrasena) || empty($cuenta -> contrasena)) {
            return "Debe ingresar una contraseña";
        }

        return "";
    }

}