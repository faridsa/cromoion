<header class="fixed-top bg-light">
	<div class="p-2 bg-dark" data-aos="fade">
		<div class="container">
		<p class="text-right text-light"><a href="tel:541146443205" class="text-light">(5411) 4644-3205/3206</a> | <a href="mailto:reporte@cromoion.com" class="text-light">reporte@cromoion.com</a> | <a href=""><i class="icon ion-facebook"></i></a></p>
	</div>
	</div>
<nav class="navbar navbar-expand-lg navbar-light"  data-aos="fade">
	<div class="container justify-content-between">
		<a href="{{ route('home') }}" class="logo mr-md-5">
					<img src="{{ asset('images/deco/logo-cromoion-header.png') }}" alt="Cromoion SRL" class="img-fluid">
				</a>
		<div class="collapse navbar-collapse ml-auto" id="mainNav">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link text-uppercase" href="{{ route('home') }}" id="btnInicio">inicio</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-uppercase" href="{{ url('institucional/quienes-somos') }}" id="btnInstitucional">institucional</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link text-uppercase dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="btnProductos">productos</a>
					<ul class="dropdown-menu rounded-0" aria-labelledby="btnProductos">
						<li><a class="dropdown-item text-uppercase" href="{{ url('productos/instrumentos') }}">Instrumentos</a></li>
						<li><a class="dropdown-item text-uppercase" href="{{ url('productos/reactivos') }}">Reactivos</a></li>
					</ul>
				</li>
				@if( isset($cats_info) && count($cats_info) > 0)
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle text-uppercase" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="btnInformacion">información</a>
					<ul class="dropdown-menu rounded-0" aria-labelledby="btnInformacion">
						@foreach($cats_info as $cat)
							<li><a class="dropdown-item text-uppercase" href="{{ url('informacion/'.$cat->slug) }}">{{ $cat->title }}</a></li>
						@endforeach
						<li><a class="dropdown-item text-uppercase" href="{{ url('biblioteca') }}">Biblioteca</a></li>
					</ul>
				</li>
				@endif
				
				<li class="nav-item">
					<a class="nav-link text-uppercase" href="{{ url('/contacto') }}">contacto</a>
				</li>
				<li>
					{!! Form::open(['url' => route('buscar'), 'class'=>"form-inline"]) !!}
					<div class="input-group">
						<input name="q" type="text" class="form-control" placeholder="Ingrese codigo o texto a buscar" aria-label="Buscar..." style="width:280px">
						
					</div>
				</form>
			</li>
		</ul>
	</div>
	<button class="navbar-toggler float-right" type="button" data-toggle="collapse" data-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Menu">
		<span class="navbar-toggler-icon"></span>
	</button>
</div>
</nav>
</header>
