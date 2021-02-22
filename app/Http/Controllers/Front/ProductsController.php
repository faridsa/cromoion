<?php

namespace App\Http\Controllers\Front;
use App\Models\Product;
use App\Models\ProductCategory;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Arcanedev\SeoHelper\Traits\Seoable;

class ProductsController extends FrontBaseController
{
    //
    use Seoable;

    public function showEquipos(){
        $products = Product::where('category_id', 1)->where('visible', 1)->orderBy('name')->paginate(5);
        $this->seo()
        ->setTitle('Equipos para laboratorios')
        ->setDescription('Le presentamos nuestra oferta en equipos para laboratorios')
        ->setKeywords(['laboratorio', 'insumos para laboratorios', 'reactivos', 'equipos para laboratorios']);
        return view('public.equipos', compact('products'))->with('page', 'productos');
    }
     public function showEquipo($slug){
            $product = Product::where('visible', 1)->where('category_id', 1)->where('slug', $slug)->firstOrFail();
            if($product == null) {
                return redirect('/')->with('status', 'Lo sentimos, no se pudo encontrar la página indicada');
            }
            $description= preg_replace( "/\r|\n/", "", $product->description );
           
            $product->views ++;
            $product->save();
            $this->seo()
            ->setTitle(''. $product->name)
            ->setDescription($description)
            ->setKeywords(['laboratorio', 'insumos para laboratorios', 'reactivos', 'equipos para laboratorios']);
            return view('public.equipo', compact('product'))->with('page', 'productos');
        }   

    public function showReactivos(){
        $lineas = ProductCategory::where('parent_id', 2)->orderBy('name')->get();
        $this->seo()
            ->setTitle('Reactivos')
            ->setDescription('Le presentamos nuestra oferta en reactivos para laboratorios')
            ->setKeywords(['laboratorio', 'insumos para laboratorios', 'reactivos', 'equipos para laboratorios']);
        return view('public.reactivos', compact('lineas'))->with('page', 'productos');
    }

    public function showLineaReactivos($linea){
        $linea = ProductCategory::where('slug', $linea)->where('parent_id', 2)->with('children')->firstOrFail();
        $this->seo()
            ->setTitle('Reactivos')
            ->setDescription('Linea ' . $linea->name ?? '' .' a su disposición')
            ->setKeywords(['laboratorio', 'insumos para laboratorios', 'reactivos', 'equipos para laboratorios']);

        return view('public.reactivos-linea', compact('linea'))->with('page', 'productos');
    }

    public function showCategoriaReactivos($linea, $categoria){
        $linea = ProductCategory::where('slug', $linea)->where('parent_id', 2)->firstOrFail();
        $categoria = ProductCategory::where('slug', $categoria)->where('parent_id', $linea->id)->with('children')->firstOrFail();
        $this->seo()
            ->setTitle('Reactivos')
            ->setDescription('Linea ' . $linea->name .' / '. $categoria->name .' a su disposición')
            ->setKeywords(['laboratorio', 'reactivos para laboratorios', 'equipos para laboratorios']);
            $productos = Product::where('visible', 1)->where('category_id', $categoria->id)->orderBy('name')->get();
        return view('public.reactivos-categoria', compact('linea', 'categoria','productos'))->with('page', 'productos');
    }

   
     public function showReactivo($linea, $categoria, $slug){
            $product = Product::where('visible', 1)->where('slug', $slug)->firstOrFail();
            $linea = ProductCategory::where('slug', $linea)->where('parent_id', 2)->firstOrFail();
            $categoria = ProductCategory::where('slug', $categoria)->where('parent_id', $linea->id)->firstOrFail();
            $product->views ++;
            $product->save();
            $this->seo()
            ->setTitle('Reactivos')
            ->setDescription($linea->name .' ' . $product->name)
            ->setKeywords(['laboratorio', 'insumos para laboratorios', 'reactivos', 'equipos para laboratorios']);
            
            return view('public.producto', compact('product', 'linea', 'categoria'))->with('page', 'productos')->with('seccion', 'Reactivos');
        }   
    public function showInsumos(){
        $lineas = ProductCategory::where('parent_id', 2)->orderBy('name')->get();
        $this->seo()
            ->setTitle('Insumos para laboratorio')
            ->setDescription('Le presentamos nuestra oferta en reactivos para laboratorios')
            ->setKeywords(['laboratorio', 'insumos para laboratorios', 'reactivos', 'equipos para laboratorios']);
            
        return view('public.insumos', compact('lineas'))->with('page', 'productos');
    }

    public function showLineaInsumos($linea){
    	$linea = ProductCategory::where('slug', $linea)->where('parent_id', 2)->firstOrFail();
        $products = Product::where('category_id', $linea->id)->where('visible', 1)->orderBy('name')->get();
        $this->seo()
            ->setTitle('Insumos para laboratorio')
            ->setDescription('Línea ' . $linea->name .' a su disposición')
            ->setKeywords(['laboratorio', 'insumos para laboratorios', 'reactivos', 'equipos para laboratorios']);
            

        return view('public.insumos-linea', compact('linea', 'products'))->with('page', 'productos');
    }
     public function showInsumo($linea, $slug){
            $product = Product::where('visible', 1)->where('slug', $slug)->firstOrFail();
            $linea = ProductCategory::find($product->category_id);
            $seccion = ProductCategory::find($linea->parent_id);
            $product->views ++;
            $product->save();
            $this->seo()
            ->setTitle('Insumos para laboratorio')
            ->setDescription($linea->name .' ' . $product->name)
            ->setKeywords(['laboratorio', 'insumos para laboratorios', 'reactivos', 'equipos para laboratorios']);
            
            return view('public.producto', compact('product', 'seccion'))->with('page', 'productos');
        }   
    
}
