<?php

namespace App\Http\Controllers\Front;
use App\Models\ContentPage;
use App\Models\Manufacturer;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Arcanedev\SeoHelper\Traits\Seoable;

class InfoController extends FrontBaseController
{
    //
    use Seoable;

    public function showContent($slug){
        if($slug == 'fabricantes'){
            $marcas = Manufacturer::all();
            $this->seo()
            ->setTitle('Somos representes de las siguientes marcas')
            ->setDescription('Marcas que representamos')
            ->setKeywords(['laboratorio', 'insumos para laboratorios', 'reactivos', 'equipos para laboratorios']);
            return view('public.institucional-fabricantes', compact('marcas'))->with('page', 'institucional');
        } else {
        	$item = ContentPage::where('visible', 1)->where('slug', $slug)->first();
            $item->views ++;
            $item->save();
            $arr = explode("</p>", $item->page_text);
            $parrafo = sizeof($arr)>0 ?  $arr[0] : 'Conozca las últimas novedades en reactivos y equipos para laboratorios. Somos representantes de las marcas más importantes';
            $description = $item->excerpt ? : $parrafo;
        	$this->seo()
            ->setTitle($item->title)
            ->setDescription($description)
            ->setKeywords(['laboratorio', 'insumos para laboratorios', 'reactivos', 'equipos para laboratorios']);
            return view('public.nota', compact('item'));
        }
    }
}
