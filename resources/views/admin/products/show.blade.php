@extends('layouts.app')
@section('content')
<h3 class="page-title">Productos</h3>
<div class="row">
    <div class="col-md-6">
        
        
        <div class="panel panel-default">
            <div class="panel-heading">
                Ficha de producto
            </div>
            <div class="panel-body table-responsive">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th>Nombre</th>
                                <td field-key='name'>{{ $product->name }}</td>
                            </tr> 
                            <tr>
                                <th>Slug (Nombre para la url)</th>
                                <td field-key='name'>{{ $product->slug }}</td>
                            </tr>
                            <tr>
                                <th>Descripcion</th>
                                <td field-key='description'>{!! $product->description !!}</td>
                            </tr>
                            {{--<tr>
                                <th>Precio</th>
                                <td field-key='price'>{{ $product->price }}</td>
                            </tr>--}}
                            <tr>
                                <th>Categoría</th>
                                <td field-key='category'> {{ $product->category->name or ''}}</td>
                            </tr>
                            {{-- <tr>
                                <th>Tag</th>
                                <td field-key='tag'>
                                    @foreach ($product->tag as $singleTag)
                                    <span class="label label-info label-many">{{ $singleTag->name }}</span>
                                    @endforeach
                                </td>
                            </tr>
                            --}}
                            {{--
                            <tr>
                                <th>Foto 1</th>
                                <td field-key='photo1'>@if($product->photo1)<a href="{{ asset('' . $product->photo1) }}" target="_blank"><img src="{{ asset('images/productos/' . $product->photo1) }}"/></a>@endif</td>
                            </tr>
                            
                            <tr>
                                <th>Foto 2</th>
                                <td field-key='photo2'>@if($product->photo2)<a href="{{ asset(env('UPLOAD_PATH').'/' . $product->photo2) }}" target="_blank"><img src="{{ asset('images/productos/' . $product->photo2) }}"/></a>@endif</td>
                            </tr>
                            <tr>
                                <th>Foto 3</th>
                                <td field-key='photo3'>@if($product->photo3)<a href="{{ asset(env('UPLOAD_PATH').'/' . $product->photo3) }}" target="_blank"><img src="{{ asset('images/productos/' . $product->photo3) }}"/></a>@endif</td>
                            </tr>
                            --}}
                            <tr>
                                <th>PDF</th>
                                <td field-key='pdf'>{{ $product->pdf }}</td>
                            </tr>                            
                            <tr>
                                <th>Video</th>
                                <td field-key='video'>{{ $product->video }}</td>
                            </tr>
                            <tr>
                                <th>Link</th>
                                <td field-key='link'>{{ $product->link }}</td>
                            </tr>
                            <tr>
                                <th>Destacado</th>
                                <td field-key='featured'>{{ $product->featured == 1 ? 'Si' : 'No' }}</td>
                            </tr>
                            <tr>
                                <th>Fabricante</th>
                                <td field-key='manufacturer'>{{ $product->manufacturer->name or '' }}</td>
                            </tr>
                            <tr>
                                <th>Visible</th>
                                <td field-key='visible'>{{ $product->visible == 1 ? 'Si' : 'No' }}</td>
                            </tr>
                        </table>
                <p>&nbsp;</p>
                <a href="{{ route('admin.products.index') }}" class="btn btn-default">Volver</a>
                <a href="{{ route('admin.products.edit',[$product->id]) }}" class="btn btn-info">Modificar</a>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-default">
            @if($product->photo1)
            <div class="panel-heading">
                Foto actual
            </div>
            <img src="{{ asset('images/productos/' . $product->photo1) }}" style="max-width: 100%" class="img-responsive" />
            @endif
        </div>
    </div>
</div>
@stop