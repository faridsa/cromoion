<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SubscriptionForm extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $company;
    public $email;
    public $surname;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($request)
    {
        $this->name = $request->name;
        $this->surname = $request->surname;
        $this->company = $request->company;
        $this->email = $request->email;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        $subject = 'Nuevo suscriptor desde el sitio web';
        return $this->from('no-reply@cromoion.com.ar', 'Cromoion')
            ->subject($subject)
            ->view('public.emails.suscripcion')
            ->replyTo($this->email);
    }
}
