<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactForm extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $company;
    public $email;
    public $phone;
    public $address;
    public $zip;
    public $city;
    public $state;
    public $country;
    public $comments;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($request)
    {
        $this->name = $request->name;
        $this->company = $request->company;
        $this->email = $request->email;
        $this->phone = $request->phone;
        $this->address = $request->address;
        $this->zip = $request->zip;
        $this->city = $request->city;
        $this->state = $request->state;
        $this->country = $request->country;
        $this->comments = $request->comments;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        $subject = 'Mensaje desde el sitio web';
        return $this->from('no-reply@cromoion.com.ar', 'Cromoion')
            ->subject($subject)
            ->view('public.emails.contacto')
            ->replyTo($this->email);
    }
}
