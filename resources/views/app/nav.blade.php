    <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4 border-bottom" aria-label="navbar">
    <div class="container-lg">
        <div class="col-3 col-sm-2"><a class="navbar-brand" href="{{ route('home') }}"><x-logo/></a></div>
        <form class="d-flex ms-auto me-4 order-md-2 " role="search" action="{{route('filter')}}">
            <input class="form-control me-2 bg-dark text-white" type="search" name="q" value="{{request()->get('q')}}" placeholder="Gözle" aria-label="Search">
        </form>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbars"
                aria-controls="navbars" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-1" id="navbars">
            @auth

                <li class="nav-item ms-5 fw-semibold col text-white">
                    <a class="nav-link" href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logoutForm').submit();">
                        <i class="bi-box-arrow-right"></i> {{ auth()->user()->name }}
                    </a>
                </li>
                <form id="logoutForm" action="{{ route('logout') }}" method="post" class="d-none">
                    @csrf
                </form>

            @else
            <div class="col-10 row align-items-center">
                <ul class="navbar-nav ms-3 mb-2 mb-lg-0 col-12 row justify-content-center px-4 px-md-5">
                    <li class="nav-item col">
                        <a class="nav-link fw-semibold" href="{{route('contact')}}">Contact</a>
                    </li>
                    <li class="nav-item col">
                        <a class="nav-link fw-semibold" href="{{route('products')}}">Products</a>
                    </li>
                    <li class="nav-item col">
                        <a class="nav-link fw-semibold" href="{{route('about')}}">About us</a>
                    </li>
                    @auth
                        <li class="nav-item ms-5 fw-semibold col">
                            <a class="nav-link" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logoutForm').submit();">
                                <i class="bi-box-arrow-right"></i> {{ auth()->user()->name }}
                            </a>
                        </li>
                        <form id="logoutForm" action="{{ route('logout') }}" method="post" class="d-none">
                            @csrf
                        </form>
                    @else
                        <li class="nav-item col">
                            <a class="nav-link" href="{{ route('login') }}">
                                <i class="bi-box-arrow-in-right"></i> Admin
                            </a>
                        </li>
                    @endauth
                    @endauth
                </ul>
            </div>
        </div>
    </div>
</nav>
