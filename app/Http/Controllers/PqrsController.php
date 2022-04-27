<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pqrs;

class PqrsController extends Controller {
    
    public function __construct(request $request) {
       $this->PqrsModel = new Pqrs();
        
    }
    public function search(request $request) {
       return $this->PqrsModel->search();
    }

    public function create(request $request) {

    }

    public function CreateNovedades(request $request) {

    }

    public function searchRequest() {

    }

     
}
