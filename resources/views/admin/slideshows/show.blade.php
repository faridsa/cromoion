@extends('layouts.app')

@section('content')
    <h3 class="page-title">Slideshows</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            Detalle de slide
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Título</th>
                            <td><h3>{{ $slideshow->titulo }}</h3></td>
                        </tr>
                        <tr>
                            <th>Imagen desktop</th>
                            <td>@if($slideshow->image_desktop)<img src="{{ asset('images/slideshows/' . $slideshow->image_desktop) }}" style="max-width:250px"/>@endif</td>
                        </tr>
                        <tr>
                            <th>Imagen movil</th>
                            <td>@if($slideshow->image_mobile) <img src="{{ asset('images/slideshows/' . $slideshow->image_mobile) }}" style="max-width:250px"/>@endif</td>
                        </tr>
                        <tr>
                            <th>Texto</th>
                            <td>{!! $slideshow->texto !!}</td>
                        </tr>
                        <tr>
                            <th>Link</th>
                            <td>{{ $slideshow->link }}</td>
                        </tr>
                        <tr>
                            <th>orden</th>
                            <td>{{ $slideshow->order }}</td>
                        </tr>
                         <tr>
                            <th>Publicado</th>
                            <td>{{ $slideshow->published == 1 ? 'Sí' : 'No'}}</td>
                        </tr>
                   </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.slideshows.index') }}" class="btn btn-default">Volver</a>
            <a href="{{ route('admin.slideshows.edit',[$slideshow->id]) }}" class="btn btn-info">Modificar</a>
        </div>
    </div>
@stop
