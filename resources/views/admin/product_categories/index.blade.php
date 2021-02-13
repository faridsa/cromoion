@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')
@section('content')
<h3 class="page-title">
    @can('product_category_create')
    <a href="{{ route('admin.product_categories.create') }}" class="btn btn-success pull-right">Agregar</a>
    @endcan
Categorías</h3>

<div class="panel panel-default">
    <div class="panel-heading">
        Listado de categorías de productos
    </div>
    <div class="panel-body table-responsive">
        <table class="table table-bordered table-striped {{ count($product_categories) > 0 ? 'datatable' : '' }}">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Categoría superior</th>
                    {{--<th>Imagen</th>--}}
                    <th>Acciones</th>
                </tr>
            </thead>
            
            <tbody>
                @if (count($product_categories) > 0)
                @foreach ($product_categories as $product_category)
                <tr data-entry-id="{{ $product_category->id }}">
                    <td field-key='name'>{{ $product_category->name }}</td>
                    <td field-key='description'>{!! $product_category->parent->name or '' !!}</td>
                    {{--
                    <td field-key='photo'>@if($product_category->photo)<a href="{{ asset(env('UPLOAD_PATH').'/' . $product_category->photo) }}" target="_blank"><img src="{{ asset(env('UPLOAD_PATH').'/thumb/' . $product_category->photo) }}"/></a>@endif</td>
                    --}}
                    <td>
                        @if($product_category->id>2)
                            @can('product_category_edit')
                                <a href="{{ route('admin.product_categories.edit',[$product_category->id]) }}" class="btn btn-xs btn-info">Modificar</a>
                            @endcan
                            @can('product_category_delete')
                            {!! Form::open(array(
                                'style' => 'display: inline-block;',
                                'method' => 'DELETE',
                                'onsubmit' => "return confirm('Está segur@?');",
                                'route' => ['admin.product_categories.destroy', $product_category->id])) !!}
                                {!! Form::submit('Borrar', array('class' => 'btn btn-xs btn-danger')) !!}
                                {!! Form::close() !!}
                                @endcan
                            @endif
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="8">Sin datos disponibles</td>
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