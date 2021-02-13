{!! Form::open(['url' => route('subscription'), 'class'=>'mx-auto bg-dark p-3 rounded', 'style'=>'max-width:500px']) !!}
{!! Form::hidden('token2', time()) !!}
<h5 class="border-bottom text-light">SUSCRIBASE A NUESTRAS NOVEDADES </h5>
<fieldset class="p-3">
<div class="form-group">
	{!! Form::label('email', 'E-Mail *' , ['class'=>'text-light']) !!}
	{!! Form::text('email', old('email'),['class'=>'form-control form-control-sm ', 'required'=>'']) !!}
	@if($errors->has('email'))
	<p class="help-block">
		{{ $errors->first('email') }}
	</p>
	@endif
</div>
<div class="form-group">
	{!! Form::label('name', 'Nombre *' , ['class'=>'text-light']) !!}
	{!! Form::text('name', old('name'),['class'=>'form-control form-control-sm ', 'required'=>'']) !!}
	@if($errors->has('name'))
	<p class="help-block">
		{{ $errors->first('name') }}
	</p>
	@endif
</div>
<div class="form-group">
	{!! Form::label('surname', 'Apellido *' , ['class'=>'text-light']) !!}
	{!! Form::text('surname', old('surname'),['class'=>'form-control form-control-sm ', 'required'=>'']) !!}
	@if($errors->has('surname'))
	<p class="help-block">
		{{ $errors->first('surname') }}
	</p>
	@endif
</div>
<div class="form-group">
	{!! Form::label('company', 'Empresa *' , ['class'=>'text-light']) !!}
	{!! Form::text('company', old('company'),['class'=>'form-control form-control-sm ', 'required'=>'']) !!}
	@if($errors->has('company'))
	<p class="help-block">
		{{ $errors->first('company') }}
	</p>
	@endif
</div>
<p class="text-right"><button type="submit" class="btn btn-primary px-5 border border-light">ENVIAR</button></p>
</fieldset>

{!! Form::close() !!}