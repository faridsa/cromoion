@extends('layouts.app')

@section('content')
    <h3 class="page-title">Categorías</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            Ver
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Nombre</th>
                            <td>{{ $content_category->title }}</td>
                        </tr>
                        <tr>
                            <th>Slug</th>
                            <td>{{ $content_category->slug }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#contentpages" aria-controls="contentpages" role="tab" data-toggle="tab">Notas</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="contentpages">
<table class="table table-bordered table-striped {{ count($content_pages) > 0 ? '' : '' }}">
    <thead>
        <tr>
            <th>Título</th>
                        <th>Categoría</th>
                        <th>Tag</th>
                        <th>Texto</th>
                        <th>Resumen</th>
                        <th>Imagen</th>
                        <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        @if (count($content_pages) > 0)
            @foreach ($content_pages as $content_page)
                <tr data-entry-id="{{ $content_page->id }}">
                    <td>{{ $content_page->title }}</td>
                                <td>
                                    @foreach ($content_page->category_id as $singleCategoryId)
                                        <span class="label label-info label-many">{{ $singleCategoryId->title }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($content_page->tag_id as $singleTagId)
                                        <span class="label label-info label-many">{{ $singleTagId->title }}</span>
                                    @endforeach
                                </td>
                                <td>{!! $content_page->page_text !!}</td>
                                <td>{!! $content_page->excerpt !!}</td>
                                <td>@if($content_page->featured_image)<a href="{{ asset('uploads/' . $content_page->featured_image) }}" target="_blank"><img src="{{ asset('uploads/thumb/' . $content_page->featured_image) }}"/></a>@endif</td>
                                <td>
                                    @can('content_page_view')
                                    <a href="{{ route('admin.content_pages.show',[$content_page->id]) }}" class="btn btn-xs btn-primary">Ver</a>
                                    @endcan
                                    @can('content_page_edit')
                                    <a href="{{ route('admin.content_pages.edit',[$content_page->id]) }}" class="btn btn-xs btn-info">Modificar</a>
                                    @endcan
                                    @can('content_page_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('Está segur@?');",
                                        'route' => ['admin.content_pages.destroy', $content_page->id])) !!}
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

            <p>&nbsp;</p>

            <a href="{{ route('admin.content_categories.index') }}" class="btn btn-default">Volver</a>
        </div>
    </div>
@stop