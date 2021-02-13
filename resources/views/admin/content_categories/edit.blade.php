@extends('layouts.app')

@section('content')
    <h3 class="page-title">Categorías</h3>
    
    {!! Form::model($content_category, ['method' => 'PUT', 'route' => ['admin.content_categories.update', $content_category->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            Modificación de categoría de novedades
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('title', 'Categoría', ['class' => 'control-label']) !!}
                    {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    
                    @if($errors->has('title'))
                        <p class="help-block">
                            {{ $errors->first('title') }}
                        </p>
                    @endif
                </div>
            </div>
            {{--
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('slug', 'Slug', ['class' => 'control-label']) !!}
                    {!! Form::text('slug', old('slug'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    
                    @if($errors->has('slug'))
                        <p class="help-block">
                            {{ $errors->first('slug') }}
                        </p>
                    @endif
                </div>
            </div>--}}
            
        </div>
    </div>

    {!! Form::submit('Guardar', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

