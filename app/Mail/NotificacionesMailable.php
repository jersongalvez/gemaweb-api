<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotificacionesMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = "Notificacion Pijaos salud";
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(){
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(){
        // $data = ["variable" => "variable"];
        return $this->view('emails.notificaciones');
    }
}
