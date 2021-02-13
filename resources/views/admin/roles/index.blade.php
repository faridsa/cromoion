@extends('layouts.app')

@section('content')
    <h3 class="page-title">Roles</h3>
    @can('role_create')
    <p>
        <a href="{{ route('admin.roles.create') }}" class="btn btn-success pull-right">Agregar</a>
        
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            Listado
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($roles) > 0 ? '' : '' }} @can('role_delete') dt-select @endcan">
                <thead>
                    <tr>

                        <th>Rol</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($roles) > 0)
                        @foreach ($roles as $role)
                            <tr data-entry-id="{{ $role->id }}">

                                <td>{{ $role->title }}</td>
                                <td>
                                    @can('role_view')
                                    <a href="{{ route('admin.roles.show',[$role->id]) }}" class="btn btn-xs btn-primary">Ver</a>
                                    @endcan
                                    @can('role_edit')
                                    <a href="{{ route('admin.roles.edit',[$role->id]) }}" class="btn btn-xs btn-info">Modificar</a>
                                    @endcan
                                    @can('role_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('Está segur@?');",
                                        'route' => ['admin.roles.destroy', $role->id])) !!}
                                    {!! Form::submit('Borrar', array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5">Sin datos disponibles</td>
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