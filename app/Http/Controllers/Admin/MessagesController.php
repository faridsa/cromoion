<?php

namespace App\Http\Controllers\Admin;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreMessagesRequest;
use App\Http\Requests\Admin\UpdateMessagesRequest;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class MessagesController extends Controller
{
    /**
     * Display a listing of Message.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('message_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('message_delete')) {
                return abort(401);
            }
            $messages = Message::onlyTrashed()->get();
        } else {
            $messages = Message::all();
        }

        return view('admin.messages.index', compact('messages'));
    }

    /**
     * Show the form for creating new Message.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('message_create')) {
            return abort(401);
        }
        return view('admin.messages.create');
    }

    /**
     * Store a newly created Message in storage.
     *
     * @param  \App\Http\Requests\StoreMessagesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMessagesRequest $request)
    {
        if (! Gate::allows('message_create')) {
            return abort(401);
        }
        $message = Message::create($request->all());



        return redirect()->route('admin.messages.index');
    }


    /**
     * Show the form for editing Message.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('message_edit')) {
            return abort(401);
        }
        $message = Message::findOrFail($id);

        return view('admin.messages.edit', compact('message'));
    }

    /**
     * Update Message in storage.
     *
     * @param  \App\Http\Requests\UpdateMessagesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMessagesRequest $request, $id)
    {
        if (! Gate::allows('message_edit')) {
            return abort(401);
        }
        $message = Message::findOrFail($id);
        $message->update($request->all());



        return redirect()->route('admin.messages.index');
    }


    /**
     * Display Message.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('message_view')) {
            return abort(401);
        }
        $message = Message::findOrFail($id);
        $message->update(['viewed'=>1]);

        return view('admin.messages.show', compact('message'));
    }


    /**
     * Remove Message from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('message_delete')) {
            return abort(401);
        }
        $message = Message::findOrFail($id);
        $message->delete();

        return redirect()->route('admin.messages.index');
    }

    /**
     * Delete all selected Message at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('message_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Message::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Message from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('message_delete')) {
            return abort(401);
        }
        $message = Message::onlyTrashed()->findOrFail($id);
        $message->restore();

        return redirect()->route('admin.messages.index');
    }

    /**
     * Permanently delete Message from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('message_delete')) {
            return abort(401);
        }
        $message = Message::onlyTrashed()->findOrFail($id);
        $message->forceDelete();

        return redirect()->route('admin.messages.index');
    }
}
