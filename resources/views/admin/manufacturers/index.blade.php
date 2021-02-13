@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">
    @can('manufacturer_create')
        <a href="{{ route('admin.manufacturers.create') }}" class="btn btn-success pull-right">Agregar</a>
    @endcan
    Fabricantes / Marcas</h3>


    <div class="panel panel-default">
        <div class="panel-heading">
            Listado de empresas y marcas
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($manufacturers) > 0 ? 'datatable' : '' }} @can('manufacturer_delete') @if ( request('show_deleted') != 1 )  @endif @endcan">
                <thead>
                    <tr>
                        <th>Empresa / Marca</th>
                        <th>Logo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($manufacturers) > 0)
                        @foreach ($manufacturers as $manufacturer)
                            <tr data-entry-id="{{ $manufacturer->id }}">
                                <td field-key='name'>{{ $manufacturer->name }}</td>
                                <td field-key='brand'>@if($manufacturer->brand)<a href="{{ asset(env('UPLOAD_PATH').'/' . $manufacturer->brand) }}" target="_blank"><img src="{{ asset(env('UPLOAD_PATH').'/images/marcas/' . $manufacturer->brand) }}"/></a>@endif</td>
                                
                                <td>
                                    @can('manufacturer_edit')
                                    <a href="{{ route('admin.manufacturers.edit',[$manufacturer->id]) }}" class="btn btn-xs btn-info">Modificar</a>
                                    @endcan
                                    @can('manufacturer_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('Está segur@?');",
                                        'route' => ['admin.manufacturers.destroy', $manufacturer->id])) !!}
                                    {!! Form::submit('Borrar', array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
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