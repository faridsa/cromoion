<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class InquiryForm extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $name;
    public $company;
    public $email;
    public $phone;
    public $product;


    public function __construct($request)
    {
        $this->name = $request->name;
        $this->company = $request->company;
        $this->email = $request->email;
        $this->phone = $request->phone;
        $this->product = $request->product;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = 'Pedido de información desde el sitio web';
        return $this->from('no-reply@cromoion.com.ar', 'Cromoion')
            ->subject($subject)
            ->view('public.emails.informacion')
            ->replyTo($this->email);
    }

}
