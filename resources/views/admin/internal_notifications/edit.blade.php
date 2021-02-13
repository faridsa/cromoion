@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.internal-notifications.title')</h3>
    
    {!! Form::model($internal_notification, ['method' => 'PUT', 'route' => ['admin.internal_notifications.update', $internal_notification->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            Modificar
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('text', 'Text*', ['class' => 'control-label']) !!}
                    {!! Form::text('text', old('text'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    
                    @if($errors->has('text'))
                        <p class="help-block">
                            {{ $errors->first('text') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('link', 'Link', ['class' => 'control-label']) !!}
                    {!! Form::text('link', old('link'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    
                    @if($errors->has('link'))
                        <p class="help-block">
                            {{ $errors->first('link') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('users', 'Users*', ['class' => 'control-label']) !!}
                    {!! Form::select('users[]', $users, old('users') ? old('users') : $internal_notification->users->pluck('id')->toArray(), ['class' => 'form-control select2', 'multiple' => 'multiple', 'required' => '']) !!}
                    
                    @if($errors->has('users'))
                        <p class="help-block">
                            {{ $errors->first('users') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit('Guardar', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

