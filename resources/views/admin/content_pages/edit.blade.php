@extends('layouts.app')
@section('content')
<h3 class="page-title">Notas</h3>
<div class="row">
    <div class="col-md-8">
        {!! Form::model($content_page, ['method' => 'PUT', 'route' => ['admin.content_pages.update', $content_page->id], 'files' => true,]) !!}
        {!! Form::hidden('target_folder', 'novedades') !!}
        <div class="panel panel-default">
            <div class="panel-heading">
                Modificación de nota
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12 form-group">
                        {!! Form::label('title', 'Titulo*', ['class' => 'control-label']) !!}
                        {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                        
                        @if($errors->has('title'))
                        <p class="help-block">
                            {{ $errors->first('title') }}
                        </p>
                        @endif
                    </div>
                    <div class="col-xs-12 form-group">
                        {!! Form::label('page_text', 'Contenido', ['class' => 'control-label']) !!}
                        {!! Form::textarea('page_text', old('page_text'), ['class' => 'form-control editor', 'placeholder' => '']) !!}
                        
                        @if($errors->has('page_text'))
                        <p class="help-block">
                            {{ $errors->first('page_text') }}
                        </p>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4 form-group">
                        {!! Form::label('category_id', 'Categoría', ['class' => 'control-label']) !!}
                        {!! Form::select('category_id', $category_ids, old('category_id'), ['class' => 'form-control select2','required' => '']) !!}
                        @if($errors->has('category_id'))
                        <p class="help-block">
                            {{ $errors->first('category_id') }}
                        </p>
                        @endif
                    </div>

                    <div class="col-sm-4 form-group">
                        {!! Form::label('featured_image', 'Imagen', ['class' => 'control-label']) !!}
                        {!! Form::file('featured_image', ['class' => 'form-control', 'style' => 'margin-top: 4px;']) !!}
                        {!! Form::hidden('featured_image_max_size', 10) !!}
                        {!! Form::hidden('featured_image_max_width', 1000) !!}
                        {!! Form::hidden('featured_image_max_height', 1000) !!}

                        @if($errors->has('featured_image'))
                        <p class="help-block">
                            {{ $errors->first('featured_image') }}
                        </p>
                        @endif
                    </div>
                    <div class="col-sm-4 form-group">
                        {!! Form::label('video', 'Video de Youtube', ['class' => 'control-label']) !!}
                        {!! Form::text('video', old('video'), ['class' => 'form-control', 'placeholder' => 'Sólo el código']) !!}
                        @if($errors->has('video'))
                        <p class="help-block">
                            {{ $errors->first('video') }}
                        </p>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 form-group">
                        {!! Form::label('featured', 'Destacada', ['class' => 'control-label']) !!} &nbsp;
                        <label class="radio-inline">
                            <input type="radio" name="featured" id="inlineRadio1" value="1" {{ $content_page->featured == 1 ? 'checked' : '' }}> Sí
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="featured" id="inlineRadio2" value="0" {{ $content_page->featured == 0 ? 'checked' : '' }}> No
                        </label>
                        
                        @if($errors->has('featured'))
                        <p class="help-block">
                            {{ $errors->first('featured') }}
                        </p>
                        @endif
                    </div>
                    <div class="col-sm-6 form-group">
                        {!! Form::label('visible', 'Visible', ['class' => 'control-label']) !!} &nbsp;
                        <label class="radio-inline">
                            <input type="radio" name="visible" id="inlineRadio3" value="1" {{ $content_page->visible == 1 ? 'checked' : '' }}> Si
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="visible" id="inlineRadio4" value="0" {{ $content_page->visible == 0 ? 'checked' : '' }}> No
                        </label>
                        
                        @if($errors->has('visible'))
                        <p class="help-block">
                            {{ $errors->first('visible') }}
                        </p>
                        @endif
                    </div>
                </div>                
            </div>
        </div>
        {!! Form::submit('Guardar', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </div>
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                Imagen actual
            </div>
            <div class="panel-body">
                @if ($content_page->featured_image)
                <img src="{{ asset('images/novedades/'.$content_page->featured_image) }}">
                @endif
            </div>
        </div>
    </div>
    @stop
    @section('javascript')
    @parent
    <script src="{{ asset('vendor/admin/plugins/ckeditor/ckeditor.js') }}"></script>
    <script>
        $('.editor').each(function () {
            CKEDITOR.replace($(this).attr('id'),{
                filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
                filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
            });
        });
    </script>
    @stop