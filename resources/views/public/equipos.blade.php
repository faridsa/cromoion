@extends('public.master')
@section('content')
<section class="apertura">
	<img src="{{ asset('images/deco/header_productos_2019.jpg') }}" alt="Sección Productos" class="img-fluid mb-5" data-aos="fade">
	<div class="container my-5"><h1 class="text-primary border-bottom border-primary">Instrumentos</h1></div>
</section>
<section class="productos">
	<div class="container">
		@foreach($products as $item)
			<div class="row mb-3">
				<div class="col-sm-3 border-right border-primary pb-2">
					@if($item->photo1)
						<img src="{{ asset('images/productos/'.$item->photo1) }}" alt="{{ $item->name }}" class="img-fluid animated fadeInLeft mx-auto">
					@endif
				</div>
				<div class="col-sm-9">
					<h2>{{ $item->name }}</h2>
					@php 
					$output=explode('</p>', $item->description); @endphp
					{!! $output[0] !!}
					<p class="mt-3"><a href="{{ url('productos/instrumentos/'.$item->slug) }}" class="btn btn-primary">MÁS INFORMACIÓN</a></p>
				</div>
			</div>
			<hr>
		@endforeach
		
		<div class="row">
			{!! $products->links() !!}
		</div>
		
	</div>	
</section>


@stop
@section('javascript')
@stop