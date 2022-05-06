<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//CARGAR LOS ARCHIVOS PARA EL ENVIO DE EMAIL
use App\Mail\NotificacionesMailable;
use Illuminate\Support\Facades\Mail;
class EmailController extends Controller{

    public function __construct(){

    }

    public function sendEmailNotification() {
        $correo = new NotificacionesMailable;
        Mail::to('jerson.galvez@pijaossalud.com.co')->send($correo);

        return "mensaje enviado";
    }
}
