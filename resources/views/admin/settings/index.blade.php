@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">
    @can('setting_create')
        <a href="{{ route('admin.settings.create') }}" class="btn btn-success pull-right">Agregar</a>
    @endcan
    Configuraciones</h3>
    @can('setting_delete')
    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.settings.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('quickadmin.qa_all')</a></li> |
            <li><a href="{{ route('admin.settings.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('quickadmin.qa_trash')</a></li>
        </ul>
    </p>
    @endcan


    <div class="panel panel-default">
        <div class="panel-heading">
            Listado
        </div>
        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($settings) > 0 ? 'datatable' : '' }} @can('setting_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('setting_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

                        <th>Constante</th>
                        <th>Valor</th>
                        @if( request('show_deleted') == 1 )
                        <th>Acciones</th>
                        @else
                        <th>Acciones</th>
                        @endif
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($settings) > 0)
                        @foreach ($settings as $setting)
                            <tr data-entry-id="{{ $setting->id }}">
                                @can('setting_delete')
                                    @if ( request('show_deleted') != 1 )<td></td>@endif
                                @endcan

                                <td field-key='key'>{{ $setting->key }}</td>
                                <td field-key='value'>{{ $setting->value }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    @can('setting_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('Está segur@?');",
                                        'route' => ['admin.settings.restore', $setting->id])) !!}
                                    {!! Form::submit('Recuperar', array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                    @can('setting_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('Está segur@?');",
                                        'route' => ['admin.settings.perma_del', $setting->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                </td>
                                @else
                                <td>
                                    @can('setting_view')
                                    <a href="{{ route('admin.settings.show',[$setting->id]) }}" class="btn btn-xs btn-primary">Ver</a>
                                    @endcan
                                    @can('setting_edit')
                                    <a href="{{ route('admin.settings.edit',[$setting->id]) }}" class="btn btn-xs btn-info">Modificar</a>
                                    @endcan
                                    @can('setting_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('Está segur@?');",
                                        'route' => ['admin.settings.destroy', $setting->id])) !!}
                                    {!! Form::submit('Borrar', array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7">Sin datos disponibles</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('setting_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.settings.mass_destroy') }}'; @endif
        @endcan

    </script>
@endsection