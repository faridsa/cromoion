<?php

namespace App\Http\Controllers\Front;
use App\Models\ContentPage;
use App\Models\ContentCategory;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Arcanedev\SeoHelper\Traits\Seoable;

class NewsController extends FrontBaseController
{
    //
    use Seoable;

    public function index(){
        $news = ContentPage::where('visible', 1)->where('category_id','<>',3)->paginate(5);
        $this->seo()
        ->setTitle('Novedades')
        ->setDescription('Nuevos productos y noticias de interes')
        ->setKeywords(['laboratorio', 'reactivos para laboratorios', 'equipos para laboratorios']);
        return view('public.novedades', compact('news'))->with('page', 'novedades');
    }

    public function showCat($cat)
    {
        $category = ContentCategory::where('slug', $cat)->first();
        $news = ContentPage::where('visible', 1)->where('category_id', $category->id)->get();
        $this->seo()
        ->setTitle('Información / '. $category->title)
        ->setDescription('Nuevos productos y noticias de interes')
        ->setKeywords(['laboratorio', 'reactivos para laboratorios', 'equipos para laboratorios']);
        return view('public.novedades', compact('category', 'news'));
    }

    public function showNota($cat, $slug){
    	$item = ContentPage::where('visible', 1)->where('slug', $slug)->first();
        $item->views ++;
        $item->save();
    	$this->seo()
        ->setTitle($item->title)
        ->setDescription($item->excerpt)
        ->setKeywords(['laboratorio', 'reactivos para laboratorios', 'equipos para laboratorios']);
        return view('public.nota', compact('item'));
    }
}
