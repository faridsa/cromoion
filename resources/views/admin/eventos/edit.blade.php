@extends('layouts.app')

@section('content')
    <h3 class="page-title">Eventos</h3>
    
    {!! Form::model($evento, ['method' => 'PUT', 'route' => ['admin.eventos.update', $evento->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            Modificar
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('nombre', 'Nombre*', ['class' => 'control-label']) !!}
                    {!! Form::text('nombre', old('nombre'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    
                    @if($errors->has('nombre'))
                        <p class="help-block">
                            {{ $errors->first('nombre') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('lugar', 'Lugar*', ['class' => 'control-label']) !!}
                    {!! Form::text('lugar', old('lugar'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    
                    @if($errors->has('lugar'))
                        <p class="help-block">
                            {{ $errors->first('lugar') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('fecha', 'Fecha', ['class' => 'control-label']) !!}
                    {!! Form::text('fecha', old('fecha'), ['class' => 'form-control timepicker', 'placeholder' => '']) !!}
                    
                    @if($errors->has('fecha'))
                        <p class="help-block">
                            {{ $errors->first('fecha') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('publicado', 'Publicado', ['class' => 'control-label']) !!}
                    {!! Form::number('publicado', old('publicado'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    
                    @if($errors->has('publicado'))
                        <p class="help-block">
                            {{ $errors->first('publicado') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit('Guardar', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

@section('javascript')
    @parent
    <script src="{{ url('quickadmin/js') }}/timepicker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.4.5/jquery-ui-timepicker-addon.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.0/js/dataTables.select.min.js"></script>    <script>
        $('.timepicker').datetimepicker({
            autoclose: true,
            timeFormat: "HH:mm:ss",
            timeOnly: true
        });
    </script>

@stop