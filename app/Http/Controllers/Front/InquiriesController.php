<?php

namespace App\Http\Controllers\Front;

use App\Models\Inquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreInquiriesRequest;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\InquiryForm;

class InquiriesController extends FrontBaseController
{
    /**
     * Display a listing of Inquiry.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function store(StoreInquiriesRequest $request)
    {   
        $control = time() -  $request->token2;
        if( ($control) > 5 ):
            //if($request->get('product') == trim($request->get('url'))): 
                $inquiry = Inquiry::create($request->all());
                $target = env('TARGET_INQUIRY_FORM');
                Mail::to($target)->queue(new InquiryForm($request));
                return back()->with('status', 'Su pedido de información ha sido enviado. Le responderemos lo antes posible. Muchas gracias.');  
            //endif;
        endif;
        \Session::flush();
        return redirect('/');
    }


}
