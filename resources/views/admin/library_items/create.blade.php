@extends('layouts.app')

@section('content')
    <h3 class="page-title">Biblioteca / Archivos</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.library_items.store'], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
           Crear
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', 'Nombre *', ['class' => 'control-label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
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
                    {!! Form::textarea('description', old('description'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('description'))
                        <p class="help-block">
                            {{ $errors->first('description') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 form-group">
                    {!! Form::label('category_id', 'Categoría *', ['class' => 'control-label']) !!}
                    {!! Form::select('category_id', $categories, old('category_id'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('category_id'))
                        <p class="help-block">
                            {{ $errors->first('category_id') }}
                        </p>
                    @endif
                </div>

                <div class="col-md-4 form-group">
                    {!! Form::label('pdf', 'Archivo PDF *', ['class' => 'control-label']) !!}
                    {!! Form::hidden('pdf', old('pdf')) !!}
                    {!! Form::file('pdf', ['class' => 'form-control', 'required' => '']) !!}
                    {!! Form::hidden('pdf_max_size', 11) !!}
                    <p class="help-block"></p>
                    @if($errors->has('pdf'))
                        <p class="help-block">
                            {{ $errors->first('pdf') }}
                        </p>
                    @endif
                </div>
                <div class="col-md-4 form-group">
                    {!! Form::label('published', 'Publicado *', ['class' => 'control-label']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('published'))
                        <p class="help-block">
                            {{ $errors->first('published') }}
                        </p>
                    @endif
                    <div>
                        <label>
                            {!! Form::radio('published', '1', false, ['required' => '']) !!}
                            Sí
                        </label>
                        <label>
                            {!! Form::radio('published', '0', false, ['required' => '']) !!}
                            No
                        </label>
                    </div>
                    
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit('Guardar', ['class' => 'btn btn-danger']) !!}
    <a href="{{ route('admin.library_items.index') }}" class="btn btn-default">Cancelar</a>
    {!! Form::close() !!}
@stop

