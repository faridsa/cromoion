@extends('public.master')
@section('content')
<section class="apertura">
	<img src="{{ asset('images/deco/header_reactivos_2019.jpg') }}" alt="Sección Productos" data-aos="fade" class="img-fluid mb-5">
</section>
<section class="productos">
	<div class="container">
		<div class="row">
			<div class="col-sm-10 ml-md-auto pt30 pb30">
				<h1 class="text-primary border-bottom border-primary">Reactivos</h1>
				<ul class="list-group list-stripped">
					@foreach($lineas as $linea)
					<li class="list-group-item"><a href="{{ route('productos.reactivos.linea', $linea->slug) }}">{{ $linea->name }}</a></li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
</section>
@stop
@section('javascript')
@stop