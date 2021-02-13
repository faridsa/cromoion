@extends('layouts.app')

@section('content')
    <h3 class="page-title">
    @can('evento_create')
        <a href="{{ route('admin.eventos.create') }}" class="btn btn-success pull-right">Agregar</a>
    @endcan
    Eventos</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            Listado
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($eventos) > 0 ? '' : '' }} @can('evento_delete') dt-select @endcan">
                <thead>
                    <tr>
                         <th>Nombre</th>
                        <th>Lugar</th>
                        <th>Fecha</th>
                        <th>Publicado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($eventos) > 0)
                        @foreach ($eventos as $evento)
                            <tr data-entry-id="{{ $evento->id }}">

                                <td>{{ $evento->nombre }}</td>
                                <td>{{ $evento->lugar }}</td>
                                <td>{{ $evento->fecha }}</td>
                                <td>{{ $evento->publicado }}</td>
                                <td>
                                    @can('evento_view')
                                    <a href="{{ route('admin.eventos.show',[$evento->id]) }}" class="btn btn-xs btn-primary">Ver</a>
                                    @endcan
                                    @can('evento_edit')
                                    <a href="{{ route('admin.eventos.edit',[$evento->id]) }}" class="btn btn-xs btn-info">Modificar</a>
                                    @endcan
                                    @can('evento_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('Está segur@?');",
                                        'route' => ['admin.eventos.destroy', $evento->id])) !!}
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