@extends('layouts.app')

@section('content')
    <h3 class="page-title">Eventos</h3>

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
                            <td>{{ $evento->nombre }}</td>
                        </tr>
                        <tr>
                            <th>Lugar</th>
                            <td>{{ $evento->lugar }}</td>
                        </tr>
                        <tr>
                            <th>Fecha</th>
                            <td>{{ $evento->fecha }}</td>
                        </tr>
                        <tr>
                            <th>Publicado</th>
                            <td>{{ $evento->publicado }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.eventos.index') }}" class="btn btn-default">Volver</a>
        </div>
    </div>
@stop