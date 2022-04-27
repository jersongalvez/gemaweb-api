<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pqrs;
use App\Models\Generic;

class PqrsController extends Controller {
    
    public function __construct(request $request) {
      $this->PqrsModel = new Pqrs();
      $this->GenericModel = new Generic();
        
    }
    // RETORNA UN AFILIADO EN LA BASE DE DATOS PARA MOSTRARLO EN EL PRINCIPAL DE LOS PQRS
    public function search(request $request) {
      $tpdocumento = $request->input("tp_documento");
      $documento = $request->input("documento");
      $fecha_expedicion = $request->input("fecha_expedicion");
      $fechaAct = date("Y-m-d", strtotime($fecha_expedicion));

      $usuario = $this->PqrsModel->search($tpdocumento, $documento);
      
      if(count($usuario) > 0) {
         return response()->json([
           'usuario' => $usuario,
         ], 200); 
      }
      else {
         return "error";
      }
    }
    // RETORNA UNA QUEJA EN LA BUSQUEDA DE PQRS    
    public function searchPqrs() {
      $pqrs = $this->PqrsModel->searchPqrs();

      if (count($pqrs) > 0) {
         return response()->json([
            'pqrs' => $pqrs,
         ], 200);
      }
      else {
         return "error";
      }
    }
    // CREACION DE LA PRERADICACION DE LA QUEJA 
    public function create(request $request) {
      $consecutivo = $this->GenericModel->ultimoConsecutivo();
      $tpdocumento = $request->input("tpdocumento");
      $documento = $request->input("documento");
      $expedicion = $request->input("expedicion");
      $pnombre = $request->input("pnombre");
      $snombre  = $request->input("snombre");
      $papellido = $request->input("papellido");
      $sapellido = $request->input("sapellido");
      $nacimiento = $request->input("nacimiento");
      $edad = $request->input("edad");
      $sexo = $request->input("sexo");
      $poblacion = $request->input("poblacion");
      $etnico = $request->input("etnico");
      $pais = $request->input("pais");
      $departamento = $request->input("departamento");
      $municipio = $request->input("municipio");
      $direccion = $request->input("direccion");
      $celular = $request->input("celular");
      $telefono = $request->input("telefono");
      $resguardo = $request->input("resguardo");
      $comunidad = $request->input("comunidad");
      $correo = $request->input("correo");
      $ips = $request->input("ips");
      $area = $request->input("area");
      $zona = $request->input("zona");
      $descripcion = $request->input("descripcion");
      $paciente_rad = $request->input("paciente_rad");

      $pqrs = [
         "consecutivo" => $consecutivo,
         "tpdocumento" => $tpdocumento,
         "documento" => $documento,
         "expedicion" => $expedicion,
         "pnombre" => $pnombre,
         "snombre" => $snombre,
         "papellido" => $papellido,
         "sapellido" => $sapellido,
         "nacimiento" => $nacimiento,
         "edad" => $edad,
         "sexo" => $sexo,
         "poblacion" => $poblacion,
         "etnico" => $etnico,
         "pais" => $pais,
         "departamento" => $departamento,
         "municipio" => $municipio,
         "direccion" => $direccion,
         "celular" => $celular,
         "telefono" => $telefono,
         "resguardo" => $resguardo,
         "comunidad" => $comunidad,
         "correo" => $correo,
         "ips" => $ips,
         "area" => $area,
         "zona" => $zona,
         "descripcion" => $descripcion,
         "paciente_rad" => $paciente_rad
      ];
      $this->PqrsModel->create($pqrs);
      $this->createNovedades($pqrs);
    }
    // CREACION DE LA NOVEDAD PARA SER ENVIADO A EL AREA DE ASEGURAMIENTO
    public function createNovedades($pqrs) {
      $tpdocumento = $pqrs["tpdocumento"];
      $documento = $pqrs["documento"];
      $expedicion = $pqrs["expedicion"];
      $pnombre = $pqrs["pnombre"];
      $snombre  = $pqrs["snombre"];
      $papellido = $pqrs["papellido"];
      $sapellido = $pqrs["sapellido"];
      $nacimiento = $pqrs["nacimiento"];
      $edad = $pqrs["edad"];
      $sexo = $pqrs["sexo"];
      $poblacion = $pqrs["poblacion"];
      $etnico = $pqrs["etnico"];
      $resguardo = $pqrs["resguardo"];
      $comunidad = $pqrs["comunidad"];
      $pais = $pqrs["pais"];
      $departamento = $pqrs["departamento"];
      $municipio = $pqrs["municipio"];
      $direccion = $pqrs["direccion"];
      $zona = $pqrs["zona"];
      $celular = $pqrs["celular"];
      $telefono = $pqrs["telefono"];
      $correo = $pqrs["correo"];

      $novedades = [
        "tpdocumento" => $tpdocumento, 
        "documento" => $documento, 
        "expedicion" => $expedicion, 
        "pnombre" => $pnombre, 
        "snombre" => $snombre, 
        "papellido" => $papellido, 
        "sapellido" => $sapellido, 
        "nacimiento" => $nacimiento, 
        "edad" => $edad, 
        "sexo" => $sexo, 
        "poblacion" => $poblacion, 
        "etnico" => $etnico, 
        "resguardo" => $resguardo, 
        "comunidad" => $comunidad, 
        "pais" => $pais, 
        "departamento" => $departamento, 
        "municipio" => $municipio, 
        "direccion" => $direccion, 
        "zona" => $zona, 
        "celular" => $celular, 
        "telefono" => $telefono, 
        "correo" => $correo
      ]; 
      $this->PqrsModel->createNovedades($novedades);
    }
}
