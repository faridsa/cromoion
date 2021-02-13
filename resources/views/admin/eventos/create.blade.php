@extends('layouts.app')

@section('content')
    <h3 class="page-title">Eventos</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.eventos.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            Creación
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
                <div class="col-sm-6 form-group">
                    {!! Form::label('fecha', 'Fecha', ['class' => 'control-label']) !!}
                    {!! Form::text('fecha', old('fecha'), ['class' => 'form-control date', 'placeholder' => '']) !!}
                    
                    @if($errors->has('fecha'))
                        <p class="help-block">
                            {{ $errors->first('fecha') }}
                        </p>
                    @endif
                </div>
                <div class="col-sm-6 form-group">
                    {!! Form::label('visible', 'Visible', ['class' => 'control-label']) !!}
                    <div>
                    {!! Form::label('visible', 'Sí ', ['class' => 'radio-inline']) !!}
                    {!! Form::radio('visible', '1') !!} &nbsp;
                    {!! Form::label('visible', 'No ', ['class' => 'radio-inline']) !!}
                    {!! Form::radio('visible', '0') !!}
                    </div>
                    
                    @if($errors->has('visible'))
                        <p class="help-block">
                            {{ $errors->first('visible') }}
                        </p>
                    @endif
                </div>

                    
                    @if($errors->has('visible'))
                        <p class="help-block">
                            {{ $errors->first('visible') }}
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
    <script src="https://cdn.datatables.net/select/1.2.0/js/dataTables.select.min.js"></script>    
    <script>
 $('.date').datepicker({
            autoclose: true,
            dateFormat: "{{ config('app.date_format_js') }}"
        });    
    </script>

@stop