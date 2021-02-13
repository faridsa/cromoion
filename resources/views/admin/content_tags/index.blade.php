@extends('layouts.app')

@section('content')
    <h3 class="page-title">
    @can('content_tag_create')
        <a href="{{ route('admin.content_tags.create') }}" class="btn btn-success pull-right">Agregar</a>
    @endcan
        Tags</h3>
    <div class="panel panel-default">
        <div class="panel-heading">
            Listado
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($content_tags) > 0 ? '' : '' }} @can('content_tag_delete') dt-select @endcan">
                <thead>
                    <tr>
                        <th>Titulo</th>
                        <th>Tags</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($content_tags) > 0)
                        @foreach ($content_tags as $content_tag)
                            <tr data-entry-id="{{ $content_tag->id }}">
                                <td>{{ $content_tag->title }}</td>
                                <td>{{ $content_tag->slug }}</td>
                                <td>
                                    @can('content_tag_view')
                                    <a href="{{ route('admin.content_tags.show',[$content_tag->id]) }}" class="btn btn-xs btn-primary">Ver</a>
                                    @endcan
                                    @can('content_tag_edit')
                                    <a href="{{ route('admin.content_tags.edit',[$content_tag->id]) }}" class="btn btn-xs btn-info">Modificar</a>
                                    @endcan
                                    @can('content_tag_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('Está segur@?');",
                                        'route' => ['admin.content_tags.destroy', $content_tag->id])) !!}
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