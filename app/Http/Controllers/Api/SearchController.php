<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class SearchController extends Controller
{
   public function search(Request $request)
    {
    	$error = ['error' => 'No se encontraron resultados por favor intente con otros términos.'];

        // Making sure the user entered a keyword.
        if($request->has('q')) {

            // Using the Laravel Scout syntax to search the products table.
            $posts = Product::search($request->get('q'))->get();
            $posts->load('category');
            // If there are results return them, if none, return the error message.
        	return $posts->count() ? $posts : $error;
			}
		return $error;
	}
}
