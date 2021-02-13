<?php

namespace App\Http\Controllers\Admin;

use App\Models\Evento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreEventosRequest;
use App\Http\Requests\Admin\UpdateEventosRequest;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class EventosController extends Controller
{
    /**
     * Display a listing of Evento.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('evento_access')) {
            return abort(401);
        }

        $eventos = Evento::all();

        return view('admin.eventos.index', compact('eventos'));
    }

    /**
     * Show the form for creating new Evento.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('evento_create')) {
            return abort(401);
        }
        return view('admin.eventos.create');
    }

    /**
     * Store a newly created Evento in storage.
     *
     * @param  \App\Http\Requests\StoreEventosRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEventosRequest $request)
    {
        if (! Gate::allows('evento_create')) {
            return abort(401);
        }
        $evento = Evento::create($request->all());



        return redirect()->route('admin.eventos.index');
    }


    /**
     * Show the form for editing Evento.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('evento_edit')) {
            return abort(401);
        }
        $evento = Evento::findOrFail($id);

        return view('admin.eventos.edit', compact('evento'));
    }

    /**
     * Update Evento in storage.
     *
     * @param  \App\Http\Requests\UpdateEventosRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEventosRequest $request, $id)
    {
        if (! Gate::allows('evento_edit')) {
            return abort(401);
        }
        $evento = Evento::findOrFail($id);
        $evento->update($request->all());



        return redirect()->route('admin.eventos.index');
    }


    /**
     * Display Evento.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('evento_view')) {
            return abort(401);
        }
        $evento = Evento::findOrFail($id);

        return view('admin.eventos.show', compact('evento'));
    }


    /**
     * Remove Evento from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('evento_delete')) {
            return abort(401);
        }
        $evento = Evento::findOrFail($id);
        $evento->delete();

        return redirect()->route('admin.eventos.index');
    }

    /**
     * Delete all selected Evento at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('evento_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Evento::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
