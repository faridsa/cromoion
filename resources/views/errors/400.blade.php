<!DOCTYPE html>
<html lang="es">
@include('partials.public-head')
<body>

    <header class="fixed-top bg-light">
        <div class="p-2 bg-dark" data-aos="fade">
            <div class="container">
                <p class="text-right text-light">(5411) 4644-3205/3206 | <a href="mailto:reporte@cromoion.com" class="text-light">reporte@cromoion.com</a> | <a href=""><i class="icon ion-facebook"></i></a></p>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light"  data-aos="fade">
            <div class="container justify-content-between">
                <a href="{{ route('home') }}" class="logo mr-md-5">
                    <img src="{{ asset('images/deco/logo-cromoion-header.png') }}" alt="Cromoion SRL" class="img-fluid">
                </a>
                <div class="collapse navbar-collapse ml-auto" id="mainNav">

                </div>
                <button class="navbar-toggler float-right" type="button" data-toggle="collapse" data-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Menu">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
    </header>
    <section class="container py-5 h-100">
        <h1 class="mb-4">Lo sentimos</h1>
        <p class="lead">No pudimos completar su pedido, le pedimos disculpas por los inconvenientes.</p>      
    </section>
    @include('partials.public-footer')
    @include('partials.public-javascripts')
    @yield('javascript')
</body>
</html>