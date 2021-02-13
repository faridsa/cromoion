@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')
@section('content')
<h3 class="page-title">
@can('product_tag_create')
<a href="{{ route('admin.product_tags.create') }}" class="btn btn-success pull-right">Agregar</a>
@endcan
@lang('quickadmin.product-tags.title')</h3>

<div class="panel panel-default">
    <div class="panel-heading">
        Listado
    </div>
    <div class="panel-body table-responsive">
        <table class="table table-bordered table-striped {{ count($product_tags) > 0 ? 'datatable' : '' }} @can('product_tag_delete')  @endcan">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            
            <tbody>
                @if (count($product_tags) > 0)
                @foreach ($product_tags as $product_tag)
                <tr data-entry-id="{{ $product_tag->id }}">
                   
                    <td field-key='name'>{{ $product_tag->name }}</td>
                    <td>
                        @can('product_tag_view')
                        <a href="{{ route('admin.product_tags.show',[$product_tag->id]) }}" class="btn btn-xs btn-primary">Ver</a>
                        @endcan
                        @can('product_tag_edit')
                        <a href="{{ route('admin.product_tags.edit',[$product_tag->id]) }}" class="btn btn-xs btn-info">Modificar</a>
                        @endcan
                        @can('product_tag_delete')
                        {!! Form::open(array(
                        'style' => 'display: inline-block;',
                        'method' => 'DELETE',
                        'onsubmit' => "return confirm('Está segur@?');",
                        'route' => ['admin.product_tags.destroy', $product_tag->id])) !!}
                        {!! Form::submit('Borrar', array('class' => 'btn btn-xs btn-danger')) !!}
                        {!! Form::close() !!}
                        @endcan
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="6">Sin datos disponibles</td>
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