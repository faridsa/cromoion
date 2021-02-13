@extends('layouts.app')

@section('content')
    <h3 class="page-title">Productos</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.products.store'], 'files' => true,]) !!}
    {!! Form::hidden('target_folder', 'productos') !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            Creación de producto
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-6 form-group">
                    {!! Form::label('name', 'Nombre', ['class' => 'control-label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>

            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('description', 'Descripción', ['class' => 'control-label']) !!}
                    {!! Form::textarea('description', old('description'), ['class' => 'form-control editor', 'placeholder' => '']) !!}
                    
                    @if($errors->has('description'))
                        <p class="help-block">
                            {{ $errors->first('description') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                {{--<div class="col-xs-12 form-group">
                    {!! Form::label('price', 'Precio', ['class' => 'control-label']) !!}
                    {!! Form::text('price', old('price'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    
                    @if($errors->has('price'))
                        <p class="help-block">
                            {{ $errors->first('price') }}
                        </p>
                    @endif
                </div>--}}
            </div>
            <div class="row">
                <div class="col-sm-6 form-group">
                    {!! Form::label('category_id', 'Categoría', ['class' => 'control-label']) !!}
                    {!! Form::select('category_id', $categories, old('category_id'), ['class' => 'form-control select2', 'placeholder'=>'Seleccione']) !!}
                    
                    @if($errors->has('category'))
                        <p class="help-block">
                            {{ $errors->first('category') }}
                        </p>
                    @endif
                </div>
                <div class="col-sm-6 form-group">
                    {!! Form::label('manufacturer_id', 'Fabricante / Marca', ['class' => 'control-label']) !!}
                    {!! Form::select('manufacturer_id', $manufacturers, old('manufacturer_id'), ['class' => 'form-control select2']) !!}
                    
                    @if($errors->has('manufacturer_id'))
                        <p class="help-block">
                            {{ $errors->first('manufacturer_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 form-group">
                    {!! Form::label('photo1', 'Foto de producto', ['class' => 'control-label']) !!}
                    {!! Form::file('photo1', ['class' => 'form-control', 'style' => 'margin-top: 4px;']) !!}
                    {!! Form::hidden('photo1_max_size', 8) !!}
                    {!! Form::hidden('photo1_max_width', 6000) !!}
                    {!! Form::hidden('photo1_max_height', 6000) !!}
                    
                    @if($errors->has('photo1'))
                        <p class="help-block">
                            {{ $errors->first('photo1') }}
                        </p>
                    @endif
                </div>
                <div class="col-sm-6 form-group">
                        {!! Form::label('pdf', 'Archivo PDF', ['class' => 'control-label']) !!}
                        {!! Form::file('pdf', ['class' => 'form-control', 'style' => 'margin-top: 4px;']) !!}
                        {!! Form::hidden('pdf_max_size', 8) !!}
                        @if($errors->has('pdf'))
                        <p class="help-block">
                            {{ $errors->first('pdf') }}
                        </p>
                        @endif
                    </div>
            </div>
            {{--
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('photo2', trans('quickadmin.products.fields.photo2'), ['class' => 'control-label']) !!}
                    {!! Form::file('photo2', ['class' => 'form-control', 'style' => 'margin-top: 4px;']) !!}
                    {!! Form::hidden('photo2_max_size', 8) !!}
                    {!! Form::hidden('photo2_max_width', 6000) !!}
                    {!! Form::hidden('photo2_max_height', 6000) !!}
                    
                    @if($errors->has('photo2'))
                        <p class="help-block">
                            {{ $errors->first('photo2') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('photo3', trans('quickadmin.products.fields.photo3'), ['class' => 'control-label']) !!}
                    {!! Form::file('photo3', ['class' => 'form-control', 'style' => 'margin-top: 4px;']) !!}
                    {!! Form::hidden('photo3_max_size', 8) !!}
                    {!! Form::hidden('photo3_max_width', 6000) !!}
                    {!! Form::hidden('photo3_max_height', 6000) !!}
                    
                    @if($errors->has('photo3'))
                        <p class="help-block">
                            {{ $errors->first('photo3') }}
                        </p>
                    @endif
                </div>
            </div>
            --}}
            <div class="row">
                <div class="col-sm-6 form-group">
                    {!! Form::label('video', 'Video de Youtube', ['class' => 'control-label']) !!}
                    {!! Form::text('video', old('video'), ['class' => 'form-control', 'placeholder' => 'Sólo el código']) !!}
                    
                    @if($errors->has('video'))
                        <p class="help-block">
                            {{ $errors->first('video') }}
                        </p>
                    @endif
                </div>
                <div class="col-sm-6 form-group">
                    {!! Form::label('link', 'Link externo', ['class' => 'control-label']) !!}
                    {!! Form::text('link', old('link'), ['class' => 'form-control', 'placeholder' => 'htttp:// o https://']) !!}
                    
                    @if($errors->has('link'))
                        <p class="help-block">
                            {{ $errors->first('link') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 form-group">
                    {!! Form::label('featured', 'Destacado', ['class' => 'control-label']) !!}
                   <div>
                    {!! Form::label('featured', 'Sí ', ['class' => 'radio-inline']) !!}
                    {!! Form::radio('featured', '1') !!} &nbsp;
                    {!! Form::label('featured', 'No ', ['class' => 'radio-inline']) !!}
                    {!! Form::radio('featured', '0') !!}
                    </div>
                    
                    @if($errors->has('featured'))
                        <p class="help-block">
                            {{ $errors->first('featured') }}
                        </p>
                    @endif
                </div>
                <div class="col-sm-6 form-group">
                    {!! Form::label('visible', 'Publicado', ['class' => 'control-label']) !!}
                    <div>
                    {!! Form::label('visible', 'Sí ', ['class' => 'radio-inline']) !!}
                    {!! Form::radio('visible', '1') !!} &nbsp;
                    {!! Form::label('visible', 'No ', ['class' => 'radio-inline']) !!}
                    {!! Form::radio('visible', '0') !!}
                    </div>
                    
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
    <a href="{{ route('admin.products.index') }}" class="btn btn-default">Cancelar</a>
    {!! Form::close() !!}
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
