@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
     <a href="{{ route('admin.library_items.create') }}" class="btn btn-success pull-right">Agregar</a><h3 class="page-title">Biblioteca / Archivos</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            Listado
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($library_items) > 0 ? 'datatable' : '' }} ">
                <thead>
                    <tr>
                        <th>Archivo</th>
                        <th>Categoría</th>
                        <th>Link</th>
                        <th>Descargas</th>
                        <th>Publicado</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($library_items) > 0)
                        @foreach ($library_items as $library_item)
                            <tr data-entry-id="{{ $library_item->id }}">
                                <td field-key='name'>{{ $library_item->name }}</td>
                                <td field-key='category'>{{ $library_item->category->name ?? '' }}</td>
                                <td field-key='link'>{{ url('biblioteca/'.$library_item->uuid.'/download') }}</td>
                                <td field-key='downloads'>{{ $library_item->downloads }}</td>
                                <td field-key='published'>{{ $library_item->published == 1 ? 'Sí' : 'No' }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    @can('library_item_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('Está segur@?');",
                                        'route' => ['admin.library_items.restore', $library_item->id])) !!}
                                    {!! Form::submit('Recuperar', array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                    @can('library_item_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('Está segur@?');",
                                        'route' => ['admin.library_items.perma_del', $library_item->id])) !!}
                                    {!! Form::submit('Eliminar', array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                </td>
                                @else
                                <td>
                                    @can('library_item_view')
                                    <a href="{{ route('admin.library_items.show',[$library_item->id]) }}" class="btn btn-xs btn-primary">Ver</a>
                                    @endcan
                                    @can('library_item_edit')
                                    <a href="{{ route('admin.library_items.edit',[$library_item->id]) }}" class="btn btn-xs btn-info">Modificar</a>
                                    @endcan
                                    @can('library_item_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('Está segur@?');",
                                        'route' => ['admin.library_items.destroy', $library_item->id])) !!}
                                    {!! Form::submit('Eliminar', array('class' => 'btn btn-xs btn-danger')) !!}
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
