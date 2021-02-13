@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.pedidos.title')</h3>
    
    {!! Form::model($pedido, ['method' => 'PUT', 'route' => ['admin.pedidos.update', $pedido->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            Modificar
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('empresa', trans('quickadmin.pedidos.fields.empresa').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('empresa', old('empresa'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('empresa'))
                        <p class="help-block">
                            {{ $errors->first('empresa') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('nombre', trans('quickadmin.pedidos.fields.nombre').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('nombre', old('nombre'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('nombre'))
                        <p class="help-block">
                            {{ $errors->first('nombre') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('telefono', trans('quickadmin.pedidos.fields.telefono').'', ['class' => 'control-label']) !!}
                    {!! Form::text('telefono', old('telefono'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('telefono'))
                        <p class="help-block">
                            {{ $errors->first('telefono') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('email', trans('quickadmin.pedidos.fields.email').'*', ['class' => 'control-label']) !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('email'))
                        <p class="help-block">
                            {{ $errors->first('email') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('tipo_de_producto', trans('quickadmin.pedidos.fields.tipo-de-producto').'*', ['class' => 'control-label']) !!}
                    {!! Form::select('tipo_de_producto', $enum_tipo_de_producto, old('tipo_de_producto'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('tipo_de_producto'))
                        <p class="help-block">
                            {{ $errors->first('tipo_de_producto') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('comentarios', trans('quickadmin.pedidos.fields.comentarios').'*', ['class' => 'control-label']) !!}
                    {!! Form::textarea('comentarios', old('comentarios'), ['class' => 'form-control ', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('comentarios'))
                        <p class="help-block">
                            {{ $errors->first('comentarios') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit('Guardar', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

