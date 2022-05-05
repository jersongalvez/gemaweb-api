<?php

namespace App\Http\Controllers;

use App\Models\Generic;
use Illuminate\Http\Request;

class GenericController extends Controller {

    public function __construct(request $request) {
        $this->GenericModel = new Generic();

     }
    //METODO QUE RETORNA TODOS LOS TIPO DE DOCUMENTOS
    public function tipoDocumentos() {
       return $this->GenericModel->tipoDocumentos();
    }
    //METODO QUE RETORNA TODOS LOS GRUPO DE POBLACION
    public function grupoPoblacion() {
       return $this->GenericModel->grupoPoblacion();
    }
    // METODO QUE RETORNA TODOS LOS GRUPOS ETNICOS
    public function grupoEtnico() {
       return $this->GenericModel->grupoEtnico();
    }
    //METODO QUE RETORNA TODOS LOS DEPARTAMENTOS
    public function departamentos() {
        return $this->GenericModel->departamentos();
    }
    //METODO QUE RETORNA TODAS LA CIUDADES
    public function ciudades() {
        return $this->GenericModel->ciudades();
    }
    //METODO QUE RETORNA TODAS LAS AREAS DE LA EPSI
    public function areas() {
        return $this->GenericModel->areas();
    }
    //METODO QUE RETORNA EL ULTIMO CONSECUTIVO DE LA PQRS
    public function ultimoConsecutivo() {
        return $this->GenericModel->ultimoConsecutivo();
    }
    //METODO QUE RETORNA TODOS LOS PRESTADORES IPS
    public function prestadores() {
        return $this->GenericModel->prestadores();
    }
    //METODO QUE RETORNA TODOS LOS TIPOS DE SEXOS
    public function tiposSexos() {
        return $this->GenericModel->tiposSexos();
    }
    //METODO QUE RETORNA LAS ZONAS
    public function zonas() {
        return $this->GenericModel->zonas();
    }
}
