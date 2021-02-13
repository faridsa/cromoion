<?php 

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Jenssegers\Agent\Agent;
use Illuminate\Support\Facades\DB;

class FrontBaseController extends Controller
{

public function __construct()
    {
        
        $cats_info = \App\Models\ContentCategory::
            where('slug', '<>', 'institucional')
            ->get();

        $browser = new Agent();
        $config_vars = \App\Models\Setting::all()->pluck('value', 'key');

        \View::share('cats_info', $cats_info);
        \View::share('browser', $browser);
        \View::share('config_vars', $config_vars);
    }


}

