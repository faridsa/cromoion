<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\LibraryItem;
use App\Models\LibraryCategory;

class LibraryController extends FrontBaseController
{
    //
	public function index()
	{
		$files = LibraryItem::published()->orderBy('category_id')->get();
		$categories = LibraryCategory::where('id','>',1)->orderBy('name')->get();
		return view('public.biblioteca', compact('files', 'categories'))->with('page', 'biblioteca');
	}

    public function download($uuid)
	{
	    $file = LibraryItem::where('uuid', $uuid)->firstOrFail();
	    $file->downloads ++;
	    $file->save();
	    $pathToFile = public_path('pdf/' . $file->pdf);
	    if(file_exists($pathToFile)){
	    	return response()->download($pathToFile);
	    } else {
	    	abort(404);
	    }
	    
	}

}
