@extends('layouts.app')
@section('content')
<h3 class="page-title">Productos</h3>
<div class="row">
    <div class="col-md-8">
        {!! Form::model($product, ['method' => 'PUT', 'route' => ['admin.products.update', $product->id], 'files' => true,]) !!}
        {!! Form::hidden('target_folder', 'productos') !!}
        <div class="panel panel-default">
            <div class="panel-heading">
                Modificar
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12 form-group">
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
                    <div class="col-sm-6 form-group">
                        {!! Form::label('category_id', 'Categoría', ['class' => 'control-label']) !!}
                        {!! Form::select('category_id', $categories, old('category_id'), ['class' => 'form-control select2']) !!}
                        
                        @if($errors->has('category_id'))
                        <p class="help-block">
                            {{ $errors->first('category_id') }}
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
                        @if ($product->photo2)
                        <a href="{{ asset(env('UPLOAD_PATH').'/'.$product->photo2) }}" target="_blank"><img src="{{ asset(env('UPLOAD_PATH').'/thumb/'.$product->photo2) }}"></a>
                        @endif
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
                        @if ($product->photo3)
                        <a href="{{ asset(env('UPLOAD_PATH').'/'.$product->photo3) }}" target="_blank"><img src="{{ asset(env('UPLOAD_PATH').'/thumb/'.$product->photo3) }}"></a>
                        @endif
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
                        {!! Form::label('video', 'Video en youtube', ['class' => 'control-label']) !!}
                        {!! Form::text('video', old('video'), ['class' => 'form-control', 'placeholder' => 'solo el codigo']) !!}
                        
                        @if($errors->has('video'))
                        <p class="help-block">
                            {{ $errors->first('video') }}
                        </p>
                        @endif
                    </div>
                    <div class="col-sm-6 form-group">
                        {!! Form::label('link', 'Link externo', ['class' => 'control-label']) !!}
                        {!! Form::text('link', old('link'), ['class' => 'form-control', 'placeholder'=>'http:// o https://']) !!}
                        
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
                            <label class="radio-inline">
                                <input type="radio" name="featured" id="inlineRadio1" value="1" {{ $product->featured == 1 ? 'checked' : '' }}> Si
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="featured" id="inlineRadio2" value="0" {{ $product->featured == 0 ? 'checked' : '' }}> No
                            </label>
                        </div>
                        
                        @if($errors->has('featured'))
                        <p class="help-block">
                            {{ $errors->first('featured') }}
                        </p>
                        @endif
                    </div>
                    <div class="col-sm-6 form-group">
                        {!! Form::label('visible', 'Visible', ['class' => 'control-label']) !!}
                        <div>
                            <label class="radio-inline">
                                <input type="radio" name="visible" id="inlineRadio3" value="1" {{ $product->visible == 1 ? 'checked' : '' }}> Sí
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="visible" id="inlineRadio4" value="0" {{ $product->visible == 0 ? 'checked' : '' }}> No
                            </label>
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
    </div>
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                Foto actual
            </div>
            <div class="panel-body">
                @if ($product->photo1)
                <img src="{{ asset('/images/productos/'.$product->photo1) }}" style="max-width: 100%" class="img-responsive">
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