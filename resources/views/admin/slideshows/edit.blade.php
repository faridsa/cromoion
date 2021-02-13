@extends('layouts.app')
@section('content')
<h3 class="page-title">Slideshows</h3>
<div class="row">
    <div class="col-sm-6">
        {!! Form::model($slideshow, ['method' => 'PUT', 'route' => ['admin.slideshows.update', $slideshow->id], 'files' => true,]) !!}
        {!! Form::hidden('target_folder', 'slideshows') !!}
        <div class="panel panel-default">
            <div class="panel-heading">
                Modificar
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12 form-group">
                        {!! Form::label('titulo', 'Titulo', ['class' => 'control-label']) !!}
                        {!! Form::text('titulo', old('titulo'), ['class' => 'form-control', 'placeholder' => '']) !!}
                        
                        @if($errors->has('titulo'))
                        <p class="help-block">
                            {{ $errors->first('titulo') }}
                        </p>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 form-group">
                        {!! Form::label('image_desktop', 'Imagen desktop', ['class' => 'control-label']) !!}
                        {!! Form::file('image_desktop', ['class' => 'form-control', 'style' => 'margin-top: 4px;']) !!}
                        {!! Form::hidden('image_max_size', 1) !!}
                        {!! Form::hidden('image_max_width', 1920) !!}
                        {!! Form::hidden('image_max_height', 600) !!}
                        
                        @if($errors->has('image_desktop'))
                        <p class="help-block">
                            {{ $errors->first('image_desktop') }}
                        </p>
                        @endif
                    </div>
                    <div class="col-sm-6 form-group">
                        {!! Form::label('image_mobile', 'Imagen movil', ['class' => 'control-label']) !!}
                        {!! Form::file('image_mobile', ['class' => 'form-control', 'style' => 'margin-top: 4px;']) !!}
                        {!! Form::hidden('image_max_size', 1) !!}
                        {!! Form::hidden('image_max_width', 1920) !!}
                        {!! Form::hidden('image_max_height', 600) !!}
                        
                        @if($errors->has('image_mobile'))
                        <p class="help-block">
                            {{ $errors->first('image_mobile') }}
                        </p>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 form-group">
                        {!! Form::label('texto', 'Texto', ['class' => 'control-label']) !!}
                        {!! Form::textarea('texto', old('texto'), ['class' => 'form-control editor', 'placeholder' => '']) !!}
                        
                        @if($errors->has('texto'))
                        <p class="help-block">
                            {{ $errors->first('texto') }}
                        </p>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 form-group">
                        {!! Form::label('link', 'Link', ['class' => 'control-label']) !!}
                        {!! Form::text('link', old('link'), ['class' => 'form-control', 'placeholder' => '']) !!}
                        
                        @if($errors->has('link'))
                        <p class="help-block">
                            {{ $errors->first('link') }}
                        </p>
                        @endif
                    </div>
                   {{--}}<div class="col-sm-6 form-group">
                        {!! Form::label('texto_boton', 'Texto botón', ['class' => 'control-label']) !!}
                        {!! Form::text('texto_boton', old('texto_boton'), ['class' => 'form-control', 'placeholder' => '']) !!}
                        
                        @if($errors->has('texto_boton'))
                        <p class="help-block">
                            {{ $errors->first('texto_boton') }}
                        </p>
                        @endif
                    </div>--}}

                    <div class="col-xs-3 form-group">
                        {!! Form::label('order', 'Orden', ['class' => 'control-label']) !!}
                        {!! Form::number('order', old('order'), ['class' => 'form-control', 'placeholder' => '']) !!}
                        
                        @if($errors->has('order'))
                        <p class="help-block">
                            {{ $errors->first('order') }}
                        </p>
                        @endif
                    </div>
                    <div class="col-xs-3 form-group">
                        {!! Form::label('published', 'Publicado', ['class' => 'control-label']) !!}
                        <div>
                            <label class="radio-inline">
                                <input type="radio" name="published" id="inlineRadio3" value="1" {{ $slideshow->published == 1 ? 'checked' : '' }}> Sí
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="published" id="inlineRadio4" value="0" {{ $slideshow->published == 0 ? 'checked' : '' }}> No
                            </label>
                        </div>
                        @if($errors->has('published'))
                        <p class="help-block">
                            {{ $errors->first('published') }}
                        </p>
                        @endif
                    </div>
                </div>
                
            </div>
        </div>
        {!! Form::submit('Guardar', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </div>
    <div class="col-sm-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                Imágenes actuales
            </div>
            @if ($slideshow->imagen_desktop)
            <div class="panel-body">
                <label>Imagen desktop</label>
                <img src="{{ asset('images/slideshows/'.$slideshow->imagen_desktop) }}" class="img-responsive" style="max-width: 600px">
            </div>
            @endif
            @if ($slideshow->imagen_movil)
            <div class="panel-body">
                <label>Imagen movil</label>
                <img src="{{ asset('images/slideshows/'.$slideshow->imagen_movil) }}" class="img-responsive" style="max-width: 400px">
            </div>
            @endif
            
        </div>
    </div>
</div>
@stop
@section('javascript')
@parent
<script src="//cdn.ckeditor.com/4.7.1/standard/ckeditor.js"></script>
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