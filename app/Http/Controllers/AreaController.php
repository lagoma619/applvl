<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\AreaService;
use App\Models\Area;

class AreaController {

    public function buscarTodo() {
        
        $areaService = new AreaService();
        return response() -> json($areaService -> buscarTodo());
    }

    public function buscarPorCodigo(Request $request) {

        $areaService = new AreaService();
        return response() -> json($areaService -> buscarPorCodigo($request));
    }

    public function registrar(Request $request) {
        $areaService = new AreaService();
        return response() -> json($areaService -> registrar($request));
    }
}