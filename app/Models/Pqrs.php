<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pqrs extends Model
{
    use HasFactory;

    //METODO QUE SE ENCARGA DE HACER LA BUSQUEDA EN LA BASE DE DATOS DE EL USAURIO
    public function search($tpdocumento, $documento) {
        $user = DB::table('AFILIADOSSUB')
              ->join("DEPARTAMENTOS", "AFILIADOSSUB.NUM_DEPARTAMENTO", "=", "DEPARTAMENTOS.COD_DEPARTAMENTO")
              ->join("CIUDADES", "AFILIADOSSUB.NUM_CIUDAD", "=", "CIUDADES.COD_CIUDAD")
              ->select("AFILIADOSSUB.PRI_APELLIDO", "AFILIADOSSUB.SEG_APELLIDO", "AFILIADOSSUB.PRI_NOMBRE", "AFILIADOSSUB.NOM_NOMBRE", "AFILIADOSSUB.FEC_NACIMIENTO", "AFILIADOSSUB.SEXO", "CIUDADES.COD_CIUDAD", "DEPARTAMENTOS.COD_DEPARTAMENTO")
              ->where("AFILIADOSSUB.TIP_DOCUMENTO_BEN", $tpdocumento)
              ->where("AFILIADOSSUB.NUM_DOCUMENTO_BEN", $documento)
              ->where("AFILIADOSSUB.EST_AFILIADO", 1)
              ->limit(1)
              ->get();
        return $user;
      }

      //METODO QUE SE ENCARGA DE BUSCAR LA PQRS
      public function searchPqrs($tpdocumento , $documento, $radicado) {
        $pqrs = DB::table("QUEJAS")
              ->join("TRAMITE_QUEJAS", "QUEJAS.CONSECUTIVO", "TRAMITE_QUEJAS.CONSECUTIVO")
              ->join("ESTADOS_QUEJA", "QUEJAS.COD_ESTADO", "ESTADOS_QUEJA.COD_EST_QUEJA")
              ->select("QUEJAS.DETALLE", "QUEJAS.SOL_ESPERADA", "QUEJAS.PRI_NOMBRE", "QUEJAS.SEG_NOMBRE", "QUEJAS.PRI_APELLIDO", "QUEJAS.SEG_APELLIDO", "QUEJAS.CELULAR1", "QUEJAS.CORREOEMAIL", "QUEJAS.DIRECCION", "QUEJAS.FECHA_REGISTRO","QUEJAS.DOCUMENTO_RESPUESTA", "TRAMITE_QUEJAS.DES_SOLUCION", "ESTADOS_QUEJA.DES_EST_QUEJA")
              ->where("QUEJAS.TP_DOC_AFI", $tpdocumento)
              ->where("QUEJAS.NM_DOC_AFI", $documento)
              ->where("QUEJAS.CONSECUTIVO", $radicado)
              ->orderBy("TRAMITE_QUEJAS.ID_TRANSACCION", "ASC")
              ->get();

        return $pqrs;
      }

      //METODO QUE SE ENCARGA DE CREAR EN LA BASE DE DATOS LA PQRS
      public function create($datos) {
        $id = DB::table('QUEJAS')->insertGetId([
          "COD_AREA_REF" => $datos["pqrs"],
          "CONSECUTIVO" => $datos["consecutivo"],
          "TP_DOC_AFI" => $datos["tpdocumento"],
          "NM_DOC_AFI" => $datos["documento"],
          "DETALLE" => $datos["descripcion"],
          "PRI_NOMBRE" => $datos["pnombre"],
          "SEG_NOMBRE" => $datos["snombre"],
          "PRI_APELLIDO" => $datos["papellido"],
          "SEG_APELLIDO"=> $datos["sapellido"],
          "COD_CIUDAD" => $datos["municipio"],
          "COD_DEPTO" => $datos["departamento"],
          "TELEFONO" => $datos["telefono"],
          "DIRECCION" => $datos["direccion"],
          "URL_DOCUMENTOS" => $datos["archivo"],
          "COD_POBLACIONESPECIAL" => $datos["poblacion"],
          "COD_GRUPOETNICO" => $datos["etnico"],
          "CELULAR1" => $datos["celular"],
          "CORREOEMAIL" => $datos["correo"],
          "COD_IPS_QUEJA" => $datos["ips"],
          "COD_AREA_QUEJA" => $datos["area"],
          "COD_QUEJA_DE" => $datos["cod_area"],
          "FEC_RAD_QUEJA" => date("Y-d-m"),
          "FECHA_REGISTRO" => date("Y-d-m"),
          "COD_ESTADO" => "05",
          "COD_CLA" => "01",
          "NUM_FORMULARIO" => $datos["consecutivo"],
          "COD_PACIENTE_RAD" => $datos["paciente_rad"],
          "FECHA_NACIMIENTO" => $datos["nacimiento"],
          "EDAD" => $datos["edad"],
          "SEXO" => $datos["sexo"],
        ]);

          return $id;
      }

      //METODO QUE SE ENCARGA DE CREAR LA NOVEDAD DE ACTUALIZACION DE DATOS DEL USUARIO
      public function createNovedades($datos) {
        DB::table("NOVEDADES_PQRS")->insert([
          "TP_DOCUMENTO" => $datos["tpdocumento"],
          "DOCUMENTO" => $datos["documento"],
          "FEC_EXPEDICION" => date("Y-m-d", strtotime($datos["expedicion"])),
          "PRI_NOMBRE" => $datos["pnombre"],
          "SEG_NOMBRE" => $datos["snombre"],
          "PRI_APELLIDO" => $datos["papellido"],
          "SEG_APELLIDO"=> $datos["sapellido"],
          "FECHA_NACIMIENTO"=> date("Y-m-d", strtotime($datos["nacimiento"])),
          "EDAD"=> $datos["edad"],
          "SEXO"=> $datos["sexo"],
          "POBLACION_ESPECIAL" => $datos["poblacion"],
          "GRUPO_ETNICO" => $datos["etnico"],
          "RESGUARDO" => $datos["resguardo"],
          "COMUNIDAD" => $datos["comunidad"],
          "PAIS" => $datos["pais"],
          "DEPARTAMENTO" => $datos["departamento"],
          "MUNICIPIO" => $datos["municipio"],
          "ZONA" => $datos["zona"],
          "DIRECCION" => $datos["direccion"],
          "CELULAR" => $datos["celular"],
          "TELEFONO" => $datos["telefono"],
          "CORREO" => $datos["correo"],
          "ESTADO" => "1"
        ]);
      }
}
