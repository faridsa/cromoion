@extends('layouts.auth')
@section('content')
<section class="container ">
  <div class="login-box" style="max-width: 480px; margin:auto;">
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="panel-heading text-center">
          <i class="fa fa-user-circle-o fa-lg"></i>
        <h1 class="text-muted" >Iniciar sesión</h1>
      </div>
        <form method="post" action="{{ url('/login') }}" class="needs-validation" novalidate>
          {!! csrf_field() !!}
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-at"></i></span>
              <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
            </div>
            @if ($errors->has('email'))
            <span class="invalid-feedback">
              <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
          </div>
          <div class="form-group">
            <div class="input-group">
             <span class="input-group-addon"><i class="fa fa-lock"></i></span>
             <input type="password" class="form-control" placeholder="Contraseña" name="password">
           </div>
           @if ($errors->has('password'))
           <span class="invalid-feedback">
            <strong>{{ $errors->first('password') }}</strong>
          </span>
          @endif
        </div>

        <div class="form-group">
         <label class="text-muted">
          <input type="checkbox" name="remember"> Mantener sesión
        </label>
        <a href="{{ route('password.request') }}" class="pull-right"><small>Recuperar contraseña</small></a>
      </div>
      <div class="form-group">
        <button class="btn btn-primary btn-block" type"submit"><i class="fa fa-key"></i> Ingresar</button>
      </div>
    </form>
  </div>
</div>
</div>
</section>
@endsection
