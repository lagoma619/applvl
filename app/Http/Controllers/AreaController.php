<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\AreaService;
use App\Models\Area;

class AreaController {

    public function getAll() {
        
        $areaService = new AreaService();
        return $areaService -> getAll();
    }

    public function getFindById(Request $request) {

        $areaService = new AreaService();
        return $areaService -> getFindById($request);
    }

    public function save(Request $request) {
        $areaService = new AreaService();
        return response() -> json($areaService -> save($request));
    }
}