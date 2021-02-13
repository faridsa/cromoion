@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.subscriptions.title')</h3>
    
    {!! Form::model($subscription, ['method' => 'PUT', 'route' => ['admin.subscriptions.update', $subscription->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('email', trans('quickadmin.subscriptions.fields.email').'*', ['class' => 'control-label']) !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    
                    @if($errors->has('email'))
                        <p class="help-block">
                            {{ $errors->first('email') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
     <a href="{{ route('admin.subscriptions.index') }}" class="btn btn-default">Cancelar</a>
    {!! Form::close() !!}
@stop

