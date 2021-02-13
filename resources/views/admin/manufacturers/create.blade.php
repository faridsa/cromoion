@extends('layouts.app')

@section('content')
    <h3 class="page-title">Fabricantes</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.manufacturers.store'], 'files' => true,]) !!}
    {!! Form::hidden('target_folder', 'marcas') !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            Creación
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-8 form-group">
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
                <div class="col-xs-4 form-group">
                    {!! Form::label('brand', 'Logo', ['class' => 'control-label']) !!}
                    {!! Form::file('brand', ['class' => 'form-control', 'style' => 'margin-top: 4px;']) !!}
                    {!! Form::hidden('brand_max_size', 1) !!}
                    {!! Form::hidden('brand_max_width', 400) !!}
                    {!! Form::hidden('brand_max_height', 300) !!}
                    
                    @if($errors->has('brand'))
                        <p class="help-block">
                            {{ $errors->first('brand') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit('Guardar', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

