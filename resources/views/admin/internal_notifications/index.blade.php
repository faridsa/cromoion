@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.internal-notifications.title')</h3>
    @can('internal_notification_create')
    <p>
        <a href="{{ route('admin.internal_notifications.create') }}" class="btn btn-success pull-right">Agregar</a>
        
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            Listado
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($internal_notifications) > 0 ? '' : '' }} @can('internal_notification_delete') dt-select @endcan">
                <thead>
                    <tr>

                        <th>@lang('quickadmin.internal-notifications.fields.text')</th>
                        <th>@lang('quickadmin.internal-notifications.fields.link')</th>
                        <th>@lang('quickadmin.internal-notifications.fields.users')</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($internal_notifications) > 0)
                        @foreach ($internal_notifications as $internal_notification)
                            <tr data-entry-id="{{ $internal_notification->id }}">

                                <td>{{ $internal_notification->text }}</td>
                                <td>{{ $internal_notification->link }}</td>
                                <td>
                                    @foreach ($internal_notification->users as $singleUsers)
                                        <span class="label label-info label-many">{{ $singleUsers->name }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @can('internal_notification_view')
                                    <a href="{{ route('admin.internal_notifications.show',[$internal_notification->id]) }}" class="btn btn-xs btn-primary">Ver</a>
                                    @endcan
                                    @can('internal_notification_edit')
                                    <a href="{{ route('admin.internal_notifications.edit',[$internal_notification->id]) }}" class="btn btn-xs btn-info">Modificar</a>
                                    @endcan
                                    @can('internal_notification_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('Está segur@?');",
                                        'route' => ['admin.internal_notifications.destroy', $internal_notification->id])) !!}
                                    {!! Form::submit('Borrar', array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
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

    </script>
@endsection