@extends('public.master')
@section('content')
<section class="mb-5">
	<div class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
			@foreach($slideshow as $slide)
			<div class="carousel-item {{ $loop->first ? 'active' : '' }}">
				@if($browser->isPhone())
				<img src="{{ asset('images/slideshows/'.$slide->image_mobile) }}" alt="{{ $slide->titulo }}" class="img-fluid">
				@else
				<img src="{{ asset('images/slideshows/'.$slide->image_desktop) }}" alt="{{ $slide->titulo }}" class="img-fluid">
				@endif
				@isset($slide->texto)
				<div class="carousel-caption d-block pr-lg-5 p-3">
					<h3>{!! $slide->titulo !!}</h3>
					{!! $slide->texto !!}
					@isset($slide->link)
					<p><a href="{{ url($slide->link) }}" class="btn btn-primary">Mas información</a></p>
					@endisset
				</div>
				@endisset
			</div>
			@endforeach
		</div>
	</div>
</section>
<main class="container">
	<div class="row">
		<div class="col-md-6">
			@if(count($news)>0)
			<section class="news mb-4">
				<h2 class="pb-4 border-bottom border-primary">Productos destacados del mes</h2>
				@foreach($news as $item)
				<div class="row mb-3">
					<div class="col-sm-4 text-right border-right border-primary pb-2">
						<img src="{{ asset('images/novedades/'.$item->featured_image) }}" alt="" class="img-fluid animated fadeInUp mx-auto">
					</div>
					<div class="col-sm-8">
						<p>
							<small class="label news-category">{{ $item->category->title }}</small>
						</p>
						<h3 class="text-uppercase">{{ $item->title }}</h3>
						@php
						$output=explode('</p>', $item->page_text); @endphp
						{!! $output[0] !!}
						<p> <a href="{{ url('informacion/novedades/'.$item->slug) }}" class="btn btn-sm btn-primary" title="Obtenga más infornación sobre el producto {{ $item->title }}">Más Información</a></p>
					</div>
				</div>
				@endforeach
			</section>
			@endif

			@if(count($products)>0)
			{{--<section class="news">
				<div class="container item-container">
					<div class="row">
						@foreach($products as $item)
						<div class="col-sm-6  mb-3">
							<div class="row">
								<div class="col-sm-5 text-right border-right">
									<img src="{{ asset('images/productos/'.$item->photo1) }}" alt="" class="img-fluid animated fadeInUp">
								</div>
								<div class="col-sm-7">
									<p>
										<small class="label news-category">{{ $item->category->name }}</small>
									</p>
									<h3>{{ $item->name }}</h3>
									{!!$item->page_text!!}
									@php
									$path = 'productos/';
									if($item->category->parent){
										$path .= $item->category->parent->slug .'/';
									}
									$path .= $item->category->slug.'/';
									@endphp
									<p><a href="{{ url($path.$item->slug) }}" class="btn btn-success">CONOZCA EL PRODUCTO</a></p>
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</section>--}}
			@endif
		</div>
		<div class="col-md-6">
			{{--@include('partials.public-subscription-form')--}}
		</div>
	</div>
</main>

@stop
@section('javascript')
<script>

</script>
@stop
