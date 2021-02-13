@extends('public.master')
@section('content')
<section class="apertura">
	<div class="container my-5"><h1 class="text-primary border-bottom border-primary">{{ $item->category->title }}</h1></div>
</section>
<section class="informacion">
	<div class="container">
		<div class="row">
			<div class="col-sm-4 text-center pb-2">
				@if( $item->featured_image )
				<img src="{{ asset('images/novedades/'.$item->featured_image) }}" alt="" class="mx-auto img-fluid animated fadeInUp">
				@endif
			</div>
			<div class="col-sm-8">
				<h2>{{ $item->title }}</h2>
				{!! $item->page_text !!}
				@if($item->video)
				<div class="col-sm-12" style="margin-top: 30px">
					<div class="embed-responsive embed-responsive-16by9">
						<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{ $item->video }}"></iframe>
					</div>
				</div>
				@endif
			</div>
		</div>
	</div>
</section>
@stop
@section('javascript')
@stop