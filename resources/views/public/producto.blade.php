@extends('public.master')
@section('content')
<section class="apertura">
	<img src="{{ asset('images/deco/header_reactivos_2019.jpg') }}" alt="Sección Reactivos" class="img-fluid animated fadeIn">
</section>
<section class="productos">
	<div class="container my-5">
		<div class="row">
			<div class="col-sm-6">
				<h1><small><a href="{{ URL('productos/reactivos/') }}">Reactivos</a> / <a href="{{ URL('productos/reactivos/'.$linea->slug) }}">{{ $linea->name }}</a> / <a href="{{ URL('productos/reactivos/'.$linea->slug.'/' . $categoria->slug ) }}">{{ $categoria->name or '' }}</a> </small></h1>
			</div>
			<div class="col-sm-12 text-right">
				@if( isset($product->manufacturer) && !is_null($product->manufacturer->brand))
				<img src="{{ asset('images/marcas/'.$product->manufacturer->brand) }}" alt="{{ $product->manufacturer->name }}" class="img-fluid animated fadeInRight">
				@endif
			</div>
		</div>
		<div class="row">
			@if($product->photo1)
			<div class="col-sm-6">
				<img src="{{ asset('images/productos/'.$product->photo1) }}" alt="{{ $product->name }}" class="img-fluid animated fadeInLeft">
			</div>
			@endif
			
			<div class="col-sm-6">
				<h2>{{ $product->name }}</h2>
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