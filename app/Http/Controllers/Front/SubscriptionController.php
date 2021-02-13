<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Subscription;
use App\Http\Requests\Admin\StoreSubscriptionRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\SubscriptionForm;


class SubscriptionController extends FrontBaseController
{
    //
 
  public function store(StoreSubscriptionRequest $request)
  {

    if( (time() - intval($request->get('token2'))) > 5 && !$request->get('destino') ):
      $mensaje = Subscription::create($request->all());   
      $target = env('TARGET_SUBSCRIPTION_FORM');
      try {
        Mail::to($target)->queue(new SubscriptionForm($request));

      } catch (Exception $e) {
        if (count(Mail::failures()) > 0) {
          $result  =  'No se pudo enviar el mensaje, por favor intenta enviando un mensaje directo a '.env('TARGET_SUBSCRIPTION_FORM');
          return redirect()->back()->with('status', $result);
        }
      }

    return redirect('/')->with('status', 'Su mensaje ha sido enviado. Será agregado a nuestro listado de suscriptores. Muchas gracias.');  
  endif;

  return redirect('/');
}
}
