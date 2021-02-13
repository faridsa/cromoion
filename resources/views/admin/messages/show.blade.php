@extends('layouts.app')

@section('content')
    <h3 class="page-title">Formularios de contacto</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            Ver
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Nombre</th>
                            <td field-key='name'>{{ $message->name }}</td>
                        </tr>
                        <tr>
                            <th>Empresa</th>
                            <td field-key='company'>{{ $message->company }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td field-key='email'>{{ $message->email }}</td>
                        </tr>
                        <tr>
                            <th>Teléfono</th>
                            <td field-key='phone'>{{ $message->phone }}</td>
                        </tr>
                        <tr>
                            <th>Dirección</th>
                            <td field-key='address'>{{ $message->address }}</td>
                        </tr>
                        <tr>
                            <th>CP</th>
                            <td field-key='zip'>{{ $message->zip }}</td>
                        </tr>
                        <tr>
                            <th>Ciudad</th>
                            <td field-key='city'>{{ $message->city }}</td>
                        </tr>
                        <tr>
                            <th>Provincia</th>
                            <td field-key='state'>{{ $message->state }}</td>
                        </tr>
                        <tr>
                            <th>País</th>
                            <td field-key='country'>{{ $message->country }}</td>
                        </tr>
                        <tr>
                            <th>Mensaje</th>
                            <td field-key='message'>{!! $message->comments !!}</td>
                        </tr>
                        <tr>
                            <th>Leído</th>
                            <td field-key='viewed'>{{ $message->viewed==1 ? 'Si' : 'No' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.messages.index') }}" class="btn btn-default">Volver</a>
        </div>
    </div>
@stop
