@inject('request', 'Illuminate\Http\Request')
<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu"
        data-keep-expanded="false"
        data-auto-scroll="true"
        data-slide-speed="200">

        <li class="{{ $request->segment(1) == 'home' ? 'active' : '' }}">
            <a href="{{ url('/admin/home') }}">
                <i class="fa fa-dashboard"></i>
                <span class="title">Panel</span>
            </a>
        </li>
        @can('novedade_access')
        <li class="">
            <a href="#">
                <i class="fa fa-newspaper-o"></i>
                <span class="title">Novedades</span>
                <span class="fa arrow"></span>
            </a>
            <ul class="sub-menu">
                @can('content_page_access')
                <li class="{{ $request->segment(2) == 'content_pages' ? 'active active-sub' : '' }}">
                    <a href="{{ route('admin.content_pages.index') }}">
                        <i class="fa fa-file-o"></i>
                        <span class="title">
                         Notas
                     </span>
                 </a>
             </li>
             @endcan

             @can('content_category_access')
             <li class="{{ $request->segment(2) == 'content_categories' ? 'active active-sub' : '' }}">
                <a href="{{ route('admin.content_categories.index') }}">
                    <i class="fa fa-folder"></i>
                    <span class="title">
                        Secciones
                    </span>
                </a>
            </li>
            @endcan
        </ul>
    </li>
    @endcan
    @can('catalogo_access')
    <li class="">
        <a href="#">
            <i class="fa fa-shopping-cart"></i>
            <span class="title">Catalogo</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
           @can('product_access')
           <li class="{{ $request->segment(2) == 'products' ? 'active active-sub' : '' }}">
            <a href="{{ route('admin.products.index') }}">
                <i class="fa fa-shopping-cart"></i>
                <span class="title">
                 Productos
             </span>
         </a>
     </li>
     @endcan
     @can('product_category_access')
     <li class="{{ $request->segment(2) == 'product_categories' ? 'active active-sub' : '' }}">
        <a href="{{ route('admin.product_categories.index') }}">
            <i class="fa fa-folder"></i>
            <span class="title">
                Categorías
            </span>
        </a>
    </li>
    @endcan
    @can('manufacturer_access')
    <li class="{{ $request->segment(2) == 'manufacturers' ? 'active active-sub' : '' }}">
        <a href="{{ route('admin.manufacturers.index') }}">
            <i class="fa fa-bank"></i>
            <span class="title"> Fabricantes</span>
        </a>
    </li>
    @endcan
</ul>
</li>
@endcan

@can('slideshow_access')
<li class="{{ $request->segment(2) == 'slideshows' ? 'active' : '' }}">
    <a href="{{ route('admin.slideshows.index') }}">
        <i class="fa fa-photo"></i>
        <span class="title">Slideshows</span>
    </a>
</li>
@endcan
            {{--
            @can('evento_access')
            <li class="{{ $request->segment(2) == 'eventos' ? 'active' : '' }}">
                <a href="{{ route('admin.eventos.index') }}">
                    <i class="fa fa-calendar"></i>
                    <span class="title">@lang('admin.eventos</span>
                </a>
            </li>
            @endcan
            --}}
            @can('library_access')
            <li class="">
                <a href="#">
                    <i class="fa fa-institution"></i>
                    <span>Biblioteca</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="{{ $request->segment(2) == 'library_categories' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.library_categories.index') }}">
                            <i class="fa fa-cubes"></i>
                            <span>Categorías</span>
                        </a>
                    </li>
                    <li class="{{ $request->segment(2) == 'library_items' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.library_items.index') }}">
                            <i class="fa fa-cube"></i>
                            <span>Archivos</span>
                        </a>
                    </li>
                </ul>
            </li>
            @endcan
            @can('pedidos_y_consulta_access')
            <li class="">
                <a href="#">
                    <i class="fa fa-inbox"></i>
                    <span class="title">Comunicación</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="sub-menu">

                    @can('pedido_access')
                {{--<li class="{{ $request->segment(2) == 'pedidos' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.pedidos.index') }}">
                            <i class="fa fa-shopping-cart"></i>
                            <span class="title">
                                Pedidos
                            </span>
                        </a>
                    </li>--}}
                    @endcan
                    @can('message_access')
                    <li class="{{ $request->segment(2) == 'messages' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.messages.index') }}">
                            <i class="fa fa-inbox"></i>
                            <span class="title">
                                Formularios de contacto
                            </span>
                        </a>
                    </li>
                    @endcan
                    @can('inquiry_access')
                    <li class="{{ $request->segment(2) == 'inquiries' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.inquiries.index') }}">
                            <i class="fa fa-paper-plane"></i>
                            <span class="title">
                                Consultas por productos
                            </span>
                        </a>
                    </li>
                    @endcan
                    @can('subscription_access')
                    <li class="{{ $request->segment(2) == 'subscriptions' ? 'active' : '' }}">
                        <a href="{{ route('admin.subscriptions.index') }}">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            <span class="title">Suscriptores</span>
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcan
            {{--@can('encuestum_access')
            <li class="{{ $request->segment(2) == 'encuestas' ? 'active' : '' }}">
                <a href="{{ route('admin.encuestas.index') }}">
                    <i class="fa fa-tasks"></i>
                    Encuesta</span>
                </a>
            </li>
            @endcan--}}


            @can('user_access')
            <li class="{{ $request->segment(2) == 'users' ? 'active active-sub' : '' }}">
                <a href="{{ route('admin.users.index') }}">
                    <i class="fa fa-user"></i>
                    <span class="title">
                        Usuarios
                    </span>
                </a>
            </li>
            @endcan

            {{--
            @can('internal_notification_access')
            <li class="{{ $request->segment(2) == 'internal_notifications' ? 'active' : '' }}">
                <a href="{{ route('admin.internal_notifications.index') }}">
                    <i class="fa fa-briefcase"></i>
                    <span class="title">@lang('admin.internal-notifications</span>
                </a>
            </li>
            @endcan
            --}}

            <li class="{{ $request->segment(1) == 'change_password' ? 'active' : '' }}">
                <a href="{{ route('password.request') }}">
                    <i class="fa fa-key"></i>
                    <span class="title">Cambiar contraseña</span>
                </a>
            </li>
            <li>
                <a href="#logout" onclick="$('#logout').submit();">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title">Cerrar sesion</span>
                </a>
            </li>
        </ul>
    </div>
</div>
{!! Form::open(['route' => 'logout', 'style' => 'display:none;', 'id' => 'logout']) !!}
<button type="submit">Salir</button>
{!! Form::close() !!}
