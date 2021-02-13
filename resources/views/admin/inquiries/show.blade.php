@extends('layouts.app')

@section('content')
    <h3 class="page-title">Consultas por productos</h3>

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
                            <td field-key='name'>{{ $inquiry->name }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td field-key='email'>{{ $inquiry->email }}</td>
                        </tr>
                        <tr>
                            <th>Empresa</th>
                            <td field-key='company'>{{ $inquiry->company }}</td>
                        </tr>
                        <tr>
                            <th>Teléfono</th>
                            <td field-key='phone'>{{ $inquiry->phone }}</td>
                        </tr>
                        <tr>
                            <th>Producto</th>
                            <td field-key='product'>{{ $inquiry->product }}</td>
                        </tr>
                        <tr>
                            <th>Leído</th>
                            <td field-key='view'>{{ $inquiry->viewed  == 1 ? 'Si' : 'No'}}</td>
                        </tr>
                       
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.inquiries.index') }}" class="btn btn-default">Volver</a>
            
        </div>
    </div>
@stop
