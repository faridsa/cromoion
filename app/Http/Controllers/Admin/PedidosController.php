<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePedidosRequest;
use App\Http\Requests\Admin\UpdatePedidosRequest;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class PedidosController extends Controller
{
    /**
     * Display a listing of Pedido.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('pedido_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('pedido_delete')) {
                return abort(401);
            }
            $pedidos = Pedido::onlyTrashed()->get();
        } else {
            $pedidos = Pedido::all();
        }

        return view('admin.pedidos.index', compact('pedidos'));
    }

    /**
     * Show the form for creating new Pedido.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('pedido_create')) {
            return abort(401);
        }        $enum_tipo_de_producto = Pedido::$enum_tipo_de_producto;
            
        return view('admin.pedidos.create', compact('enum_tipo_de_producto'));
    }

    /**
     * Store a newly created Pedido in storage.
     *
     * @param  \App\Http\Requests\StorePedidosRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePedidosRequest $request)
    {
        if (! Gate::allows('pedido_create')) {
            return abort(401);
        }
        $pedido = Pedido::create($request->all());



        return redirect()->route('admin.pedidos.index');
    }


    /**
     * Show the form for editing Pedido.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('pedido_edit')) {
            return abort(401);
        }        $enum_tipo_de_producto = Pedido::$enum_tipo_de_producto;
            
        $pedido = Pedido::findOrFail($id);

        return view('admin.pedidos.edit', compact('pedido', 'enum_tipo_de_producto'));
    }

    /**
     * Update Pedido in storage.
     *
     * @param  \App\Http\Requests\UpdatePedidosRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePedidosRequest $request, $id)
    {
        if (! Gate::allows('pedido_edit')) {
            return abort(401);
        }
        $pedido = Pedido::findOrFail($id);
        $pedido->update($request->all());



        return redirect()->route('admin.pedidos.index');
    }


    /**
     * Display Pedido.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('pedido_view')) {
            return abort(401);
        }
        $pedido = Pedido::findOrFail($id);
        $pedido->update(['read'=>1]);

        return view('admin.pedidos.show', compact('pedido'));
    }


    /**
     * Remove Pedido from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('pedido_delete')) {
            return abort(401);
        }
        $pedido = Pedido::findOrFail($id);
        $pedido->delete();

        return redirect()->route('admin.pedidos.index');
    }

    /**
     * Delete all selected Pedido at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('pedido_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Pedido::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Pedido from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('pedido_delete')) {
            return abort(401);
        }
        $pedido = Pedido::onlyTrashed()->findOrFail($id);
        $pedido->restore();

        return redirect()->route('admin.pedidos.index');
    }

    /**
     * Permanently delete Pedido from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('pedido_delete')) {
            return abort(401);
        }
        $pedido = Pedido::onlyTrashed()->findOrFail($id);
        $pedido->forceDelete();

        return redirect()->route('admin.pedidos.index');
    }
}
