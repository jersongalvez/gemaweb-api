<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function __construct(){

    }

    public function sendEmailNotification(request $request) {
        $pqrs = $request->post("pqrs");
        $nombre = $request->post("nombre");
        $tpdocumento =  $request->post("tpdocumento");
        $documento = $request->post("documento");
        $telefono = $request->post("telefono");
        $correo = $request->post("correo");
        $mensaje = $request->post("mensaje");
        $data = array(
            'pqrs' => $pqrs,
            'nombre'=> $nombre,
            'tpdocumento' => $tpdocumento,
            'documento' => $documento,
            'telefono' => $telefono,
            'correo' => $correo,
            'mensaje' => $mensaje,
        );
        // return $this->from('jerson.galvez@pijaossalud.com.co')
        // ->view('emails.notificaciones');
        // // $correo = new NotificacionesMailable;
        Mail::send('emails.notificaciones', $data, function ($message) {
         // $message->to('siau.tolima@pijaossalud.com.co', 'Notificaciones PQRS')->subject('Notificaciones PQRS');
            $message->to('jerson.galvez@pijaossalud.com.co', 'Notificaciones PQRS')->subject('Notificaciones PQRS');
        });

    }
}
