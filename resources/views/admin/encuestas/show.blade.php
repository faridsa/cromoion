@extends('layouts.app')

@section('content')
    <h3 class="page-title">Encuesta</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            Ver
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Empresa</th>
                            <td field-key='empresa'>{{ $encuesta->empresa }}</td>
                        </tr>
                        <tr>
                            <th>Nombre</th>
                            <td field-key='nombre'>{{ $encuesta->nombre }}</td>
                        </tr>
                        <tr>
                            <th>País</th>
                            <td field-key='pais'>{{ $encuesta->pais }}</td>
                        </tr>
                        <tr>
                            <th>Rapidez en la atención</th>
                            <td field-key='atencion_rapidez'>{{ $encuesta->atencion_rapidez }}</td>
                        </tr>
                        <tr>
                            <th>Cortesía</th>
                            <td field-key='atencion_cortesia'>{{ $encuesta->atencion_cortesia }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.encuesta.fields.atencion-solucion')</th>
                            <td field-key='atencion_solucion'>{{ $encuesta->atencion_solucion }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.encuesta.fields.servicio-cumplimiento-plazos-entrega')</th>
                            <td field-key='servicio_cumplimiento_plazos_entrega'>{{ $encuesta->servicio_cumplimiento_plazos_entrega }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.encuesta.fields.servicio-rapidez-asesoramiento')</th>
                            <td field-key='servicio_rapidez_asesoramiento'>{{ $encuesta->servicio_rapidez_asesoramiento }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.encuesta.fields.servicio-calidad-servicio-postventa')</th>
                            <td field-key='servicio_calidad_servicio_postventa'>{{ $encuesta->servicio_calidad_servicio_postventa }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.encuesta.fields.servicio-velocidad-respuesta')</th>
                            <td field-key='servicio_velocidad_respuesta'>{{ $encuesta->servicio_velocidad_respuesta }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.encuesta.fields.servicio-respuesta-ante-imprevistos')</th>
                            <td field-key='servicio_respuesta_ante_imprevistos'>{{ $encuesta->servicio_respuesta_ante_imprevistos }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.encuesta.fields.comentarios')</th>
                            <td field-key='comentarios'>{!! $encuesta->comentarios !!}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.encuestas.index') }}" class="btn btn-default">Volver</a>
        </div>
    </div>
@stop
