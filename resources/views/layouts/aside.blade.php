<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
        <img src="{{asset('dist/img/coding (1).ico')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Proyecto21a</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('dist/img/ShinG (1).ico')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info container-fluid">
                <a href="#" class="d-block">
                    @guest
                    <a class="nav-link col-md-6 text-center" style="position: absolute;" href="{{ route('login') }}">{{ __('custom.login') }}</a>
                    @else
                    {{ Auth::user()->name }}
                    <a class="text-white-50" href="{{ route('logout') }}" onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                        {{__('custom.logout')}}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                        style="display: none;">
                        @csrf
                    </form>

                    @endguest
                </a>
            </div>
        </div>
    <!-- Sidebar Menu -->
        <nav class="mt-2 content">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
            data-accordion="false">
            @auth
            <li class="nav-item">
                <a href="/" class="{{ Request::path() === '/' ? 'nav-link active' : 'nav-link' }}">
                    <i class="fab fa-hubspot"></i>                    
                    <p>{{__('custom.home')}}</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('usuario.create')}}"
                    class="{{ Request::path() === 'usuarios' ? 'nav-link active' : 'nav-link' }}">
                    <i class="fas fa-user-plus"></i>
                    <p>
                        {{__('custom.users')}}
                        @php $users_count = App\Models\User::all()->count(); @endphp
                        <span class="right badge badge-danger">{{ $users_count ?? '0' }}</span>
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('clientes.index')}}"
                    class="{{ Request::path() === 'clientes' ? 'nav-link active' : 'nav-link' }}">
                    <i class="fas fa-id-card"></i>
                    <p>
                        Clientes
                        @php $clients_count = App\Models\Client::all()->count(); @endphp
                        <span class="right badge badge-danger">{{ $clients_count ?? '0' }}</span>
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('proveedores.index')}}"
                    class="{{ Request::path() === 'proveedores' ? 'nav-link active' : 'nav-link' }}">
                    <i class="fas fa-shipping-fast"></i>
                    <p>
                        Proveedores
                        @php $providers_count = App\Models\Provider::all()->count(); @endphp
                        <span class="right badge badge-danger">{{ $providers_count ?? '0' }}</span>
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('productos.index')}}"
                    class="{{ Request::path() === 'productos' ? 'nav-link active' : 'nav-link' }}">
                    <i class="fas fa-cart-plus"></i>
                    <p>
                        Productos
                        @php $products_count = App\Models\Product::all()->count(); @endphp
                        <span class="right badge badge-danger">{{ $products_count ?? '0' }}</span>
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('ventas.index')}}"
                    class="{{ Request::path() === 'ventas' ? 'nav-link active' : 'nav-link' }}">
                    <i class="fas fa-handshake"></i>
                    <p>
                        Ventas
                        @php $sales_count = App\Models\Sales::all()->count(); @endphp
                        <span class="right badge badge-danger">{{ $sales_count ?? '0' }}</span>
                    </p>
                </a>
            </li>
            @endauth
        </ul>   
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>