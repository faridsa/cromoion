@extends('public.master')
@section('content')
<section class="apertura">
	<div class="container  my-5"><h1 class="text-primary border-bottom border-primary">Contacto</h1></div>
</section>
<section clas="form-contacto">
	<div class="container">
		<div class="row">

			<div class="col-md-8 offset-md-2">
				
				{!! Form::open(['url' => route('contact')]) !!}
				<h5>Por favor complete el formulario de contacto </h5>
				<p><small>(*) campos obligatorios</small></p>
				<div class="form-group">
					{!! Form::label('name', 'Nombre y Apellido *') !!}
					{!! Form::text('name', old('name'),['class'=>'form-control']) !!}
					@if($errors->has('name'))
					<p class="help-block">
						{{ $errors->first('name') }}
					</p>
					@endif
				</div>
				{!! Honeypot::generate('surname', 'token2') !!}

				<div class="form-group">
					{!! Form::label('company', 'Nombre del laboratorio *') !!}
					{!! Form::text('company', old('company'),['class'=>'form-control']) !!}
					@if($errors->has('company'))
					<p class="help-block">
						{{ $errors->first('company') }}
					</p>
					@endif
				</div>
				<div class="row">
					<div class="form-group col-sm-6">
						{!! Form::label('email', 'E-Mail *') !!}
						{!! Form::text('email', old('email'),['class'=>'form-control']) !!}
						@if($errors->has('email'))
						<p class="help-block">
							{{ $errors->first('email') }}
						</p>
						@endif
					</div>
					<div class="form-group col-sm-6">
						{!! Form::label('phone', 'Telefono *') !!}
						{!! Form::text('phone', old('phone'),['class'=>'form-control']) !!}
						@if($errors->has('phone'))
						<p class="help-block">
							{{ $errors->first('phone') }}
						</p>
						@endif
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('address', 'Domicilio') !!}
					{!! Form::text('address', old('address'),['class'=>'form-control']) !!}
					@if($errors->has('address'))
					<p class="help-block">
						{{ $errors->first('address') }}
					</p>
					@endif
				</div>
				<div class="row">
					<div class="form-group col-sm-4">
						{!! Form::label('zip', 'Código Postal') !!}
						{!! Form::text('zip', old('zip'),['class'=>'form-control']) !!}
						@if($errors->has('zip'))
						<p class="help-block">
							{{ $errors->first('zip') }}
						</p>
						@endif
					</div>
					<div class="form-group col-sm-8">
						{!! Form::label('city', 'Ciudad *') !!}
						{!! Form::text('city', old('city'),['class'=>'form-control']) !!}
						@if($errors->has('city'))
						<p class="help-block">
							{{ $errors->first('city') }}
						</p>
						@endif
					</div>
				</div>
				<div class="row">
					<div class="form-group col-sm-6">
						{!! Form::label('state', 'Provincia') !!}
						{!! Form::text('state', old('state'),['class'=>'form-control']) !!}
						@if($errors->has('state'))
						<p class="help-block">
							{{ $errors->first('state') }}
						</p>
						@endif
					</div>
					<div class="form-group col-sm-6">
						{!! Form::label('country', 'País *') !!}
						{!! Form::text('country', old('country'),['class'=>'form-control']) !!}
						@if($errors->has('country'))
						<p class="help-block">
							{{ $errors->first('country') }}
						</p>
						@endif
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('comments', 'Comentarios *') !!}
					{!! Form::textarea('comments', old('comments'),['class'=>'form-control']) !!}
					@if($errors->has('comments'))
					<p class="help-block">
						{{ $errors->first('comments') }}
					</p>
					@endif
				</div>
				<button type="submit" class="btn btn-primary px-5">Enviar</button>
				<p></p>
			{!! Form::close() !!}
		</div>
	</div>
</div>
</section>

@stop
@section('javascript')
<script>
	[
{
"featureType": "all",
"elementType": "geometry.fill",
"stylers": [
{
"weight": "2.00"
}
]
},
{
"featureType": "all",
"elementType": "geometry.stroke",
"stylers": [
{
"color": "#9c9c9c"
}
]
},
{
"featureType": "all",
"elementType": "labels.text",
"stylers": [
{
"visibility": "on"
}
]
},
{
"featureType": "landscape",
"elementType": "all",
"stylers": [
{
"color": "#f2f2f2"
}
]
},
{
"featureType": "landscape",
"elementType": "geometry.fill",
"stylers": [
{
"color": "#ffffff"
}
]
},
{
"featureType": "landscape.man_made",
"elementType": "geometry.fill",
"stylers": [
{
"color": "#ffffff"
}
]
},
{
"featureType": "poi",
"elementType": "all",
"stylers": [
{
"visibility": "off"
}
]
},
{
"featureType": "road",
"elementType": "all",
"stylers": [
{
"saturation": -100
},
{
"lightness": 45
}
]
},
{
"featureType": "road",
"elementType": "geometry.fill",
"stylers": [
{
"color": "#eeeeee"
}
]
},
{
"featureType": "road",
"elementType": "labels.text.fill",
"stylers": [
{
"color": "#7b7b7b"
}
]
},
{
"featureType": "road",
"elementType": "labels.text.stroke",
"stylers": [
{
"color": "#ffffff"
}
]
},
{
"featureType": "road.highway",
"elementType": "all",
"stylers": [
{
"visibility": "simplified"
}
]
},
{
"featureType": "road.arterial",
"elementType": "labels.icon",
"stylers": [
{
"visibility": "off"
}
]
},
{
"featureType": "transit",
"elementType": "all",
"stylers": [
{
"visibility": "off"
}
]
},
{
"featureType": "water",
"elementType": "all",
"stylers": [
{
"color": "#46bcec"
},
{
"visibility": "on"
}
]
},
{
"featureType": "water",
"elementType": "geometry.fill",
"stylers": [
{
"color": "#c8d7d4"
}
]
},
{
"featureType": "water",
"elementType": "labels.text.fill",
"stylers": [
{
"color": "#070707"
}
]
},
{
"featureType": "water",
"elementType": "labels.text.stroke",
"stylers": [
{
"color": "#ffffff"
}
]
}
]
</script>
@stop