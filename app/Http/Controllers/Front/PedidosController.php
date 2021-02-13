<?php

namespace App\Http\Controllers\Front;

use App\Models\Pedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Front\StorePedidosRequest;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderForm;
class PedidosController extends FrontBaseController
{
    /**
     * Display a listing of Pedido.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enum_tipo_de_producto = array_add(Pedido::$enum_tipo_de_producto, 'otro','Otro');
        return view('public.pedido', compact('enum_tipo_de_producto'));
    }

    /**
     * Show the form for creating new Pedido.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created Pedido in storage.
     *
     * @param  \App\Http\Requests\StorePedidosRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePedidosRequest $request)
    {

        if( (time() - intval($request->get('token2'))) > 5 && !$request->get('url') ):
        $tipo_de_producto =  ($request->get('tipo_de_producto') == 'otro' ) ? $request->get('otro') : $request->get('tipo_de_producto');
        $request->merge(['tipo_de_producto' => $tipo_de_producto]);
        $pedido = Pedido::create($request->all());

        $target = env('TARGET_ORDER_FORM');

        \Mail::to($target)->queue(new OrderForm($request));
          
        return redirect('/')->with('status', 'Tu pedido ha sido enviado. Te responderemos lo antes posible. Muchas gracias.');  
       
       endif;
       return redirect('/');
    }


}
