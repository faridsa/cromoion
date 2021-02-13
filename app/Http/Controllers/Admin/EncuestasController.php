<?php

namespace App\Http\Controllers\Admin;

use App\Models\Encuesta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreEncuestasRequest;
use App\Http\Requests\Admin\UpdateEncuestasRequest;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class EncuestasController extends Controller
{
    /**
     * Display a listing of Encuestum.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('encuestum_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('encuestum_delete')) {
                return abort(401);
            }
            $encuestas = Encuesta::onlyTrashed()->get();
        } else {
            $encuestas = Encuesta::all();
        }

        return view('admin.encuestas.index', compact('encuestas'));
    }

    /**
     * Show the form for creating new Encuestum.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('encuestum_create')) {
            return abort(401);
        }
        return view('admin.encuestas.create');
    }

    /**
     * Store a newly created Encuestum in storage.
     *
     * @param  \App\Http\Requests\StoreEncuestasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEncuestasRequest $request)
    {
        if (! Gate::allows('encuestum_create')) {
            return abort(401);
        }
        $encuestum = Encuesta::create($request->all());



        return redirect()->route('admin.encuestas.index');
    }


    /**
     * Show the form for editing Encuestum.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('encuestum_edit')) {
            return abort(401);
        }
        $encuestum = Encuesta::findOrFail($id);

        return view('admin.encuestas.edit', compact('encuestum'));
    }

    /**
     * Update Encuestum in storage.
     *
     * @param  \App\Http\Requests\UpdateEncuestasRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEncuestasRequest $request, $id)
    {
        if (! Gate::allows('encuestum_edit')) {
            return abort(401);
        }
        $encuestum = Encuesta::findOrFail($id);
        $encuestum->update($request->all());



        return redirect()->route('admin.encuestas.index');
    }


    /**
     * Display Encuestum.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('encuestum_view')) {
            return abort(401);
        }
        $encuestum = Encuesta::findOrFail($id);

        return view('admin.encuestas.show', compact('encuestum'));
    }


    /**
     * Remove Encuestum from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('encuestum_delete')) {
            return abort(401);
        }
        $encuestum = Encuesta::findOrFail($id);
        $encuestum->delete();

        return redirect()->route('admin.encuestas.index');
    }

    /**
     * Delete all selected Encuestum at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('encuestum_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Encuesta::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Encuestum from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('encuestum_delete')) {
            return abort(401);
        }
        $encuestum = Encuesta::onlyTrashed()->findOrFail($id);
        $encuestum->restore();

        return redirect()->route('admin.encuestas.index');
    }

    /**
     * Permanently delete Encuestum from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('encuestum_delete')) {
            return abort(401);
        }
        $encuestum = Encuesta::onlyTrashed()->findOrFail($id);
        $encuestum->forceDelete();

        return redirect()->route('admin.encuestas.index');
    }
}
