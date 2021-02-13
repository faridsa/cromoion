<!DOCTYPE html>
<html lang="es">
@include('partials.public-head')
<body>

	@include('partials.public-header')
	@yield('content')
	@include('partials.public-footer')
	@include('partials.public-javascripts')
	@yield('javascript')
	@if ( Session::has('status') )
	<div class="container">
		<div class="alert alert-warning dismissable align-center fixed-bottom">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			{{ Session::get('status') }}
			{{ Session::forget('status') }}
			{{ Session::save() }}
		</div>
	</div>
	@endif
	@if($errors->any())
	<div class="alert alert-danger dismissable align-center fixed-bottom">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		{{ $errors->first() }}
	</div>
	@endif
</body>
</html>