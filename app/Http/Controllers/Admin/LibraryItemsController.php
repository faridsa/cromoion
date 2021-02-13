<?php

namespace App\Http\Controllers\Admin;

use App\Models\LibraryItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreLibraryItemsRequest;
use App\Http\Requests\Admin\UpdateLibraryItemsRequest;
use App\Http\Controllers\Traits\FileUploadTrait;
use Webpatser\Uuid\Uuid;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class LibraryItemsController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of LibraryItem.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('library_item_access')) {
            return abort(401);
        }

        if (request('show_deleted') == 1) {
            if (! Gate::allows('library_item_delete')) {
                return abort(401);
            }
            $library_items = LibraryItem::onlyTrashed()->get();
        } else {
            $library_items = LibraryItem::all();
        }

        return view('admin.library_items.index', compact('library_items'));
    }

    /**
     * Show the form for creating new LibraryItem.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('library_item_create')) {
            return abort(401);
        }
        
        $categories = \App\Models\LibraryCategory::get()->pluck('name', 'id')->prepend('Seleccione', '');

        return view('admin.library_items.create', compact('categories'));
    }

    /**
     * Store a newly created LibraryItem in storage.
     *
     * @param  \App\Http\Requests\StoreLibraryItemsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLibraryItemsRequest $request)
    {
        if (! Gate::allows('library_item_create')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $item = $request->all();
        $item['uuid'] = (string)Uuid::generate();
        $library_item = LibraryItem::create($item);
        return redirect()->route('admin.library_items.index');
    }


    /**
     * Show the form for editing LibraryItem.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('library_item_edit')) {
            return abort(401);
        }
        
        $categories = \App\Models\LibraryCategory::get()->pluck('name', 'id')->prepend('Seleccione', '');

        $library_item = LibraryItem::findOrFail($id);

        return view('admin.library_items.edit', compact('library_item', 'categories'));
    }

    /**
     * Update LibraryItem in storage.
     *
     * @param  \App\Http\Requests\UpdateLibraryItemsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLibraryItemsRequest $request, $id)
    {
        if (! Gate::allows('library_item_edit')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $library_item = LibraryItem::findOrFail($id);
        $library_item->update($request->all());



        return redirect()->route('admin.library_items.index');
    }


    /**
     * Display LibraryItem.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('library_item_view')) {
            return abort(401);
        }
        $library_item = LibraryItem::findOrFail($id);

        return view('admin.library_items.show', compact('library_item'));
    }


    /**
     * Remove LibraryItem from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('library_item_delete')) {
            return abort(401);
        }
        $library_item = LibraryItem::findOrFail($id);
        $library_item->delete();

        return redirect()->route('admin.library_items.index');
    }

    /**
     * Delete all selected LibraryItem at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('library_item_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = LibraryItem::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore LibraryItem from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('library_item_delete')) {
            return abort(401);
        }
        $library_item = LibraryItem::onlyTrashed()->findOrFail($id);
        $library_item->restore();

        return redirect()->route('admin.library_items.index');
    }

    /**
     * Permanently delete LibraryItem from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('library_item_delete')) {
            return abort(401);
        }
        $library_item = LibraryItem::onlyTrashed()->findOrFail($id);
        $library_item->forceDelete();

        return redirect()->route('admin.library_items.index');
    }
}
