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
                            <td>{{ $user->role->title ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>Aprobado</th>
                            <td>{{ Form::checkbox("approved", 1, $user->approved == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->

            <p>&nbsp;</p>

            <a href="{{ route('admin.users.index') }}" class="btn btn-default">Volver</a>
        </div>
    </div>
@stop
