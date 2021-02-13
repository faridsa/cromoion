<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use App\Models\Message;
use App\Models\Inquiry;
use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contactos = Message::latest()->take(5)->get();
        $suscriptores = Subscription::latest()->take(5)->get();
        $consultas = Inquiry::latest()->take(5)->get();
        return view('admin.home', compact(['contactos','suscriptores','consultas']));
    }
}
