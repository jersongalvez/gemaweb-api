<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Generic extends Model
{
    use HasFactory;

    //CONSULTA A LA BASE DE DATOS ENCARGADA DE RETORNAR TODOS LOS TIPOS DE DOCUMENTOS CON ESTADO = 0
    public function tipoDocumentos ($estado = 0) {
        $tipodocumentos = DB::table("TIPOS_DOCUMENTOS")->where("EST_DOCUMENTO", $estado)->orderBy("NOM_DOCUMENTO", "ASC")->get();

        return $tipodocumentos;
    }
    //CONSULTA ENCARGADA DE RETORNAR EL GRUPO DE POBLACION ESPECIAL DE LOS USUARIOS
    public function grupoPoblacion() {
        $grupoPoblacion = DB::table("POBLACIONESPECIAL_PQRSF")->orderBy("NOMPOBLACION", "ASC")->get();

        return $grupoPoblacion;
    }
    //CONSULTA ENCARGADA DE RETORNAR EL GRUPO ETNICO DE LOS USUARIOS
    public function grupoEtnico() {
        $grupoPoblacion = DB::table("GRUPOETNICO_PQRSF")->orderBy("NOMBRE", "ASC")->get();

        return $grupoPoblacion;
    }
    //CONSULTA ENCARGADA DE RETORNAR LOS DEPARTAMENTOS
    public function departamentos() {
        $departamento = DB::table("DEPARTAMENTOS")->orderBy("NOM_DEPARTAMENTO", "ASC")->get();

        return $departamento;
    }
    //CONSULTA ENCARGADA DE RETORNAR LAS CIUDADES
    public function ciudades() {
        $ciudades = DB::table("CIUDADES")->orderBy("NOM_CIUDAD", "ASC")->get();

        return $ciudades;
    }
    //CONSULTA ENCARGADA DE RETORNAR LAS AREAS DE LA EMPRESA
    public function areas($estado = 'A') {
        $areas = DB::table("AREAS_EMPRESA")->where("EST_AREA", $estado)->get();

        return $areas;
    }
    //CONSULTA ENCARGADA DE RETORNAR EL ULTIMO CONSECUTIVO
    public function ultimoConsecutivo() {
        $consecutivo = DB::table("QUEJAS")->max("CONSECUTIVO") + 1;

        return $consecutivo;
    }
    //METODO ENCARGADO DE ACTUALIZAR LOS CONSECUTIVOS DE LA EPSI
    public function actualizarConsecutivo($tipo, $consecutivo) {
      DB::table("CONSECUTIVOS")
      ->where("TIP_RADICACION", $tipo)
      ->update([
        "CON_RADICACION" => $consecutivo
      ]);
    }
    //CONSULTA ENCARGADA DE RETORNAR TODOS LOS PRESTADORES IPS
    public function prestadores() {
        $prestadores = DB::table("PRESTADORES")->orderBy("NOM_PRESTADOR", "ASC")->get();

        return $prestadores;
    }
    // CONSULTA ENCARGADA DE RETORNAR TODOS LOS TIPOS DE SEXO
    public function tiposSexos() {
        $sexos = DB::table("SEXOS")->get();

        return $sexos;
    }
    // CONSULTA ENCARGADA DE RETORNAR TODOS LAS ZONAS
    public function zonas() {
        $zonas = DB::table("ZONAS")->get();

        return $zonas;
    }
}
