@extends('layouts.app')

@section('content')
    <h3 class="page-title">    @can('content_category_create')
        <a href="{{ route('admin.content_categories.create') }}" class="btn btn-success pull-right">Agregar</a>
    @endcan
    Categorías</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            Listado de categorías de novedades
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($content_categories) > 0 ? '' : '' }} @can('content_category_delete') dt-select @endcan">
                <thead>
                    <tr>
                        <th>Categoría</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($content_categories) > 0)
                        @foreach ($content_categories as $content_category)
                            <tr data-entry-id="{{ $content_category->id }}">
                                <td>{{ $content_category->title }}</td>
                                <td>
                                    @can('content_category_edit')
                                    <a href="{{ route('admin.content_categories.edit',[$content_category->id]) }}" class="btn btn-xs btn-info">Modificar</a>
                                    @endcan
                                    @can('content_category_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('Está segur@?');",
                                        'route' => ['admin.content_categories.destroy', $content_category->id])) !!}
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