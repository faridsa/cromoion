<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Arcanedev\SeoHelper\Traits\Seoable;

use App\Models\Product;
use App\Models\ProductCategory;

class SearchController extends FrontBaseController
{
    use Seoable;
    public function search(Request $request)
    {
    	$error ='No se encontraron resultados por favor intente con otros términos.';
        // Making sure the user entered a keyword.
        if($request->has('q')) {

            // Using the Laravel Scout syntax to search the products table.
            $categories = ProductCategory::all();
            $results = Product::search($request->get('q'))->get();
            $results->load('category');
            $results->sortBy('category_id');
            if( !$results->count() ){
            	return redirect()->back()->with('status', $error); 
            }
        	$this->seo()
	        ->setTitle('Bienvenido a Cromoion')
	        ->setDescription('Conozca las últimas novedades en insumos, reactivos y equipos para laboratorios')
	        ->setKeywords(['laboratorio', 'insumos para laboratorios', 'reactivos', 'equipos para laboratorios']);

        	return view('public.resultados', compact('results', 'categories'))->with('page', 'productos');

			}
		return redirect()->back()->with('status', $error);  
	}
}
