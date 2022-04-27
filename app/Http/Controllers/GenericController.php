<?php

namespace App\Http\Controllers;

use App\Models\Generic;
use Illuminate\Http\Request;

class GenericController extends Controller {

    public function __construct(request $request) {
        $this->GenericModel = new Generic();
         
     }
    
    public function tipoDocumentos() {
       return $this->GenericModel->tipoDocumentos();  
    }

    public function grupoPoblacion() {
       return $this->GenericModel->grupoPoblacion();
    }

    public function grupoEtnico() {
       return $this->GenericModel->grupoEtnico();  
    }

    public function departamentos() {
        return $this->GenericModel->departamentos();
    }

    public function ciudades() {
        return $this->GenericModel->ciudades();
    }

    public function areas() {
        return $this->GenericModel->areas();
    }

    public function ultimoConsecutivo() {
        return $this->GenericModel->ultimoConsecutivo();
    }

    public function prestadores() {
        return $this->GenericModel->prestadores();
    }

    public function tiposSexos() {
        return $this->GenericModel->tiposSexos();
    }

    public function zonas() {
        return $this->GenericModel->zonas();
    }
}
