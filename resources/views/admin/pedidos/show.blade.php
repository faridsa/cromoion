@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.pedidos.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            Ver
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.pedidos.fields.empresa')</th>
                            <td field-key='empresa'>{{ $pedido->empresa }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.pedidos.fields.nombre')</th>
                            <td field-key='nombre'>{{ $pedido->nombre }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.pedidos.fields.telefono')</th>
                            <td field-key='telefono'>{{ $pedido->telefono }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.pedidos.fields.email')</th>
                            <td field-key='email'>{{ $pedido->email }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.pedidos.fields.tipo-de-producto')</th>
                            <td field-key='tipo_de_producto'>{{ $pedido->tipo_de_producto }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.pedidos.fields.comentarios')</th>
                            <td field-key='comentarios'>{!! $pedido->comentarios !!}</td>
                        </tr> 
                        <tr>
                            <th>Leído</th>
                            <td field-key='viewed'>{!! $pedido->viewed == 1 ? 'Sí' : 'No' !!}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.pedidos.index') }}" class="btn btn-default">Volver</a>
        </div>
    </div>
@stop
