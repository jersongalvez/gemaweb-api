<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Login extends Model
{
    use HasFactory;

    public function buscarUsuarioContrasena() {
      $contrasena = DB::table('USUARIOS')
                  ->where("EMAIL", 'control.interno@pijaossalud.com.co')
                  ->where("COD_ESTADO_WEB", 'A')
                  ->get();
      return $contrasena;
    }

    // public function actualizarCodigo() {
    //     $token = DB::table('USUARIOS')
    //            ->where()
    // }
}
