@extends('layouts.app')

@section('content')
    <h3 class="page-title">Encuesta</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.encuestas.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            Creación
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('empresa', trans('quickadmin.encuesta.fields.empresa').'*', ['class' => 'control-label']) !!}
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
                    {!! Form::label('nombre', trans('quickadmin.encuesta.fields.nombre').'*', ['class' => 'control-label']) !!}
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
                    {!! Form::label('pais', trans('quickadmin.encuesta.fields.pais').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('pais', old('pais'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('pais'))
                        <p class="help-block">
                            {{ $errors->first('pais') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('atencion_rapidez', trans('quickadmin.encuesta.fields.atencion-rapidez').'*', ['class' => 'control-label']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('atencion_rapidez'))
                        <p class="help-block">
                            {{ $errors->first('atencion_rapidez') }}
                        </p>
                    @endif
                    <div>
                        <label>
                            {!! Form::radio('atencion_rapidez', 'ns-nc', false, ['required' => '']) !!}
                            NS/NC
                        </label>
                    </div>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('atencion_cortesia', trans('quickadmin.encuesta.fields.atencion-cortesia').'*', ['class' => 'control-label']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('atencion_cortesia'))
                        <p class="help-block">
                            {{ $errors->first('atencion_cortesia') }}
                        </p>
                    @endif
                    <div>
                        <label>
                            {!! Form::radio('atencion_cortesia', 'ns-nc', false, ['required' => '']) !!}
                            NS/NC
                        </label>
                    </div>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('atencion_solucion', trans('quickadmin.encuesta.fields.atencion-solucion').'*', ['class' => 'control-label']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('atencion_solucion'))
                        <p class="help-block">
                            {{ $errors->first('atencion_solucion') }}
                        </p>
                    @endif
                    <div>
                        <label>
                            {!! Form::radio('atencion_solucion', 'ns-nc', false, ['required' => '']) !!}
                            NS/NC
                        </label>
                    </div>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('servicio_cumplimiento_plazos_entrega', trans('quickadmin.encuesta.fields.servicio-cumplimiento-plazos-entrega').'*', ['class' => 'control-label']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('servicio_cumplimiento_plazos_entrega'))
                        <p class="help-block">
                            {{ $errors->first('servicio_cumplimiento_plazos_entrega') }}
                        </p>
                    @endif
                    <div>
                        <label>
                            {!! Form::radio('servicio_cumplimiento_plazos_entrega', 'ns-nc', false, ['required' => '']) !!}
                            NS/NC
                        </label>
                    </div>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('servicio_rapidez_asesoramiento', trans('quickadmin.encuesta.fields.servicio-rapidez-asesoramiento').'*', ['class' => 'control-label']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('servicio_rapidez_asesoramiento'))
                        <p class="help-block">
                            {{ $errors->first('servicio_rapidez_asesoramiento') }}
                        </p>
                    @endif
                    <div>
                        <label>
                            {!! Form::radio('servicio_rapidez_asesoramiento', 'ns-nc', false, ['required' => '']) !!}
                            NS/NC
                        </label>
                    </div>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('servicio_calidad_servicio_postventa', trans('quickadmin.encuesta.fields.servicio-calidad-servicio-postventa').'*', ['class' => 'control-label']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('servicio_calidad_servicio_postventa'))
                        <p class="help-block">
                            {{ $errors->first('servicio_calidad_servicio_postventa') }}
                        </p>
                    @endif
                    <div>
                        <label>
                            {!! Form::radio('servicio_calidad_servicio_postventa', 'ns-nc', false, ['required' => '']) !!}
                            NS/NC
                        </label>
                    </div>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('servicio_velocidad_respuesta', trans('quickadmin.encuesta.fields.servicio-velocidad-respuesta').'*', ['class' => 'control-label']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('servicio_velocidad_respuesta'))
                        <p class="help-block">
                            {{ $errors->first('servicio_velocidad_respuesta') }}
                        </p>
                    @endif
                    <div>
                        <label>
                            {!! Form::radio('servicio_velocidad_respuesta', 'ns-nc', false, ['required' => '']) !!}
                            NS/NC
                        </label>
                    </div>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('servicio_respuesta_ante_imprevistos', trans('quickadmin.encuesta.fields.servicio-respuesta-ante-imprevistos').'*', ['class' => 'control-label']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('servicio_respuesta_ante_imprevistos'))
                        <p class="help-block">
                            {{ $errors->first('servicio_respuesta_ante_imprevistos') }}
                        </p>
                    @endif
                    <div>
                        <label>
                            {!! Form::radio('servicio_respuesta_ante_imprevistos', 'ns-nc', false, ['required' => '']) !!}
                            NS/NC
                        </label>
                    </div>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('comentarios', trans('quickadmin.encuesta.fields.comentarios').'', ['class' => 'control-label']) !!}
                    {!! Form::textarea('comentarios', old('comentarios'), ['class' => 'form-control ', 'placeholder' => '']) !!}
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

