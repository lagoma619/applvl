<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\DomicilioService;
use App\Models\Domicilio;

class DomicilioController {

    public function getAll() {
        
        $domicilioService = new DomicilioService();
        return $domicilioService -> getAll();
    }

    public function getFindById(Request $request) {

        $domicilioService = new DomicilioService();
        return $domicilioService -> getFindById($request);
    }

    public function save(Request $request) {
        $domicilioService = new DomicilioService();
        return response() -> json($domicilioService -> save($request));
    }
}