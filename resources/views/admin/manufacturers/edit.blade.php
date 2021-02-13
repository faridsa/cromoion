@extends('layouts.app')
@section('content')
<h3 class="page-title">Fabricantes</h3>

<div class="row">
    <div class="col-md-8">
        
        
        {!! Form::model($manufacturer, ['method' => 'PUT', 'route' => ['admin.manufacturers.update', $manufacturer->id], 'files' => true,]) !!}
    {!! Form::hidden('target_folder', 'marcas') !!}
        <div class="panel panel-default">
            <div class="panel-heading">
                Modificar
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
    </div>
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                Logo actual
            </div>
            <div class="panel-body">
                @if ($manufacturer->brand)
                <img src="{{ asset('images/marcas/'.$manufacturer->brand) }}">
                @endif
            </div>
        </div>
    </div>
</div>
    @stop