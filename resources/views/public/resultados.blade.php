@extends('public.master')
@section('content')
<section class="apertura">
	<img src="{{ asset('images/deco/header_productos_2019.jpg') }}" alt="Sección Productos" class="img-fluid animated fadeIn">
	<div class="container my-5"><h1 class="text-primary border-bottom border-primary">Resultados de su búsqueda</h1></div>
</section>
<section class="productos">
	<div class="container">
		<div class="row">
			<div class="col-sm-10 ml-md-auto pt30 pb30">
				<ul class="list-group list-stripped">

					@foreach($results as $linea)
					@php 
						$baseUrl = null;
						$parent_id=$linea->category->parent_id;
						if ($parent_id > 0){
							$parent = $categories->where('id', $parent_id)->first();
							$baseUrl = $parent->slug . '/';
							if(isset($parent->parent_id) && $parent->parent_id > 0) {
								$grandparent = $categories->where('id', $parent->parent_id)->first();
								$baseUrl = $grandparent->slug. '/'. $parent->slug . '/';
							}
							
						}
					@endphp
					<li class="list-group-item"><a href="{{ url( 'productos/'.$baseUrl . $linea->category->slug .'/'.$linea->slug)  }}">{{ $linea->name }}</a> - <small>{{ $parent_id > 0 ? $parent->name : '' }} {{ $linea->category->name }}</small></li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
</section>
@stop
@section('javascript')
@stop