@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')
@section('content')
<h3 class="page-title">@lang('quickadmin.pedidos.title')</h3>

<div class="panel panel-default">
    <div class="panel-heading">
        Listado
    </div>
    <div class="panel-body table-responsive">
        <table class="table table-bordered table-striped {{ count($pedidos) > 0 ? 'datatable' : '' }}">
            <thead>
                <tr>
                    <th>@lang('quickadmin.pedidos.fields.empresa')</th>
                    <th>@lang('quickadmin.pedidos.fields.nombre')</th>
                    <th>@lang('quickadmin.pedidos.fields.telefono')</th>
                    <th>@lang('quickadmin.pedidos.fields.email')</th>
                    <th>@lang('quickadmin.pedidos.fields.tipo-de-producto')</th>
                    <th>@lang('quickadmin.pedidos.fields.comentarios')</th>
                    @if( request('show_deleted') == 1 )
                    <th>&nbsp;</th>
                    @else
                    <th>&nbsp;</th>
                    @endif
                </tr>
            </thead>
            
            <tbody>
                @if (count($pedidos) > 0)
                @foreach ($pedidos as $pedido)
                <tr data-entry-id="{{ $pedido->id }}">
                    
                    <td field-key='empresa'>{{ $pedido->empresa }}</td>
                    <td field-key='nombre'>{{ $pedido->nombre }}</td>
                    <td field-key='telefono'>{{ $pedido->telefono }}</td>
                    <td field-key='email'>{{ $pedido->email }}</td>
                    <td field-key='tipo_de_producto'>{{ $pedido->tipo_de_producto }}</td>
                    <td field-key='comentarios'>{!! $pedido->comentarios !!}</td>
                    @if( request('show_deleted') == 1 )
                    <td>
                        @can('pedido_delete')
                        {!! Form::open(array(
                        'style' => 'display: inline-block;',
                        'method' => 'POST',
                        'onsubmit' => "return confirm('Está segur@?');",
                        'route' => ['admin.pedidos.restore', $pedido->id])) !!}
                        {!! Form::submit('Recuperar', array('class' => 'btn btn-xs btn-success')) !!}
                        {!! Form::close() !!}
                        @endcan
                        @can('pedido_delete')
                        {!! Form::open(array(
                        'style' => 'display: inline-block;',
                        'method' => 'DELETE',
                        'onsubmit' => "return confirm('Está segur@?');",
                        'route' => ['admin.pedidos.perma_del', $pedido->id])) !!}
                        {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                        {!! Form::close() !!}
                        @endcan
                    </td>
                    @else
                    <td>
                        @can('pedido_view')
                        <a href="{{ route('admin.pedidos.show',[$pedido->id]) }}" class="btn btn-xs btn-primary">Ver</a>
                        @endcan
                        @can('pedido_edit')
                        <a href="{{ route('admin.pedidos.edit',[$pedido->id]) }}" class="btn btn-xs btn-info">Modificar</a>
                        @endcan
                        @can('pedido_delete')
                        {!! Form::open(array(
                        'style' => 'display: inline-block;',
                        'method' => 'DELETE',
                        'onsubmit' => "return confirm('Está segur@?');",
                        'route' => ['admin.pedidos.destroy', $pedido->id])) !!}
                        {!! Form::submit('Borrar', array('class' => 'btn btn-xs btn-danger')) !!}
                        {!! Form::close() !!}
                        @endcan
                    </td>
                    @endif
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="11">Sin datos disponibles</td>
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