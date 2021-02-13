@extends('public.master')
@section('content')
<section class="apertura">
	<img src="{{ asset('images/deco/header_reactivos_2019.jpg') }}" alt="Sección Biblioteca" class="img-fluid animated fadeIn">
	<div class="container my-5"><h1 class="text-primary border-bottom border-primary">Biblioteca</h1></div>
</section>
<section class="productos">
	<div class="container">
		<div class="row">
			<div class="col-sm-10 ml-md-auto pt30 pb30">
				@foreach($categories as $category)
				<h3>{{ $category->name }}</h3>
				<ul class="list-group list-stripped mb-4">

					@foreach($files as $file)
					@if($file->category_id == $category->id) 
					<li class="list-group-item">
						<a href="{{ asset('pdf/'.$file->pdf) }}" class="btn btn-light btn-sm float-right" target="_blank"> <i class="ion ion-md-cloud-download" aria-hidden="true"></i></a> {{ $file->name }}
						{{--<a href="{{ route( 'pdf.download', ['uuid' => $file->uuid] )  }}" class="btn btn-light btn-sm float-right"> <i class="ion ion-md-cloud-download" aria-hidden="true"></i></a> {{ $file->name }}--}}
						@if(!is_null($file->description))
						<br><span class="text-muted">{{ $file->description }}</span>
						@endif
					</li>
						@endif
						@endforeach
					</ul>
					@endforeach
				</div>
			</div>
		</div>
	</section>
	@stop
	@section('javascript')
	@stop