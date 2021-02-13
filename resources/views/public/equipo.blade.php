@extends('public.master')
@section('content')
<section class="apertura border-bottom border-">
	<img src="{{ asset('images/deco/header_productos_2019.jpg') }}" alt="Sección Productos" class="img-fluid mb-5" data-aos="fade">
	<div class="container my-5"><h1 class="text-primary border-bottom border-primary">{{ $product->name }}</h1></div>
</section>
<section class="productos">
	<div class="container">
		<div class="row">
			@if($product->photo1)
			<div class="col-md-4">
				<img src="{{ asset('images/productos/'.$product->photo1) }}" alt="{{ $product->name }}" class="img-fluid animated fadeInLeft">
			</div>
			@endif
			<div class="col-md-8">
				@if($product->manufacturer->brand)
				<img src="{{ asset('images/marcas/'.$product->manufacturer->brand) }}" alt="{{ $product->manufacturer->name }}" class="float-right">
				@endif
				<p>{!! nl2br($product->description) !!}</p>
				<p></p>
				@include('partials.public-compartir-mas-info')
			</div>
			@if($product->link)
			<p>Para más información puede consultar la página del fabricante: <a href="{{ $product->link }}" target="_blank" class="btn btn-light"> Ver más información</a></p>
			@endif
			@if($product->video)
			<div class="col-sm-12" style="margin-top: 30px">
				<div class="embed-responsive embed-responsive-16by9">
					<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{ $product->video }}"></iframe>
				</div>
			</div>
			@endif
		</div>
	</div>
</section>
@stop
@section('javascript')
@stop