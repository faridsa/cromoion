@extends('layouts.app')

@section('content')
    <h3 class="page-title">Configuraciones</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            Ver
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Constante</th>
                            <td field-key='key'>{{ $setting->key }}</td>
                        </tr>
                        <tr>
                            <th>Valor</th>
                            <td field-key='value'>{{ $setting->value }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.settings.index') }}" class="btn btn-default">Volver</a>
        </div>
    </div>
@stop
