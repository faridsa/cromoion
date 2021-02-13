<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Http\Requests\Front\StoreMessagesRequest;
use Arcanedev\SeoHelper\Traits\Seoable;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactForm;


class ContactController extends FrontBaseController
{
    //
  use Seoable;
  public function index()
  {
    $this->seo()
    ->setTitle('Vías de contacto con Cromoion')
    ->setDescription('Estos son nuestros teléfonos y direcciones de email')
    ->setKeywords(['laboratorio', 'insumos para laboratorios', 'reactivos', 'equipos para laboratorios']);
    return view('public.contacto');
  }

  public function store(StoreMessagesRequest $request)
  {

    if( (time() - intval($request->get('token2'))) > 5 && !$request->get('destino') ):
      $mensaje = Message::create($request->all());   
      $target = env('TARGET_CONTACT_FORM');
      try {
        Mail::to($target)->queue(new ContactForm($request));

      } catch (Exception $e) {
        if (count(Mail::failures()) > 0) {
          $result  =  'No se pudo enviar el mensaje, por favor intenta enviando un mensaje directo a '.env('TARGET_CONTACT_FORM');
          return redirect()->back()->with('status', $result);
        }
      }

    return redirect('/')->with('status', 'Su mensaje ha sido enviado. Le responderemos lo antes posible. Muchas gracias.');  
  endif;

  return redirect('/');
}
}
