@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.inquiries.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.inquiries.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            Creación
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', trans('quickadmin.inquiries.fields.name').'*', ['class' => 'control-label']) !!}
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
                    {!! Form::label('email', trans('quickadmin.inquiries.fields.email').'', ['class' => 'control-label']) !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => '']) !!}
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
                    {!! Form::label('company', trans('quickadmin.inquiries.fields.company').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('company', old('company'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('company'))
                        <p class="help-block">
                            {{ $errors->first('company') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('phone', trans('quickadmin.inquiries.fields.phone').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('phone', old('phone'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('phone'))
                        <p class="help-block">
                            {{ $errors->first('phone') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('product', trans('quickadmin.inquiries.fields.product').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('product', old('product'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('product'))
                        <p class="help-block">
                            {{ $errors->first('product') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('view', trans('quickadmin.inquiries.fields.view').'', ['class' => 'control-label']) !!}
                    {!! Form::number('view', old('view'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('view'))
                        <p class="help-block">
                            {{ $errors->first('view') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('replied', trans('quickadmin.inquiries.fields.replied').'', ['class' => 'control-label']) !!}
                    {!! Form::number('replied', old('replied'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('replied'))
                        <p class="help-block">
                            {{ $errors->first('replied') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit('Guardar', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

