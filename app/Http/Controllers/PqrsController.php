<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pqrs;
use App\Models\Generic;
use App\Http\Controllers\GoogleDriveController;
use App\Http\Controllers\EmailController;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\Storage;

class PqrsController extends Controller {

    public function __construct() {
      //INSTANCIA DE LOS MODELOS DE LA BASE DE DATOS
      $this->PqrsModel = new Pqrs();
      $this->GenericModel = new Generic();
      //INSTANCIA DE CONTROLADORES
      $this->Drive = new GoogleDriveController();
      $this->Email = new EmailController();

    }

    // RETORNA UN AFILIADO EN LA BASE DE DATOS PARA MOSTRARLO EN EL PRINCIPAL DE LOS PQRS
    public function search($tpdocumento, $documento) {
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
    public function searchPqrs($tpdocumento, $documento, $radicado) {
      $pqrs = $this->PqrsModel->searchPqrs($tpdocumento, $documento, $radicado);
        if(count($pqrs) > 0 ){
          return response()->json([
             'pqrs' => $pqrs,
          ], 200);
        }
        else {
          return "error";
        }

    }
    /*
    METODO ENCARGADO DE SUBIR ARCHIVO A LA CARPETA GOOGLE DRIVE
    folder = https://drive.google.com/drive/folders/1xztn-H9PeuYaorKvEeJI9vaqY_z6uww_?usp=sharing
    json   = peak-orbit-339412-6d518d3aefda.json
    clave  = 6d518d3aefdafb646084c455f2c00911c93f30b0
    cuenta = soportepqrs@soportespqrs.iam.gserviceaccount.com
    */
    // CREACION DE LA PRERADICACION DE LA QUEJA
    public function create(request $request) {
      $archivo = "NO ADJUNTADO";
      $consecutivo = $this->GenericModel->ultimoConsecutivo();
      $pqrs =  $request->post("pqrs");
      $paciente_rad = $request->input("paciente_rad");
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
      $poblacion = $request->input("poblacionespecial");
      $etnico = $request->input("grupoetnico");
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
      $cod_area = $request->input("cod_area");
      $zona = $request->input("zona");
      $descripcion = $request->input("descripcion");
      //SE RECUPERAN DATOS ENVIADOS DEL DOCUMENTO
      if($_FILES){
      $name = $_FILES["archivo"]["name"];
      $tipo = $_FILES["archivo"]["type"];
      $tmp_name = $_FILES["archivo"]["tmp_name"];
      $archivoAct = explode(".", $name);
      $FileId = $this->Drive->googleDriveFileUpload($tmp_name, $tipo, $archivoAct[0]);
      $archivo = "https://drive.google.com/open?id=". $FileId;
      }
      $pqrs = [
         "consecutivo" => $consecutivo,
         "pqrs" => $pqrs,
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
         "cod_area" => $cod_area,
         "zona" => $zona,
         "descripcion" => $descripcion,
         "paciente_rad" => $paciente_rad,
         "archivo" => $archivo
      ];
      $this->PqrsModel->create($pqrs);
      $this->createNovedades($pqrs);
      $this->GenericModel->actualizarConsecutivo("QUE", $consecutivo);

      return response()->json([
        "consecutivo" => $consecutivo,
        "archivo" => $archivo
      ]);
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
