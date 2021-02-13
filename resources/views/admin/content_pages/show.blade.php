@extends('layouts.app')

@section('content')
    <h3 class="page-title">Notas</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            Detalle de nota
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Título</th>
                            <td>{{ $content_page->title }}</td>
                        </tr>
                        <tr>
                            <th>Categoría</th>
                            <td>
                             {{ $content_page->category->title }}
                            </td>
                        </tr>
                        
                        <tr>
                            <th>Contenido</th>
                            <td>{!! $content_page->page_text !!}</td>
                        </tr>
                        {{-- 
                        <tr>
                            <th>Resumen</th>
                            <td>{!! $content_page->excerpt !!}</td>
                        </tr>
                        --}}
                        <tr>
                            <th>Imagen</th>
                            <td>@if($content_page->featured_image)<img src="{{ asset('images/novedades/' . $content_page->featured_image) }}"/>@endif</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.content_pages.index') }}" class="btn btn-default">Volver</a>
        </div>
    </div>
@stop