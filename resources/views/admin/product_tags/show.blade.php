@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.product-tags.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            Ver
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Tags</th>
                            <td field-key='name'>{{ $product_tag->name }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">

<li role="presentation" class="active"><a href="#products" aria-controls="products" role="tab" data-toggle="tab">Productos</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">

<div role="tabpanel" class="tab-pane active" id="products">
<table class="table table-bordered table-striped {{ count($products) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Categoría</th>
                        <th>Tags</th>
                        <th>Foto 1</th>
                        <th>Foto 2</th>
                        <th>Foto 3</th>
                        <th>Video</th>
                        <th>Link</th>
                        <th>Destacado</th>
                        <th>Fabricante</th>
                        <th>Publicado</th>
                                                <th>Acciones</th>

        </tr>
    </thead>

    <tbody>
        @if (count($products) > 0)
            @foreach ($products as $product)
                <tr data-entry-id="{{ $product->id }}">
                    <td field-key='name'>{{ $product->name }}</td>
                                <td field-key='description'>{!! $product->description !!}</td>
                                <td field-key='price'>{{ $product->price }}</td>
                                <td field-key='category'>
                                    @foreach ($product->category as $singleCategory)
                                        <span class="label label-info label-many">{{ $singleCategory->name }}</span>
                                    @endforeach
                                </td>
                                <td field-key='tag'>
                                    @foreach ($product->tag as $singleTag)
                                        <span class="label label-info label-many">{{ $singleTag->name }}</span>
                                    @endforeach
                                </td>
                                <td field-key='photo1'>@if($product->photo1)<a href="{{ asset(env('UPLOAD_PATH').'/' . $product->photo1) }}" target="_blank"><img src="{{ asset(env('UPLOAD_PATH').'/thumb/' . $product->photo1) }}"/></a>@endif</td>
                                <td field-key='photo2'>@if($product->photo2)<a href="{{ asset(env('UPLOAD_PATH').'/' . $product->photo2) }}" target="_blank"><img src="{{ asset(env('UPLOAD_PATH').'/thumb/' . $product->photo2) }}"/></a>@endif</td>
                                <td field-key='photo3'>@if($product->photo3)<a href="{{ asset(env('UPLOAD_PATH').'/' . $product->photo3) }}" target="_blank"><img src="{{ asset(env('UPLOAD_PATH').'/thumb/' . $product->photo3) }}"/></a>@endif</td>
                                <td field-key='video'>{{ $product->video }}</td>
                                <td field-key='link'>{{ $product->link }}</td>
                                <td field-key='featured'>{{ $product->featured }}</td>
                                <td field-key='manufacturer'>{{ $product->manufacturer->name ?? '' }}</td>
                                <td field-key='visible'>{{ $product->visible }}</td>
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

            <p>&nbsp;</p>

            <a href="{{ route('admin.product_tags.index') }}" class="btn btn-default">Volver</a>
        </div>
    </div>
@stop
