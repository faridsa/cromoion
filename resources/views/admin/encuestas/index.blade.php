@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')
@section('content')
<h3 class="page-title">Encuesta</h3>

<div class="panel panel-default">
    <div class="panel-heading">
        Listado
    </div>
    <div class="panel-body table-responsive">
        <table class="table table-bordered table-striped {{ count($encuestas) > 0 ? 'datatable' : '' }}">
            <thead>
                <tr>
                    <th>Empresa</th>
                    <th>Nombre</th>
                    <th>País</th>
                    <th>Rapidez en la atención</th>
                    <th>Cortesía</th>
                    <th>@lang('quickadmin.encuesta.fields.atencion-solucion')</th>
                    <th>@lang('quickadmin.encuesta.fields.servicio-cumplimiento-plazos-entrega')</th>
                    <th>@lang('quickadmin.encuesta.fields.servicio-rapidez-asesoramiento')</th>
                    <th>@lang('quickadmin.encuesta.fields.servicio-calidad-servicio-postventa')</th>
                    <th>@lang('quickadmin.encuesta.fields.servicio-velocidad-respuesta')</th>
                    <th>@lang('quickadmin.encuesta.fields.servicio-respuesta-ante-imprevistos')</th>
                    <th>@lang('quickadmin.encuesta.fields.comentarios')</th>
                    @if( request('show_deleted') == 1 )
                    <th>&nbsp;</th>
                    @else
                    <th>&nbsp;</th>
                    @endif
                </tr>
            </thead>
            
            <tbody>
                @if (count($encuestas) > 0)
                @foreach ($encuestas as $encuesta)
                <tr data-entry-id="{{ $encuesta->id }}">
                    <td field-key='empresa'>{{ $encuesta->empresa }}</td>
                    <td field-key='nombre'>{{ $encuesta->nombre }}</td>
                    <td field-key='pais'>{{ $encuesta->pais }}</td>
                    <td field-key='atencion_rapidez'>{{ $encuesta->atencion_rapidez }}</td>
                    <td field-key='atencion_cortesia'>{{ $encuesta->atencion_cortesia }}</td>
                    <td field-key='atencion_solucion'>{{ $encuesta->atencion_solucion }}</td>
                    <td field-key='servicio_cumplimiento_plazos_entrega'>{{ $encuesta->servicio_cumplimiento_plazos_entrega }}</td>
                    <td field-key='servicio_rapidez_asesoramiento'>{{ $encuesta->servicio_rapidez_asesoramiento }}</td>
                    <td field-key='servicio_calidad_servicio_postventa'>{{ $encuesta->servicio_calidad_servicio_postventa }}</td>
                    <td field-key='servicio_velocidad_respuesta'>{{ $encuesta->servicio_velocidad_respuesta }}</td>
                    <td field-key='servicio_respuesta_ante_imprevistos'>{{ $encuesta->servicio_respuesta_ante_imprevistos }}</td>
                    <td field-key='comentarios'>{!! $encuesta->comentarios !!}</td>
                    @if( request('show_deleted') == 1 )
                    <td>
                        @can('encuestum_delete')
                        {!! Form::open(array(
                        'style' => 'display: inline-block;',
                        'method' => 'POST',
                        'onsubmit' => "return confirm('Está segur@?');",
                        'route' => ['admin.encuestas.restore', $encuesta->id])) !!}
                        {!! Form::submit('Recuperar', array('class' => 'btn btn-xs btn-success')) !!}
                        {!! Form::close() !!}
                        @endcan
                        @can('encuestum_delete')
                        {!! Form::open(array(
                        'style' => 'display: inline-block;',
                        'method' => 'DELETE',
                        'onsubmit' => "return confirm('Está segur@?');",
                        'route' => ['admin.encuestas.perma_del', $encuesta->id])) !!}
                        {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                        {!! Form::close() !!}
                        @endcan
                    </td>
                    @else
                    <td>
                        @can('encuestum_view')
                        <a href="{{ route('admin.encuestas.show',[$encuesta->id]) }}" class="btn btn-xs btn-primary">Ver</a>
                        @endcan
                        
                        @can('encuestum_delete')
                        {!! Form::open(array(
                        'style' => 'display: inline-block;',
                        'method' => 'DELETE',
                        'onsubmit' => "return confirm('Está segur@?');",
                        'route' => ['admin.encuestas.destroy', $encuesta->id])) !!}
                        {!! Form::submit('Borrar', array('class' => 'btn btn-xs btn-danger')) !!}
                        {!! Form::close() !!}
                        @endcan
                    </td>
                    @endif
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="17">Sin datos disponibles</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@stop
@section('javascript')
<script>

</script>
@endsection