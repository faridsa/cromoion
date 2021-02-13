@extends('layouts.app')
@section('content')
<div class="row">
    
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading"><i class="fa fa-paper-plane"></i> Consultas por productos</div>
            @if(count($consultas) > 0)
            <ul class="list-group">
                @foreach($consultas as $consulta)
                <li class="list-group-item"><a href="{{ url('/admin/inquiries/'.$consulta->id) }}"">{{ $consulta->name }} | {{ $consulta->company }} | {{ $consulta->email }}</a> </li>
                @endforeach
            </ul>
            @else
            <div class="panel-body">
                No hay consultas sin leer
            </div>
            @endif
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading"><i class="fa fa-inbox"></i> Formularios de contacto </div>
            @if(count($contactos) > 0)
            <ul class="list-group">
                @foreach($contactos as $contacto)
                <li class="list-group-item"><a href="{{ url('/admin/messages/'.$contacto->id) }}"">{{ $contacto->name }} | {{ $contacto->company }} | {{ $contacto->email }}</a> </li>
                @endforeach
            </ul>
            @else
            <div class="panel-body">
                No hay mensajes sin leer
            </div>
            @endif
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading"><i class="fa fa-newspaper"></i> Suscriptores </div>
            @if(count($suscriptores) > 0)
            <ul class="list-group">
                @foreach($suscriptores as $suscriptor)
                <li class="list-group-item"><a href="{{ url('/admin/subscriptions') }}">{{ $suscriptor->empresa }} | {{ $suscriptor->name }} | {{ $suscriptor->surname }}</a> </li>
                @endforeach
            </ul>
            @else
            <div class="panel-body">
                No hay pedidos sin leer
            </div>
            @endif
        </div>
    </div>
    {{--<div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading"><i class="fa fa-tasks"></i> Encuestas </div>
            @if(count($encuestas) > 0)
            <ul class="list-group">
                @foreach($encuestas as $encuesta)
                <li class="list-group-item"><a href="{{ url('encuestas/'.$encuesta->id) }}"">{{ $encuesta->empresa }}</a> </li>
                @endforeach
            </ul>
            @else
            <div class="panel-body">
                No hay encuestas sin leer
            </div>
            @endif
        </div>
    </div>--}}
</div>
@endsection