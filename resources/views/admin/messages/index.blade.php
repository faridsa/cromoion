@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">Formularios de contacto</h3>



    <div class="panel panel-default">
        <div class="panel-heading">
            Listado
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($messages) > 0 ? 'datatable' : '' }}">
                <thead>
                    <tr>

                        <th>Nombre</th>
                        <th>Empresa</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th>Dirección</th>
                        <th>CP</th>
                        <th>Localidad</th>
                        <th>Provincia</th>
                        <th>País</th>
                        <th>Mensaje</th>
                        <th>Leído</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($messages) > 0)
                        @foreach ($messages as $message)
                            <tr data-entry-id="{{ $message->id }}">
                                <td field-key='name'>{{ $message->name }}</td>
                                <td field-key='company'>{{ $message->company }}</td>
                                <td field-key='email'>{{ $message->email }}</td>
                                <td field-key='phone'>{{ $message->phone }}</td>
                                <td field-key='address'>{{ $message->address }}</td>
                                <td field-key='zip'>{{ $message->zip }}</td>
                                <td field-key='city'>{{ $message->city }}</td>
                                <td field-key='state'>{{ $message->state }}</td>
                                <td field-key='country'>{{ $message->country }}</td>
                                <td field-key='message'>{!! $message->comments !!}</td>
                                <td field-key='viewed'>{{ $message->viewed ==1 ? 'Si' : 'No'}}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    @can('message_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('Está segur@?');",
                                        'route' => ['admin.messages.restore', $message->id])) !!}
                                    {!! Form::submit('Recuperar', array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                    @can('message_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('Está segur@?');",
                                        'route' => ['admin.messages.perma_del', $message->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                </td>
                                @else
                                <td>
                                    @can('message_view')
                                    <a href="{{ route('admin.messages.show',[$message->id]) }}" class="btn btn-xs btn-primary">Ver</a>
                                    @endcan
                                   
                                    @can('message_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('Está segur@?');",
                                        'route' => ['admin.messages.destroy', $message->id])) !!}
                                    {!! Form::submit('Borrar', array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="16">Sin datos disponibles</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>

    </script>
@endsection