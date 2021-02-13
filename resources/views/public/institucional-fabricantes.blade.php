@extends('public.master')
@section('content')
<section class="apertura">
	<div class="container my-5"><h1 class="text-primary border-bottom border-primary">Marcas representadas</h1></div>
	<img src="{{ asset('images/deco/apertura-interior.jpg') }}" alt="Sección Institucional" class="img-fluid animated fadeIn">
</section>
<section class="informacion">
	<div class="container">
		<div class="row">
			<div class="col-sm-10 ">
				<div class="row justify-content-around">				
				@foreach($marcas as $marca )
					<div class="col-2 pb30 pt30">
						<img src="{{ asset('images/marcas/'.$marca->brand) }}" alt="{{ $marca->name }}" class="img-fluid animated fadeInUp">
					</div>
				@endforeach
			</div>
		</div>
			
		</div>
	</div>
</section>
@stop
@section('javascript')
@stop