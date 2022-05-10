<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//CARGAR LOS ARCHIVOS PARA EL ENVIO DE EMAIL
use App\Mail\NotificacionesMailable;
use Illuminate\Support\Facades\Mail;
class EmailController extends Controller{

    public function __construct(){

    }

    public function sendEmailNotification(request $request) {
        // $correo = new NotificacionesMailable;
        // Mail::to('jerson.galvez@pijaossalud.com.co')->send($correo);
        $nombre = $request->post("nombre");
        $tpdocumento =  $request->post("tpdocumento");
        $documento = $request->post("documento");
        $telefono = $request->post("telefono");
        $correo = $request->post("correo");
        $mensaje = $request->post("mensaje");
        $data = array(
            'nombre'=> $nombre,
            'tpdocumento' => $tpdocumento,
            'documento' => $documento,
            'telefono' => $telefono,
            'correo' => $correo,
            'mensaje' => $mensaje,
        );
        // // $correo = new NotificacionesMailable;
        Mail::send('emails.notificaciones', $data, function ($message) {
            $message->to('jerson.galvez@pijaossalud.com.co', 'Notificaciones PQRS');
        });
    }
}
