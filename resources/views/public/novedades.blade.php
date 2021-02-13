@extends('public.master')
@section('content')

<section class="apertura">
	<img src="{{ asset('images/deco/header_reactivos_2019.jpg') }}" alt="Sección {{ $category->title }}" class="img-fluid animated fadeIn">
	<div class="container my-5"><h1 class="text-primary border-bottom border-primary">{{ $category->title }}</h1></div>
</section>
@if(count($news)>0)
<section class="news">
	@foreach($news as $item)
	<div class="container item-container">
		<div class="row mb-3">
			<div class="col-sm-4 text-center pb-2">
				<img src="{{ asset('images/novedades/'.$item->featured_image) }}" alt="" class="img-fluid animated fadeInUp mx-auto">
			</div>
			<div class="col-sm-8">
				<h3>{{ $item->title }}</h3>
			@php $output=explode('</p>', $item->page_text); @endphp
			{!! $output[0] !!}
			<p><a href="{{ url('informacion/'. $category->slug .'/'.$item->slug) }}" class="btn btn-success">Más Información</a></p>
		</div>
	</div>
</div>
@endforeach
</section>
@endif
@stop
@section('javascript')

@stop