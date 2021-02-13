@extends('layouts.app')

@section('content')
    <h3 class="page-title">Biblioteca / Archivos</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            Listado
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Título</th>
                            <td field-key='name'>{{ $library_item->name }}</td>
                        </tr>
                        <tr>
                            <th>Descripción</th>
                            <td field-key='description'>{!! $library_item->description !!}</td>
                        </tr>
                        <tr>
                            <th>Categoría</th>
                            <td field-key='category'>{{ $library_item->category->name or '' }}</td>
                        </tr>
                        <tr>
                            <th>Archivo</th>
                            <td field-key='pdf'>@if($library_item->pdf)<a href="{{ asset('pdf/' . $library_item->pdf) }}" target="_blank">Ver archivo</a>@endif</td>
                        </tr>
                        <tr>
                            <th>Publicado</th>
                            <td field-key='published'>{{ $library_item->published == 1 ? 'Si' : 'No' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.library_items.index') }}" class="btn btn-default">Volver</a>
            <a href="{{ route('admin.library_items.edit',[$library_item->id]) }}" class="btn btn-info">Modificar</a>
        </div>
    </div>
@stop


