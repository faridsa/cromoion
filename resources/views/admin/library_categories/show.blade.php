@extends('layouts.app')

@section('content')
<h3 class="page-title">Biblioteca / Categorías</h3>

<div class="panel panel-default">
    <div class="panel-heading">
        Detalle
    </div>
    <div class="panel-body table-responsive">
        <div class="row">
            <div class="col-md-6">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Categoría</th>
                        <td field-key='name'>{{ $library_category->name }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <p>&nbsp;</p>
        <a href="{{ route('admin.library_categories.index') }}" class="btn btn-default">Volver</a>
        <a href="{{ route('admin.library_categories.edit',[$library_category->id]) }}" class="btn  btn-info">Modificar</a>
    </div>
</div>
@stop


