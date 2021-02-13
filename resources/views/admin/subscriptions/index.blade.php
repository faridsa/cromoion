@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')
@section('content')
<h3 class="page-title">
Suscripciones a newsletter</h3>
<div class="panel panel-default">
    <div class="panel-heading">
        Listado
    </div>
    <div class="panel-body table-responsive">
        <table class="table table-bordered table-striped {{ count($subscriptions) > 0 ? 'datatable' : '' }}">
            <thead>
                <tr>
                    <th>Email</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Empresa</th>
                    <th>Fecha de alta</th>
                </tr>
            </thead>
            
            <tbody>
                @if (count($subscriptions) > 0)
                @foreach ($subscriptions as $subscription)
                <tr data-entry-id="{{ $subscription->id }}">
                    <td field-key='email'>{{ $subscription->email }}</td>
                    <td field-key='email'>{{ $subscription->name }}</td>
                    <td field-key='email'>{{ $subscription->surname }}</td>
                    <td field-key='email'>{{ $subscription->company }}</td>
                    <td field-key='alta'>{{ $subscription->created_at }}</td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="6">No hay datos en la tabla</td>
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