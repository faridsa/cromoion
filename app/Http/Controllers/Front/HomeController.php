<?php

namespace App\Http\Controllers\Front;

use App\Models\ContentCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Arcanedev\SeoHelper\Traits\Seoable;


class HomeController extends FrontBaseController{
	use Seoable;
	public function index()
	{
		$this->seo()
        ->setTitle('Bienvenido a Cromoion')
        ->setDescription('Conozca las últimas novedades en insumos, reactivos y equipos para laboratorios')
        ->setKeywords(['laboratorio', 'insumos y reactivos para laboratorios', 'equipos para laboratorios']);
		$slideshow = \App\Models\Slideshow::where('published', 1)->orderBy('order')->get();
		$news = \App\Models\ContentPage::where('visible', 1)->where('featured',1)->where('id','>',1)->orderBy('order')->get();
		$products = \App\Models\Product::where('visible', 1)->where('featured',1)->with('category')->latest()->get();
		return view('public.home', compact(['slideshow','news','products']));
	}
}