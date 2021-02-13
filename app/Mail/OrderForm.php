<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderForm extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $nombre;
    public $empresa;
    public $email;
    public $telefono;
    public $tipo_de_producto;
    public $comentarios;


    public function __construct($request)
    {
        $this->nombre = $request->nombre;
        $this->empresa = $request->empresa;
        $this->email = $request->email;
        $this->telefono = $request->telefono;
        $this->tipo_de_producto = $request->tipo_de_producto;
        $this->comentarios = $request->comentarios;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = 'Pedido de productos desde el sitio web';
        return $this->from('no-reply@cromoion.com.ar', 'Cromoion')
            ->subject($subject)
            ->view('public.emails.pedido')
            ->replyTo($this->email);
    }
}
