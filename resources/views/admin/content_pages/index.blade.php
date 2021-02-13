@extends('layouts.app')

@section('content')
    <h3 class="page-title">
    @can('content_page_create')
        <a href="{{ route('admin.content_pages.create') }}" class="btn btn-success pull-right">Agregar</a>
    @endcan
        Notas
    </h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            Listado de novedades
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($content_pages) > 0 ? '' : '' }} @can('content_page_delete') dt-select @endcan">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Categoria</th>
                        <th>Fecha creación</th>
                        <th>Vistas</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($content_pages) > 0)
                        @foreach ($content_pages as $content_page)
                            <tr data-entry-id="{{ $content_page->id }}">
                                <td>{{ $content_page->title }}</td>
                                <td>
                                        {{ $content_page->category->title }}
                                </td>
                                <td>@if($content_page->created_at){{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$content_page->created_at )->format('Y-m-d') }}@endif</td>
                                <td>{{ $content_page->views }}</td>
                                <td>
                                    @can('content_page_view')
                                    <a href="{{ route('admin.content_pages.show',[$content_page->id]) }}" class="btn btn-xs btn-primary">Ver</a>
                                    @endcan
                                    @can('content_page_edit')
                                    <a href="{{ route('admin.content_pages.edit',[$content_page->id]) }}" class="btn btn-xs btn-info">Modificar</a>
                                    @endcan
                                    @can('content_page_delete')
                                    @if($content_page->id > 1)
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('Está segur@?');",
                                        'route' => ['admin.content_pages.destroy', $content_page->id])) !!}
                                    {!! Form::submit('Borrar', array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endif
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="10">Sin datos disponibles</td>
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