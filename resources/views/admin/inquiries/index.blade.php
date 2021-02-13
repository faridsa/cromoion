@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')
@section('content')
<h3 class="page-title">Consultas por productos</h3>
<div class="panel panel-default">
    <div class="panel-heading">
        Listado
    </div>
    <div class="panel-body table-responsive">
        <table class="table table-bordered table-striped {{ count($inquiries) > 0 ? 'datatable' : '' }}">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Empresa</th>
                    <th>Teléfono</th>
                    <th>Producto</th>
                    <th>Leído</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            
            <tbody>
                @if (count($inquiries) > 0)
                @foreach ($inquiries as $inquiry)
                <tr data-entry-id="{{ $inquiry->id }}">
                    <td field-key='name'>{{ $inquiry->name }}</td>
                    <td field-key='email'>{{ $inquiry->email }}</td>
                    <td field-key='company'>{{ $inquiry->company }}</td>
                    <td field-key='phone'>{{ $inquiry->phone }}</td>
                    <td field-key='product'>{{ $inquiry->product }}</td>
                    <td field-key='viewed'>{{ $inquiry->viewed == 1 ? 'Si' : 'No'}}</td>
                    
                    <td>
                        @can('inquiry_view')
                        <a href="{{ route('admin.inquiries.show',[$inquiry->id]) }}" class="btn btn-xs btn-primary">Ver</a>
                        @endcan
                        @can('inquiry_delete')
                        {!! Form::open(array(
                        'style' => 'display: inline-block;',
                        'method' => 'DELETE',
                        'onsubmit' => "return confirm('Está segur@?');",
                        'route' => ['admin.inquiries.destroy', $inquiry->id])) !!}
                        {!! Form::submit('Borrar', array('class' => 'btn btn-xs btn-danger')) !!}
                        {!! Form::close() !!}
                        @endcan
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="12">Sin datos disponibles</td>
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