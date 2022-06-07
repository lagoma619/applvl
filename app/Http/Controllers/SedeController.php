<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\SedeService;
use App\Models\Sede;

class SedeController {

    public function getAll() {
        
        $sedeService = new SedeService();
        return $sedeService -> getAll();
    }

    public function getFindById(Request $request) {

        $sedeService = new SedeService();
        return $sedeService -> getFindById($request);
    }

    public function save(Request $request) {
        $sedeService = new SedeService();
        return response() -> json($sedeService -> save($request));
    }
}