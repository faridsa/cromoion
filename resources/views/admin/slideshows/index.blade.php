@extends('layouts.app')

@section('content')
    <h3 class="page-title">
    @can('slideshow_create')
        <a href="{{ route('admin.slideshows.create') }}" class="btn btn-success pull-right">Agregar</a>
    @endcan
    Slideshows</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            Listado
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($slideshows) > 0 ? '' : '' }} @can('slideshow_delete') dt-select @endcan">
                <thead>
                    <tr>

                        <th>Título</th>
                        <th>Imagen</th>
                        <th>Link</th>
                        <th>Orden</th>
                        <th>Publicado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($slideshows) > 0)
                        @foreach ($slideshows as $slideshow)
                            <tr data-entry-id="{{ $slideshow->id }}">

                                <td>{{ $slideshow->titulo }}</td>
                                <td><img src="{{ asset('images/slideshows/' . $slideshow->image_desktop) }}" style="max-width:150px"></td>
                                <td>{{ $slideshow->link }}</td>
                                <td>{{ $slideshow->order }}</td>
                                <td>{{ $slideshow->published == 1 ? 'Sí' : 'No' }}</td>
                                <td>
                                    @can('slideshow_view')
                                    <a href="{{ route('admin.slideshows.show',[$slideshow->id]) }}" class="btn btn-xs btn-primary">Ver</a>
                                    @endcan
                                    @can('slideshow_edit')
                                    <a href="{{ route('admin.slideshows.edit',[$slideshow->id]) }}" class="btn btn-xs btn-info">Modificar</a>
                                    @endcan
                                    @can('slideshow_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('Está segur@?');",
                                        'route' => ['admin.slideshows.destroy', $slideshow->id])) !!}
                                    {!! Form::submit('Borrar', array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
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