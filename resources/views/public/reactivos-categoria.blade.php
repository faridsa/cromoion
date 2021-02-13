@extends('public.master')
@section('content')
<section class="apertura">
	<img src="{{ asset('images/deco/header_reactivos_2019.jpg') }}" alt="Sección Reactivos" class="img-fluid animated fadeIn">
</section>
<section class="productos">
	<div class="container">
		<div class="row">
			<div class="col-sm-10 ml-md-auto pt30 pb30">
				<h1><small><a href="{{ URL('productos/reactivos/') }}">Reactivos</a> / <a href="{{ URL('productos/reactivos/'.$linea->slug) }}">{{ $linea->name }}</a> / <a href="{{ URL('productos/reactivos/'.$linea->slug.'/' . $categoria->slug ) }}">{{ $categoria->name or '' }}</a> </small></h1>
				<ul class="list-group list-stripped">
					@foreach($productos as $product)
					<li class="list-group-item"><a href="{{ URL('productos/reactivos/'.$linea->slug.'/' . $categoria->slug .'/'. $product->slug) }}">{{ $product->name }}</a></li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
</section>
@stop
@section('javascript')
@stop