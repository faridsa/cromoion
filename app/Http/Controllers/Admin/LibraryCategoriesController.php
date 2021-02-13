<?php

namespace App\Http\Controllers\Admin;

use App\Models\LibraryCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreLibraryCategoriesRequest;
use App\Http\Requests\Admin\UpdateLibraryCategoriesRequest;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class LibraryCategoriesController extends Controller
{
    /**
     * Display a listing of LibraryCategory.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('library_category_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('library_category_delete')) {
                return abort(401);
            }
            $library_categories = LibraryCategory::onlyTrashed()->get();
        } else {
            $library_categories = LibraryCategory::all();
        }

        return view('admin.library_categories.index', compact('library_categories'));
    }

    /**
     * Show the form for creating new LibraryCategory.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('library_category_create')) {
            return abort(401);
        }
        return view('admin.library_categories.create');
    }

    /**
     * Store a newly created LibraryCategory in storage.
     *
     * @param  \App\Http\Requests\StoreLibraryCategoriesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLibraryCategoriesRequest $request)
    {
        if (! Gate::allows('library_category_create')) {
            return abort(401);
        }
        $library_category = LibraryCategory::create($request->all());



        return redirect()->route('admin.library_categories.index');
    }


    /**
     * Show the form for editing LibraryCategory.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('library_category_edit')) {
            return abort(401);
        }
        $library_category = LibraryCategory::findOrFail($id);

        return view('admin.library_categories.edit', compact('library_category'));
    }

    /**
     * Update LibraryCategory in storage.
     *
     * @param  \App\Http\Requests\UpdateLibraryCategoriesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLibraryCategoriesRequest $request, $id)
    {
        if (! Gate::allows('library_category_edit')) {
            return abort(401);
        }
        $library_category = LibraryCategory::findOrFail($id);
        $library_category->update($request->all());



        return redirect()->route('admin.library_categories.index');
    }


    /**
     * Display LibraryCategory.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('library_category_view')) {
            return abort(401);
        }
        $library_items = \App\LibraryItem::where('category_id', $id)->get();

        $library_category = LibraryCategory::findOrFail($id);

        return view('admin.library_categories.show', compact('library_category', 'library_items'));
    }


    /**
     * Remove LibraryCategory from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('library_category_delete')) {
            return abort(401);
        }
        $library_category = LibraryCategory::findOrFail($id);
        $library_category->delete();

        return redirect()->route('admin.library_categories.index');
    }

    /**
     * Delete all selected LibraryCategory at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('library_category_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = LibraryCategory::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore LibraryCategory from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('library_category_delete')) {
            return abort(401);
        }
        $library_category = LibraryCategory::onlyTrashed()->findOrFail($id);
        $library_category->restore();

        return redirect()->route('admin.library_categories.index');
    }

    /**
     * Permanently delete LibraryCategory from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('library_category_delete')) {
            return abort(401);
        }
        $library_category = LibraryCategory::onlyTrashed()->findOrFail($id);
        $library_category->forceDelete();

        return redirect()->route('admin.library_categories.index');
    }
}
