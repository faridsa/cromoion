<div class="mt-4">
	<nav class="nav sharing">
		@if($product->pdf)
		<a class="nav-link " href="{{ url('pdf/'.$product->pdf) }}" target="_blank"><i class="icon ion-ios-document" aria-hidden="true"></i> Brochure</a>
		@endif
		<a class="nav-link" href="#compartir" data-toggle="collapse" aria-expanded="false" aria-controls="compartir"><i class="icon ion-md-share" aria-hidden="true"></i> Compartir</a></li>
		<a class="nav-link" href="#pedirMasInfo" data-toggle="collapse" aria-expanded="false" aria-controls="pedirMasInfo"><i class="icon ion-md-paper" aria-hidden="true"></i> Solicitar más información</a></li>
		<a class="nav-link" href="mailto:marketing@cromoion.com" aria-expanded="false"><i class="icon ion-ios-mail" aria-hidden="true"></i> Enviar un e-mail</a></li>
	</nav>
	<div class="collapse" id="compartir">
		<div class="card card-body">
			<ul class="nav justify-content-center">
				<li class="nav-item"><small class="btn">Compartir en redes sociales</small></li>
				<li class="nav-item"><a href="https://www.linkedin.com/shareArticle?mini=true&url={{ Request::url() }}&title={{ urlencode($product->name) }}" target="_blank" class="btn btn-link"><i class="icon ion-logo-linkedin"></i></a></li>
				<li class="nav-item"><a href="https://www.facebook.com/sharer/sharer.php?u={{ Request::url() }}" target="_blank"  class="btn btn-link"><ion-icon name="icon logo-linkedin"><i class="icon ion-logo-facebook"></i></a></li>
				<li class="nav-item"><a href="https://twitter.com/intent/tweet?text={{ urlencode($product->name) }}&url={{ Request::url() }}" target="_blank" class="btn btn-link"><i class="icon ion-logo-twitter"></i></a> </li>
				@if($browser->isPhone())<li class="nav-item"><a href="whatsapp://send?text={{ urlencode($product->name) }} - {{ Request::url() }}" data-action="share/whatsapp/share" target="_blank" class="btn btn-link"><i class="icon ion-logo-whatsapp"></i></a> </li>@endif
				<li class="nav-item"><a href="mailto:?subject={{ urlencode($product->name) }}&body={{ Request::url() }}" target="_blank" class="btn btn-link"><i class="icon ion-ios-mail"></i></a> </li>
			</ul>
		</div>
	</div>
	<div class="collapse" id="pedirMasInfo">
		<div class="card card-body">
			<h4 class="card-title">Pedido de información adicional</h4>
			{!! Form::open(['url' => route('info-adicional')]) !!}
			{!! Form::hidden('product', $product->name) !!}
			{!! Form::hidden('token2', time()) !!}
			<div class="row">
				<div class="form-group col-sm-6">
					{!! Form::label('name', 'Nombre y Apellido *') !!}
					{!! Form::text('name', old('name'),['class'=>'form-control', 'required'=>'']) !!}
					@if($errors->has('name'))
					<p class="help-block">
						{{ $errors->first('name') }}
					</p>
					@endif
				</div>
				<div class="form-group col-sm-6">
					{!! Form::label('company', 'Nombre del laboratorio *') !!}
					{!! Form::text('company', old('company'),['class'=>'form-control', 'required'=>'']) !!}
					@if($errors->has('company'))
					<p class="help-block">
						{{ $errors->first('company') }}
					</p>
					@endif
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-6">
					{!! Form::label('email', 'E-Mail *') !!}
					{!! Form::text('email', old('email'),['class'=>'form-control', 'required'=>'']) !!}
					@if($errors->has('email'))
					<p class="help-block">
						{{ $errors->first('email') }}
					</p>
					@endif
				</div>
				<div class="form-group col-sm-6">
					{!! Form::label('url', 'Por favor copie y pegue aquí el nombre del producto para verificar su pedido *') !!}
					{!! Form::text('url', old('url'),['class'=>'form-control']) !!}
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-6">
					{!! Form::label('phone', 'Telefono *') !!}
					{!! Form::text('phone', old('phone'),['class'=>'form-control', 'required'=>'']) !!}
					@if($errors->has('phone'))
					<p class="help-block">
						{{ $errors->first('phone') }}
					</p>
					@endif
				</div>
				<div class="form-group col-sm-6">
					<label>&nbsp;</label>
					<div class=""><button type="submit" class="btn btn-primary px-5">Enviar</button></div>

				</div>
				
			</div>
			{!! Form::close() !!}
		</div>
	</div> {{-- // mas info --}}
</div>