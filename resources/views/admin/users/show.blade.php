@extends('layouts.app')

@section('content')
    <h3 class="page-title">Usuarios</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            Ver
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Nombre</th>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th>Rol</th>
                            <td>{{ $user->role->title or '' }}</td>
                        </tr>
                        <tr>
                            <th>Aprobado</th>
                            <td>{{ Form::checkbox("approved", 1, $user->approved == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#internalnotifications" aria-controls="internalnotifications" role="tab" data-toggle="tab">Notifications</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="internalnotifications">
<table class="table table-bordered table-striped {{ count($internal_notifications) > 0 ? '' : '' }}">
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

            <p>&nbsp;</p>

            <a href="{{ route('admin.users.index') }}" class="btn btn-default">Volver</a>
        </div>
    </div>
@stop