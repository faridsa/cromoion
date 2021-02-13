@extends('layouts.app')

@section('content')
    <h3 class="page-title">Biblioteca / Categorías</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.library_categories.store']]) !!}

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
            
        </div>
    </div>

    {!! Form::submit('Guardar', ['class' => 'btn btn-danger']) !!}
    <a href="{{ route('admin.library_categories.index') }}" class="btn btn-default">Cancelar</a>
    {!! Form::close() !!}
@stop

