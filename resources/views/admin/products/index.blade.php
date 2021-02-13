@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')
@section('content')
<h3 class="page-title">@can('product_create')
<a href="{{ route('admin.products.create') }}" class="btn btn-success pull-right">Agregar</a>
@endcan
Productos</h3>


<div class="panel panel-default">
    <div class="panel-heading">
        Listado
    </div>
    <div class="panel-body table-responsive">
        <table class="table table-bordered table-striped {{ count($products) > 0 ? 'datatable' : '' }} @can('product_delete')  @endcan">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Categoria</th>
                    <th>Fabricante</th>
                    <th>Foto</th>
                    {{--
                    <th>Foto 2</th>
                    <th>Foto 3</th>
                    --}}
                    <th>Vistas</th>
                    <th>Destacado</th>
                    <th>Visible</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                @if (count($products) > 0)
                @foreach ($products as $product)
                <tr data-entry-id="{{ $product->id }}">
                    <td field-key='name'>{{ $product->name ?? '' }}</td>
                    <td field-key='category'>{{ $product->category->name ?? '' }}</td>
                    <td field-key='manufacturer'>{{ $product->manufacturer->name ?? '' }}</td>
                    <td field-key='photo1'>@if($product->photo1)<img src="{{ asset('images/productos/' . $product->photo1) }}" style="max-width:150px"/>@endif</td>
                    {{--
                    <td field-key='photo2'>@if($product->photo2)<img src="{{ asset('images/productos/' . $product->photo2) }}"/>@endif</td>
                    <td field-key='photo3'>@if($product->photo3)<img src="{{ asset('images/productos/' . $product->photo3) }}"/>@endif</td>
                    --}}
                    <td field-key='views'>{{ $product->views }}</td>
                    <td field-key='featured'>{{ $product->featured  == 1 ? 'Si' : 'No'}}</td>
                    <td field-key='visible'>{{ $product->visible == 1 ? 'Si' : 'No' }}</td>
                    <td>
                        @can('product_view')
                        <a href="{{ route('admin.products.show',[$product->id]) }}" class="btn btn-xs btn-primary">Ver</a>
                        @endcan
                        @can('product_edit')
                        <a href="{{ route('admin.products.edit',[$product->id]) }}" class="btn btn-xs btn-info">Modificar</a>
                        @endcan
                        @can('product_delete')
                        {!! Form::open(array(
                        'style' => 'display: inline-block;',
                        'method' => 'DELETE',
                        'onsubmit' => "return confirm('Está segur@?');",
                        'route' => ['admin.products.destroy', $product->id])) !!}
                        {!! Form::submit('Borrar', array('class' => 'btn btn-xs btn-danger')) !!}
                        {!! Form::close() !!}
                        @endcan
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="18">Sin datos disponibles</td>
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
