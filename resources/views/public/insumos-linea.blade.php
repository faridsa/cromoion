@extends('public.master')
@section('content')
<section class="apertura">
	<div class="container my-5"><h1 class="text-primary border-bottom border-primary">Insumos</h1></div>
	<img src="{{ asset('images/deco/apertura-interior.jpg') }}" alt="Sección Productos" class="img-fluid animated fadeIn">
</section>
<section class="productos">
	<div class="container">
		<div class="row">
			<div class="col-sm-10 ml-md-auto pt30 pb30">
				<h2>{{ $linea->name }}</h2>
				<ul class="list-group list-stripped">
					@foreach($products as $product)
					<li class="list-group-item"><a href="{{ URL('productos/insumos/'.$linea->slug.'/'.$product->slug) }}">{{ $product->name }}</a></li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
</section>
@stop
@section('javascript')
@stop