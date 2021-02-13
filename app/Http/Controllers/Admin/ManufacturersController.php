<?php

namespace App\Http\Controllers\Admin;

use App\Models\Manufacturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreManufacturersRequest;
use App\Http\Requests\Admin\UpdateManufacturersRequest;
use App\Http\Controllers\Traits\FileUploadTrait;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class ManufacturersController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of Manufacturer.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('manufacturer_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('manufacturer_delete')) {
                return abort(401);
            }
            $manufacturers = Manufacturer::onlyTrashed()->get();
        } else {
            $manufacturers = Manufacturer::all();
        }

        return view('admin.manufacturers.index', compact('manufacturers'));
    }

    /**
     * Show the form for creating new Manufacturer.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('manufacturer_create')) {
            return abort(401);
        }
        return view('admin.manufacturers.create');
    }

    /**
     * Store a newly created Manufacturer in storage.
     *
     * @param  \App\Http\Requests\StoreManufacturersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreManufacturersRequest $request)
    {
        if (! Gate::allows('manufacturer_create')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $manufacturer = Manufacturer::create($request->all());



        return redirect()->route('admin.manufacturers.index');
    }


    /**
     * Show the form for editing Manufacturer.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('manufacturer_edit')) {
            return abort(401);
        }
        $manufacturer = Manufacturer::findOrFail($id);

        return view('admin.manufacturers.edit', compact('manufacturer'));
    }

    /**
     * Update Manufacturer in storage.
     *
     * @param  \App\Http\Requests\UpdateManufacturersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateManufacturersRequest $request, $id)
    {
        if (! Gate::allows('manufacturer_edit')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $manufacturer = Manufacturer::findOrFail($id);
        $manufacturer->update($request->all());



        return redirect()->route('admin.manufacturers.index');
    }


    /**
     * Display Manufacturer.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('manufacturer_view')) {
            return abort(401);
        }
        $products = \App\Product::where('manufacturer_id', $id)->get();

        $manufacturer = Manufacturer::findOrFail($id);

        return view('admin.manufacturers.show', compact('manufacturer', 'products'));
    }


    /**
     * Remove Manufacturer from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('manufacturer_delete')) {
            return abort(401);
        }
        $manufacturer = Manufacturer::findOrFail($id);
        $manufacturer->delete();

        return redirect()->route('admin.manufacturers.index');
    }

    /**
     * Delete all selected Manufacturer at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('manufacturer_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Manufacturer::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Manufacturer from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('manufacturer_delete')) {
            return abort(401);
        }
        $manufacturer = Manufacturer::onlyTrashed()->findOrFail($id);
        $manufacturer->restore();

        return redirect()->route('admin.manufacturers.index');
    }

    /**
     * Permanently delete Manufacturer from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('manufacturer_delete')) {
            return abort(401);
        }
        $manufacturer = Manufacturer::onlyTrashed()->findOrFail($id);
        $manufacturer->forceDelete();

        return redirect()->route('admin.manufacturers.index');
    }
}
